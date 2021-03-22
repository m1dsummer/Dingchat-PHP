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
    $stmt = $mysqli->prepare("INSERT INTO `groups` (name,member) VALUES (?,?)");
    $stmt->bind_param("ss", $gid, $user);
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
    $stmt = $mysqli->prepare("SELECT DISTINCT name FROM `groups` WHERE member=?");
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $stmt->bind_result($gid);
    $result = [];
    while ($stmt->fetch()) {
        $result[] = $gid;
    }
    return $result;
}

function newUser($user, $passwd) : bool {
    global $mysqli;
    $stmt = $mysqli->prepare("INSERT INTO `user` (name,password) VALUES (?,?)");
    $stmt->bind_param("ss", $user, $passwd);
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
    $stmt = $mysqli->prepare("SELECT name from `user`");
    $stmt->execute();
    $stmt->bind_result($user);
    $result = [];
    while ($stmt->fetch()) {
        $result[] = $user;
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