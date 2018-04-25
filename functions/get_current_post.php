<?php

function get_last_post($tag)
{

include('steemphp/vendor/autoload.php');
include('data/servers.php');


while(empty($return[0]['author'])==1) {
$random = rand(0, (count($node)-1));
$steem = new \SteemPHP\SteemArticle($node[$random]) or die;
$return = $steem->getDiscussionsByCreated($tag, 1) or die;
}

return $return;
}