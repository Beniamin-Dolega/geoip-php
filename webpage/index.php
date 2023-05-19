<?php
$ip = $_SERVER['REMOTE_ADDR'];
$country = geoip_country_code3_by_name($ip);

echo 'Twoje IP: '.$ip.'<br>';
echo 'Twój kraj: '.$country;
?>