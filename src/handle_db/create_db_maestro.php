<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/src/model/conecction.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $dni = $_POST["dni"];
    $correo = $_POST["correo"];
    $nombre= $_POST["nombre"];
    $direccion = $_POST["direccion"];
    $fechanac=$_POST["fecnac"];
    
    $query = "INSERT INTO users (dni,correo,nombre,direccion,fechanac,role_id) VALUES ('$dni','$correo','$nombre','$direccion','$fechanac',2) ";
    $pdo->query($query);

    header("location: /src/view/adminitrador/dashboard.php");
}

?>