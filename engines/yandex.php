<?php

function yandex($link)
{
$result = file('https://www.yandex.com/images/search?text='.$link.'&img_url='.$link.'&rpt=imageview');


$address = explode(">", $result[0]);

if(in_array('The same picture was not found</div', $address, true))
{
return 0;
}
else
{
return 1;
}

}

?>
