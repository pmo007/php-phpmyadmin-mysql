<!DOCTYPE html>
<html>
<head>
    <title>Mes jobs</title>
</head>
<body>
    <h1>Mes jobs</h1>
	
	
	
	<?php

$host = "mysql"; // Le host est le nom du service, présent dans le docker-compose.yml
$dbname = "mydatabase";
$charset = "utf8";
$port = "3306";
$username = "root";
$password = "secret";

try {
    $pdo = new PDO(
        dsn: "mysql:host=$host;dbname=$dbname;charset=$charset;port=$port",
        username: $username,
        password: $password,
    );

    $MesJobs = $pdo->query("SELECT * FROM MesJobs");

    echo '<pre>';
    foreach ($MesJobs->fetchAll(PDO::FETCH_ASSOC) as $MesJobs) {
        print_r($MesJobs);
    }
    echo '</pre>';

} catch (PDOException $e) {
    throw new PDOException(
        message: $e->getMessage(),
        code: (int)$e->getCode()
    );
}
	?>
</body>
</html>