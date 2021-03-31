<?php
require_once("util.php");
require_once("database.php");
require_once("oss.php");

function checkSender($sender) {
    if ($sender != $_SESSION["username"]) {
        endJson(1, "You bad bad");
    }
}

function newChatGroup() {
    $data = json_decode(file_get_contents("php://input"),true);
    typeCheck($data, [
        "gid" => "string",
        "members" => "array"
    ]);

    $gid = $data["gid"];
    $members = $data["members"];
    validate($gid, "group id");
    if (dbGroupExists($gid)) {
        endJson(1,"group already exists");
    }
    foreach ($members as $_ => $m) {
        validate($m, $m);
        checkUserExists($m);
    }
    newGroup($gid, $members);
    endJson(0, "create group succeed");
}

function getRecords() {
   checkLogin();
    $data = json_decode(file_get_contents("php://input"), true);
    typeCheck($data, [
        "gid" => "string"
    ]);
    $gid = $data["gid"];
    validate($gid, "group id");
    checkGroupExists($gid);
    endJson(0, "success", getMsgRecord($gid));
}

function getGroups() {
    checkLogin();
    $data = json_decode(file_get_contents("php://input"), true);
    typeCheck($data, [
        "user" => "string"
    ]);

    checkSender($data["user"]);

    $user = $data["user"];
    validate($user, "user");
    checkUserExists($user);
    endJson(0, "succeed", dbGetGroups($user));
}

function userRegister() {
    $data = json_decode(file_get_contents("php://input"),true);
    typeCheck($data, [
        "username" => "string",
        "password" => "string"
    ]);

    $user = $data["username"];
    $pass = $data["password"];
    validate($user, "username");
    validate($pass, "password");

    if (dbUserExists($user)) {
        endJson(1, "user $user already exists");
    }
    newUser($user, $pass);
    endJson(0, "register succeed");
}

function userLogin() {
    $data = json_decode(file_get_contents("php://input"), true);
    typeCheck($data, [
        "username" => "string",
        "password" => "string"
    ]);

    $user = $data["username"];
    $pass = $data["password"];
    validate($user, "username");
    validate($pass, "password");

    checkUserExists($user);
    if (getPassword($user) != $pass) {
        endJSON(1, "wrong username or password");
    } else {
        $_SESSION["username"] = $user;
        endJson(0, "login succeed");
    }
}

function userLogout() {
    unset($_SESSION["username"]);
    endJson(0, "logout");
}

function storeMessageText($data) {
    if (strlen($data["content"]) > 1024) {
        endJson(1, "content is too long");
    }
    if (strlen($data["content"]) == 0) {
        $data["content"] = " ";
    }
    storeMsg($data);
}

function storeMessageFile($data) {
    storeFile($data);
}

function postMessage() {
    $data = json_decode(file_get_contents("php://input"), true);

    typeCheck($data, [
        "sender" => "string",
        "gid" => "string",
        "content" => "string",
        "type" => "string"
    ]);

    $sender = $data["sender"];
    $gid = $data["gid"];
    $content = $data["content"];
    $type = $data["type"];

   checkLogin();
   validate($sender, "sender");
   checkSender($sender);
   validate($gid, "group id");
   checkUserExists($sender);
   checkGroupExists($gid);
    
   if ($type == "text") {
       storeMessageText($data);
   } else if ($type=="image"||$type=="file") {
       typeCheck($data, [
           "filename" => "string"
       ]);
       storeMessageFile($data);
   } else {
       endJson(1, "invalid message type");
   }
    
    endJson(0, "send succeed");
}

function getStatus() {
    if (isset($_SESSION["username"])) {
        endJson(0, "ok", [
            "username" => $_SESSION["username"],
            "avatar" => dbGetAvatar($_SESSION["username"])
        ]);
    } else {
        endJson(1, "not logined");
    }
}

function getUsers() {
    checkLogin();
    endJson(0, "ok", dbGetUsers());
}