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
            "avatar" => $avatar
        ];
    }
    return $result;
}

function storeMsg($sender,$group, $content) {
    global $entityManager;
    $record = new Record();
    $record->setSender($sender);
    $record->setGroup($group);
    $record->setContent($content);
    $entityManager->persist($record);
    $entityManager->flush();
}

function newGroup($id, $members) {
    global $entityManager;
    $group = new Room();
    $group->setIcon(rand(1,12).".png");
    $group->setName($id);
    foreach ($members as $key => $user) {
        $group->setMember($user);
    }
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
        $result[] = [
            "name" => $val->getName(),
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
