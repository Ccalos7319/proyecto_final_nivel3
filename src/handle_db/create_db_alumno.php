<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/src/model/conecction.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $dni = $_POST["dni"];
    $correo = $_POST["correo"];
    $nombre= $_POST["nombre"];
    $direccion = $_POST["direccion"];
    $fechanac=$_POST["fecnac"];
    
    session_start();
    $user_id = $_SESSION['user_id'];
    $codigo_alumno = strtoupper(substr($nombre, 0, 3) . substr($dni, 0, 4)) . $user_id;

    $query = "INSERT INTO users (dni,correo,nombre,direccion,fechanac,codigo_alumno,role_id) VALUES ('$dni','$correo','$nombre','$direccion','$fechanac','$codigo_alumno',3) ";
    $pdo->query($query);

    header("location: /src/view/adminitrador/dashboard.php");
}

?>