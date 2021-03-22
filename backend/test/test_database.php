<?php
require_once("../include/database.php");

function TestStoreMsg() {
    storeMsg("admin", 'Vidar',"hello everyone");
}

function TestGroupExists() {
    newGroup("vidar", ["admin","liki","0x4qE"]);
    $a = groupExists("1");
    echo $a;
}

function TestGetMsgRecord() {
    getMsgRecord("admin");
}

function TestGetGroups() {
    getGroups("liki");
}

function TestUserRegister() {
    newUser("admin", "123456");
    $a = userExists("admin");
    $a = userExists("123");
}

//TestGroupExists();
//TestStoreMsg();
//TestGetMsgRecord();
//TestGetGroups();

TestUserRegister();