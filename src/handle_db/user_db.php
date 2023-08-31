<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require_once($_SERVER["DOCUMENT_ROOT"] . "/src/model/conecction.php");
    $user = $_POST["email"];
    $pass = $_POST["password"];


    $stmt = $pdo->query("SELECT * FROM users WHERE correo = '$user' AND role_id = 1");


    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    var_dump($row);


    if ($row) {
        header("location: /src/view/adminitrador/dashboard.php ");

        exit();
    } else {
        header("location: /src/view/login.php");


        exit();
    }
}
