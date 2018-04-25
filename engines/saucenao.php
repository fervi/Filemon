<?php

function saucenao($link)
{
$address = file('http://saucenao.com/search.php?db=999&dbmaski=32768&url='.$link);

$exploded_address = explode('Low similarity results have been hidden. Click here to display them...', $address[94]);

if(empty(trim(strip_tags($exploded_address[0]))))
{
return 0;
}
else
{
return 1;
}

}