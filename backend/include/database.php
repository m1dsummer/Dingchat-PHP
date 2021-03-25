<?php
$host = "mysql";
$dbname = "chatroom";
$user = "root";
$passwd = "IAMROOT";

$mysqli = new mysqli($host, $user, $passwd, $dbname);
// For debug
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

if ($mysqli->connect_error) {
    die("unable connected to database");
}

function getMsgRecord($group) : Array {
    global $mysqli;
    $stmt = $mysqli->prepare("SELECT * FROM `records` WHERE gid=?");
    $stmt->bind_param("s",$group);
    $stmt->execute();
    $stmt->bind_result($sender,$gid,$content,$time);
    $result = [];
    while ($stmt->fetch()) {
        $result[] = [
            "sender" => $sender,
            "gid" => $gid,
            "time" => $time,
            "content" => $content
        ];
    }
    $stmt->close();
    foreach ($result as $index => $msg) {
        $result[$index]["avatar"] = dbGetAvatar($msg["sender"]);
    }
    return $result;
}

function storeMsg($sender,$group, $content) : bool {
    global $mysqli;
    $stmt = $mysqli->prepare("INSERT INTO records (sender, gid, content) VALUES (?,?,?)");
    $stmt->bind_param("sss", $sender, $group, $content);
    $a = $stmt->execute();
    $stmt->close();
    return $a;
}

function newGroup($id, $members) : bool {
    global $mysqli;
    $gid = $id;
    $user = "";
    $icon = rand(1,12).".png";
    $stmt = $mysqli->prepare("INSERT INTO `groups` (name,member,icon) VALUES (?,?,?)");
    $stmt->bind_param("sss", $gid, $user, $icon);
    $a = true;
    foreach ($members as $key => $user) {
        $a &= $stmt->execute();
    }
    return $a;
}

function dbGroupExists($gid) : bool {
    global $mysqli;
    $stmt = $mysqli->prepare("SELECT COUNT(*) FROM `groups` WHERE name=?");
    $stmt->bind_param("s", $gid);
    $stmt->execute();
    $stmt->bind_result($num);
    $stmt->fetch();
    $stmt->close();
    return $num > 0;
}

function dbGetGroups($user) : Array {
    global $mysqli;
    $stmt = $mysqli->prepare("SELECT DISTINCT name,icon FROM `groups` WHERE member=?");
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $stmt->bind_result($gid, $icon);
    $result = [];
    while ($stmt->fetch()) {
        $result[] = [
            "gid" => $gid,
            "icon" => $icon
        ];
    }
    return $result;
}

function newUser($user, $passwd) : bool {
    global $mysqli;
    $avatar = rand(1,10).".png";
    $stmt = $mysqli->prepare("INSERT INTO `user` (name,password,avatar) VALUES (?,?,?)");
    $stmt->bind_param("sss", $user, $passwd,$avatar);
    $a = $stmt->execute();
    $stmt->close();
    return $a;
}

function dbUserExists($user) :bool {
    global $mysqli;
    $stmt = $mysqli->prepare("SELECT COUNT(*) FROM `user` WHERE name=?");
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $stmt->bind_result($num);
    $stmt->fetch();
    $stmt->close();
    return $num > 0;
}

function dbGetUsers() : Array {
    global $mysqli;
    $stmt = $mysqli->prepare("SELECT name,avatar from `user`");
    $stmt->execute();
    $stmt->bind_result($user,$avatar);
    $result = [];
    while ($stmt->fetch()) {
        $result[] = [
            "username" => $user,
            "avatar" => $avatar
        ];
    }
    $stmt->close();
    return $result;
}

function getPassword($user) {
    global $mysqli;
    $stmt = $mysqli->prepare("SELECT password FROM `user` WHERE name=?");
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $stmt->bind_result($passwd);
    $stmt->fetch();
    $stmt->close();
    return $passwd;
}

function dbGetAvatar($user) : string {
    global $mysqli;
    $stmt = $mysqli->prepare("SELECT avatar FROM `user` WHERE name=?");
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $stmt->bind_result($avatar);
    $stmt->fetch();
    // echo $avatar;
    return $avatar;
}