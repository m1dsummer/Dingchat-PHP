<?php
function jsonify($code, $reason, $data) : String {
    return json_encode([
        "code" => $code,
        "msg" => $reason,
        "data" => $data
    ]);
}

function endJson($code, $reason, $data="") {
    header("Content-Type: application/json");
    echo jsonify($code, $reason, $data);
    die();
}

function validate($target, $name) {
    $pattern = "/^[0-9a-z_]+$/i";
    if (!is_string($target)) {
        endJSON(1, "invalid $target, string is required");
    }
    if (!preg_match($pattern, $target)) {
        endJSON(1, "invalid $name");
    }
    if (strlen($target) > 16) {
        endJSON(1, "$name is to long");
    }
}

function typeCheck($data, $needs) {
    foreach ($needs as $key => $type) {
        if (!array_key_exists($key, $data)) {
            endJson(1, "key $key is required");
        }
        if (gettype($data[$key]) != $type) {
            endJson(1, "wrong type of $key, $type is required");
        }
    }
}

function checkGroupExists($gid) {
    if (!dbGroupExists($gid)) {
        endJson(1, "group $gid not exists");
    }
}

function checkUserExists($uid) {
    if (!dbUserExists($uid)) {
        endJson(1, "user $uid not exists");
    }
}

function checkLogin() {
    if (!isset($_SESSION["username"])) {
        endJson(1, "please login first");
    }
}