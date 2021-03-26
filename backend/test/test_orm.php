<?php
require_once("../bootstrap.php");

//$record = new Record();
//$record->setGid(1);
//$record->setSender("Summer");
//$record->setContent("hello orm");
//$entityManager->persist($record);
//$entityManager->flush();
//$records = $entityManager->getRepository("Record");
//var_dump($records->findBy(["sender" => "Summer"]));

//$user = new User();
//$user->setName("Switch");
//$user->setAvatar("2.png");
//$user->setPassword("123456");
//$entityManager->persist($user);
//$entityManager->flush();
//$users = $entityManager->getRepository("User");
//var_dump($users->findBy(["name"=>"Switch"]));

$group = new Room();
$group->setName("Web");
$group->setIcon("3.png");
$group->setMember("Summer");
$entityManager->persist($group);
$entityManager->flush();
$groups = $entityManager->getRepository("Room");
var_dump($groups->findBy(["name"=>"Web"]));
