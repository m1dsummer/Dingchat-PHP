<?php
require_once("bootstrap.php");

function getMsgRecord($group) : Array {
    global $entityManager;
    $records = $entityManager->getRepository("Record")->findBy(["group_name"=>$group]);
    $result = [];
    foreach ($records as $key => $record) {
        $sender = $record->getSender();
        $avatar = $entityManager->getRepository("User")->findOneBy(["name"=>$sender])->getAvatar();
        $result[] = [
            "content" => $record->getContent(),
            "sender" => $sender,
            "time" => $record->getTime(),
            "room" => $record->getGroup(),
            "type" => $record->getType(),
            "avatar" => $avatar
        ];
    }
    return $result;
}

function storeMsg($data) {
    global $entityManager;
    $record = new Record();
    $record->setSender($data["sender"]);
    $record->setGroup($data["gid"]);
    $record->setContent($data["content"]);
    $record->setType($data["type"]);
    $entityManager->persist($record);
    $entityManager->flush();
    return $record;
}

function storeFile($data) {
    global $entityManager;

    $content = $data["content"];
    $record = new Record();
    $record->setSender($data["sender"]);
    $record->setGroup($data["gid"]);
    $record->setType($data["type"]);
    $record->setContent(" ");
    $entityManager->persist($record);
    $entityManager->flush();
    $obj = "SummerChatMsg_".$record->getMid()."_".$data["filename"];
    $record->setContent($obj);
    $entityManager->persist($record);
    $entityManager->flush();
    uploadToOSS($obj, $content);
    return $record;
}

function newGroup($id, $members) {
    global $entityManager;
    $icon = rand(1,12).".png";
    foreach ($members as $key => $user) {
        $group = new Room();
        $group->setIcon($icon);
        $group->setName($id);
        $group->setMember($user);
        $entityManager->persist($group);
        $entityManager->flush();
    }
    $group = new Room();
    $group->setIcon($icon);
    $group->setName($id);
    $group->setMember("admin");
    $entityManager->persist($group);
    $entityManager->flush();
}

function dbGroupExists($gid) : bool {
    global $entityManager;
    $users = $entityManager->getRepository("Room")->findBy(["name"=>$gid]);
    return count($users) != 0;
}

function dbGetGroups($user) : Array {
    global $entityManager;
    $groups = $entityManager->getRepository("Room")->findBy(["member"=>$user]);
    $result = [];
    foreach ($groups as $key => $group) {
        $result[] = [
            "name" => $group->getName(),
            "icon" => $group->getIcon()
        ];
    }
    return $result;
}

function newUser($id, $passwd) {
    global $entityManager;
    $user = new User();
    $user->setName($id);
    $user->setPassword($passwd);
    $user->setAvatar(rand(1,10).".png");
    $entityManager->persist($user);
    $entityManager->flush();
    newGroup("Summer",[$id]);
}

function dbUserExists($user) : bool {
    global $entityManager;
    $users = $entityManager->getRepository("User")->findBy(["name"=>$user]);
    return count($users) > 0;
}

function dbGetUsers() : Array {
    global $entityManager;
    $users = $entityManager->getRepository("User")->findAll(["name"=>"*"]);
    $result = [];
    foreach ($users as $key => $val) {
        $name = $val->getName();
        if ($name == "admin") {
            continue;
        }
        $result[] = [
            "name" => $name,
            "avatar" => $val->getAvatar()
        ];
    }
    return $result;
}

function getPassword($id) : string {
    global $entityManager;
    $user = $entityManager->getRepository("User")->findOneBy(["name"=>$id]);
    return $user->getPassword();
}

function dbGetAvatar($id) : string {
    global $entityManager;
    $user = $entityManager->getRepository("User")->findOneBy(["name"=>$id]);
    return $user->getAvatar();
}
