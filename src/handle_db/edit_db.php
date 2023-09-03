<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && $_POST["correo"] !== "" && $_POST["rol"] !== "") {
    $email = $_POST["correo"];
    $rol=$_POST["rol"];
    $id=$_POST["id"];
    require_once($_SERVER["DOCUMENT_ROOT"]."/src/model/conecction.php");
    $query = "UPDATE users SET correo ='$email', role_id ='$rol' where id_user = $id ";
    $stmnt = $pdo->query($query);
    header("location: /src/view/adminitrador/dashboard.php");
}else {
    echo "Ingrese datos datos validos";
    header("location: /src/view/adminitrador/edit.php");
}

?>
