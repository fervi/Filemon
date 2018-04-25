<?php

include("loader.php");
include("steemphp/vendor/autoload.php");
include("functions/get_current_post.php");

$saucenao = 0;
$yandex = 0;
$abstergo = 0;
$link = 0;
$get_info = get_last_post(trim("dmania"));

$json = json_decode($get_info[0]["json_metadata"], TRUE);
$link = $json["image"][0];

if(strlen($link)>200)
{
die;
}

$empty=0;

if(!empty($link))
{
$db = new SQLite3('filemon.sqlite');

$result = $db->query("SELECT id FROM cheetaheater WHERE url='$link' LIMIT 1");

while($res = $result->fetchArray(SQLITE3_ASSOC)){
$empty=1;
break;
}

if($empty==0)
{
$saucenao = saucenao($link);
$yandex = yandex($link);
$abstergo = abstergo($link);
$stmurl = $get_info[0]["url"];
$db->query("INSERT INTO cheetaheater (url, stmurl, saucenao, yandex, abstergo, executed) VALUES ('$link', '$stmurl', '$saucenao', '$yandex', '$abstergo', 0)");
}




}

?>