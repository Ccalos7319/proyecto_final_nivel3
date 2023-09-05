<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/src/model/conecction.php");



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

   

    $stmt = $pdo->prepare("SELECT id_user, role_id FROM users WHERE correo = ? AND passwrd = '$password' ");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
   
    if ($user) {
        session_start();
        $_SESSION['user_id'] = $user['id_user'];
        $_SESSION['role_id'] = $user['role_id'];
    
       
        if ($user['role_id'] == 1) {
            header("location: /src/view/adminitrador/dashboard.php");
        } elseif ($user['role_id'] == 2) {
            header('Location: /src/view/maestro/dashboard.php');
        } elseif ($user['role_id'] == 3) {
            header("location: /src/view/alumno/dashboard.php");
        }
        exit();
    } else {
        header("location: /src/view/login.php");
    }
    
}

