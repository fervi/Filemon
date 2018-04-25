<?php

function iqdb($photo)
{
$address = file('http://iqdb.org?url='.$photo);

$exploded_address = explode(trim('Could not find your image on any of the selected services.'), implode(" ", $address));

if((count($exploded_address))!=1)
{
return 0;
}
else
{
return 1;
}

}

?>