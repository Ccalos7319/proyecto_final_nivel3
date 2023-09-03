<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/src/model/conecction.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombreMateria = $_POST["nombreMateria"];

    
    $pdo->query("INSERT INTO curso(name)VALUES('$nombreMateria');");

    header("location: /src/view/adminitrador/dashboard.php");
}




?>
