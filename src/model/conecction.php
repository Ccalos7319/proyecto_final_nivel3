<?php
try {
    $hostname = "localhost";
    $username = "root";
    $pass = "";
    $dbname = "plataformavirtual";

    $dsn = "mysql:host=$hostname;dbname=$dbname";
    $pdo = new PDO($dsn, $username, $pass);

    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    echo " Conexion exitosa a la base de datos";

} catch (\Throwable $e) {
    echo "Error de conexion" . $e->getMessage();

}
