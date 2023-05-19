<?php
$ip = $_SERVER['REMOTE_ADDR'];
$country = geoip_country_name_by_name($ip);

if($_POST["ipadress"]==null){
    
    if($country==null){
        echo '<meta http-equiv="refresh" content="0;url=form.html">';
        exit;
    }
    else{
        echo 'Twoje IP: '.$ip.'<br>';
        echo 'Twój kraj: '.$country;
    }
}
else{
    $ip = $_POST["ipadress"];
    $country = geoip_country_name_by_name($ip);
        
    echo 'Twoje IP: '.$ip.'<br>';
    echo 'Twój kraj: '.$country;    
}
?>