<?php
echo '<head><link rel="stylesheet" type="text/css" href="style.css"></head>';

$hostname = getenv('HOSTNAME');
$dbname = getenv('DBNAME');
$usrnm = getenv('USER');
$pwd = getenv('PASSWORD');
$db = 'mysql:host='.$hostname.';dbname='.$dbname;

try {
    $db = new PDO($db, $usrnm, $pwd);
} 
catch (PDOException $e) {
    die('Błąd połączenia z bazą danych: ' . $e->getMessage());
}

//db_query
$dbquery = "SELECT Country, COUNT(*) AS Visitors FROM ip_query_data GROUP BY Country";
$result = $db->query($dbquery);

//table
echo '<table><tr><th>Kraj</th><th>Liczba odwiedzających</th></tr>';

while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    echo '<tr><td>'.$row['Country'].'</td>';
    echo '<td>'.$row['Visitors'].'</td></tr>';
}

echo '</table></br>';

//goback
echo '<a href="index.php">Powróć do strony głównej</a>';