<?php
require_once("./include/user.php");

session_start();

$action = $_REQUEST["action"];

if (!isset($action)) {
    require("index.html");
    die();
}

switch ($action) {
    case "get-records":
        getRecords();
        break;
    case "get-groups":
        getGroups();
        break;
    case "new-group":
        newChatGroup();
        break;
    case "post-message":
        postMessage();
        break;
    case "login":
        userLogin();
        break;
    case "register":
        userRegister();
        break;
    case "get-status":
        getStatus();
        break;
    case "get-users":
        getUsers();
        break;
    case "logout":
        userLogout();
        break;
    default:
        endJson(1, "unknown action $action");
        break;
}