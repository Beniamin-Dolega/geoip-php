<?php
if($_POST["ipadress"]!=null){
    $ip = $_POST["ipadress"];
}
else{
    $ip = $_SERVER['REMOTE_ADDR'];
    $country = geoip_country_name_by_name($ip);
}

if($_POST["ipadress"]==null && $country==null){    
    echo '<meta http-equiv="refresh" content="0;url=form.html">';
    exit;
}
else{
    $country = geoip_country_name_by_name($ip);
        
    echo 'Twoje IP: '.$ip.'<br>';

    if($country!=null){
        echo 'Twój kraj: '.$country;
    }
    else{
        echo 'Twój kraj: Skrypt nie jest w stanie określić twojego kraju.';
    }
}
?>