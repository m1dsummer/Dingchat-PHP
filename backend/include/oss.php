<?php
require_once(__DIR__."/../vendor/aliyuncs/oss-sdk-php/autoload.php");


use OSS\OssClient;
use OSS\Core\OssException;

$config = json_decode(file_get_contents(__DIR__."/oss.config.json"),true);
$accessKeyId = $config["accessKeyId"];
$accessKeySecret = $config["accessKeySecret"];
$endpoint = $config["endpoint"];
$bucket = $config["bucket"];

function uploadToOSS($objName, $content) {
  global $accessKeyId, $accessKeySecret, $endpoint, $bucket;
  $file = tempnam("","SummerChatTmp_")."\n";
  file_put_contents($file, base64_decode($content));
  try {
    $client = new OssClient($accessKeyId, $accessKeySecret, $endpoint);
    $client->uploadFile($bucket, $objName, $file);
    unlink($file);
  } catch(OssException $e) {
  }
}