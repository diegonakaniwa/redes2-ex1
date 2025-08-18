<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Connecting to a Database via PHP</title>
</head>
<body>
    <h1>Trying to connect to the local database...</h1>
<?php
#phpinfo();
date_default_timezone_set("America/Cuiaba");

$servername = getenv('DB_HOST');
$database = getenv('DB_NAME');
$username = getenv('DB_USER');
$password = getenv('DB_PASSWORD');

try {
    $conn = new PDO("pgsql:host=$servername;port=5432;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully to PostgreSQL!<br>\n";
    echo date("Y-m-d H:i:s");
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage() . "<br>\n";
    echo date("Y-m-d H:i:s");
}
?>
</body>
</html>