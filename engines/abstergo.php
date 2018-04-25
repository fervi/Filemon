<?php

function abstergo($photo)
{
file_put_contents("/home/fervi/Abstergo/compare.jpg", file_get_contents($photo));

$log = shell_exec("cd /home/fervi/Abstergo && php /home/fervi/Abstergo/abstergo.php");

if(!empty($log))
{
$db = new SQLite3('/home/fervi/Filemon/abstergodb.sqlite');

$exploded_log = explode("<br />", nl2br($log));
foreach($exploded_log as $parted_log)
{

if(!empty(trim($parted_log)))
{
$db->query("INSERT INTO abstergodb (url, photoid) VALUES ('$photo', '$parted_log')");
}

}

return 1;
}
else
{
$fi = new FilesystemIterator("/home/fervi/Abstergo/database", FilesystemIterator::SKIP_DOTS);
$nums = iterator_count($fi)+1;
$db = new SQLite3('/home/fervi/Abstergo/abstergo.sqlite');
$db->query("INSERT INTO abstergo (url) VALUES ('$photo')");
rename('/home/fervi/Abstergo/compare.jpg', "/home/fervi/Abstergo/database/$nums.jpg");
unlink('/home/fervi/Abstergo/compare.jpg');
return 0;
}


}