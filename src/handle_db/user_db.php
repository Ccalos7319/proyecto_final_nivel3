<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/src/model/conecction.php");

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    $usuario = $_POST['email'];
    $contrasena =$_POST['password'];

    $consulta = "SELECT id_user, passwrd, role_id FROM users WHERE correo = :usuario";
    $stmt = $pdo->prepare($consulta);
    $stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR);
    $stmt->execute();
    $usuarioInfo = $stmt->fetch(PDO::FETCH_ASSOC);

    
    if ($usuarioInfo) {
        $contrasenaAlmacenada = $usuarioInfo['passwrd'];
        $roleID = $usuarioInfo['role_id'];

        if ($roleID === 1) { 
           
            if ($contrasena === $contrasenaAlmacenada) {
                // Contraseña correcta, establece la sesión y redirige al usuario a la página de inicio
                $_SESSION['user_id'] = $usuarioInfo['id_user'];
                $_SESSION['user_role'] = $roleID; 
                header("location: /src/view/adminitrador/dashboard.php");
                exit();
            } elseif (password_verify($contrasena, $contrasenaAlmacenada)) {
                $_SESSION['user_id'] = $usuarioInfo['id_user'];
                $_SESSION['user_role'] = $roleID; 
                header("location: /src/view/adminitrador/dashboard.php");
                exit();
            } else {
                
                header("location: /src/view/login.php");
            }
        } elseif ($roleID === 2 ) { 
            
            if (password_verify($contrasena, $contrasenaAlmacenada)) {
                // Contraseña correcta, establece la sesión y redirige al usuario a la página de inicio
                $_SESSION['user_id'] = $usuarioInfo['id_user'];
                $_SESSION['user_role'] = $roleID; 
                header('Location: /src/view/maestro/dashboard.php'); 
                exit();
            } elseif ($contrasena === $contrasenaAlmacenada) {
                $_SESSION['user_id'] = $usuarioInfo['id_user'];
                $_SESSION['user_role'] = $roleID; 
                header('Location: /src/view/maestro/dashboard.php'); 
                exit();
            } else {
                header("location: /src/view/login.php");
                
            }
        } elseif ($roleID === 3) {
            if (password_verify($contrasena, $contrasenaAlmacenada)) {
                // Contraseña correcta, establece la sesión y redirige al usuario a la página de inicio
                $_SESSION['user_id'] = $usuarioInfo['id_user'];
                $_SESSION['user_role'] = $roleID; 
                header("location: /src/view/alumno/dashboard.php"); 
                exit();
            } elseif ($contrasena === $contrasenaAlmacenada) {
                $_SESSION['user_id'] = $usuarioInfo['id_user'];
                $_SESSION['user_role'] = $roleID; 
                header("location: /src/view/alumno/dashboard.php"); 
                exit();
            }else {
               
                header("location: /src/view/login.php");
            }
        }
    } else {
        
        header("location: /src/view/login.php");
    }
}

?>

