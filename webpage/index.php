<?php
//checking db connection
$hostname = getenv('HOSTNAME');
$dbname = getenv('DBNAME');
$usrnm = getenv('USER');
$pwd = getenv('PASSWORD');
$db = 'mysql:host='.$hostname.';dbname='.$dbname;

try {
    $db = new PDO($db, $usrnm, $pwd);
} 
catch (PDOException $e){
    die('Błąd połączenia z bazą danych: ' . $e->getMessage());
}

//headline
$query = "SELECT COUNT(*) AS total FROM ip_query_data";
$result = $db->query($query);

if ($result) {
    $row = $result->fetch(PDO::FETCH_ASSOC);
    $count = $row['total'];
} else {
    $count = 0;
}
echo '<a href="info.php">Tą stronę odwiedziło dotychczas ' . $count . ' osób</a></br>';

//query
$ip = $_SERVER['REMOTE_ADDR'];
$country = geoip_country_name_by_name($ip);
$date = date("Y-m-d H:i:s");

if($_POST["ipadress"]==null && $country==null){    
    echo '<meta http-equiv="refresh" content="0;url=form.html">';
    exit;
}
else{
    //user feedback
    $request_ip = $_POST["ipadress"];
        
    echo 'Twoje IP: '.$ip.'<br>';

    if($country==null){
        $country = geoip_country_name_by_name($request_ip);
        
        if($country!=null){
            echo 'Twój kraj: '.$country;
        }
        else{
            echo 'Twój kraj: Skrypt nie jest w stanie określić twojego kraju.';
            $country = "Nie dopasowano";
        }

        //database insertion
        $sql = 'INSERT INTO ip_query_data(Date, User_ip, Request_ip, Country) VALUES(:date, :ip, :request_ip, :country)';
        $statement = $db->prepare($sql);
        $statement->execute(array(
            ':date' => $date,
            ':ip' => $ip,
            ':request_ip' => $request_ip,
            ':country' => $country
        ));
    }
    else{     
        echo 'Twój kraj: '.$country;
    }   
}