<?php
 require_once($_SERVER["DOCUMENT_ROOT"]."/src/model/conecction.php");

if ($_SERVER["REQUEST_METHOD"] === "POST" && $_POST["correo"] !== "" &&  $_POST["nombre"] !== "" && $_POST["direccion"] !== "" && $_POST["fecnac"] !== "") {
   
    $email = $_POST["correo"];
    $nombre=$_POST["nombre"];
    $id=$_POST["id"];
    $direcion = $_POST["direccion"];
    $fecnac = $_POST["fechanac"];
   
    $query = "UPDATE users SET correo ='$email', nombre ='$nombre', direccion = '$direcion', fechanac= '$fecnac'  where id_user = $id ";


    $stmnt = $pdo->query($query);

    header("location: /src/view/maestro/dashboard.php");
}else {
    echo "Ingrese datos datos validos";    
   
}

?>