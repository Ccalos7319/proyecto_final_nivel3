<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/src/model/conecction.php");
session_start();

$user_id = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT * FROM users WHERE id_user = ?");
$stmt->execute([$user_id]);
$student = $stmt->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Alumno</title>
    <link href="/dist/output.css" rel="stylesheet">
    <script src="/src/view/alumno/javascript/script.js" defer></script>
</head>

<body class="flex ">
    <nav class=" bg-[#353a40] text-white h-screen w-[25vh] flex flex-col gap-6">
        <div class="flex items-center gap-3 border-b-2 pl-3 pb-3">
            <img class=" w-20 rounded-full " src="/public/logo.jpg" alt="logoUniversidad">
            <p>Universidad</p>
        </div>
        <div class=" border-b-2 pl-3 pb-3">
            <p>Alumno</p>
            <p><?= $student["nombre"] ?></p>
        </div>
        <div class="pl-3 flex flex-col gap-3 ">
            <p>MENU ALUMNO</p>
            <div class=" flex gap-3">
                <img src="/public/permiso.png" alt="icono">
                <a href="#" onclick="showTable(1)">Ver Calificaciones</a>
            </div>
            <div class="flex gap-3">
                <img src="/public/maestro.png" alt="icono">
                <a href="#" onclick="showTable(2)">Administra tus Clases</a>
            </div>


        </div>
    </nav>


    <main class="  w-full">
        <nav class=" flex justify-between h-[5vh] ">
            <div class="flex items-center gap-4  p-4">
                <img src="/public/menu.png" alt="menu">
                <p>Home</p>
            </div>
            <div class="flex items-center gap-2  p-4">


                <p><?= $student["nombre"] ?></p>
                <img src="/public/expand.png" alt="despliegue">
                <div class=" border-solid border-2 border-gray-300 w-32 h-16 flex flex-col gap-2 shadow-xl absolute  mt-24">
                    <div class="flex gap-2">
                        <img src="/public/account.svg" alt="acount">
                        <a href="#" onclick="showTable(3)">Perfil</a>
                    </div>
                    <div class="flex gap-2">
                        <img src="/public/logout.svg" alt="logout">
                        <a href="" class=" text-red-400">Logout</a>
                    </div>


                </div>
            </div>

        </nav>
        <section class=" bg-[#f5f6fa] h-[90vh] flex flex-col gap-6">
            <div class=" flex justify-between p-4 mt-8">
                <p class=" pl-4 font-semibold text-2xl ">Dashboard</p>


            </div>
            <div class=" bg-white w-[700px] h-[80px] flex flex-col justify-center pl-6 ml-6 shadow-lg">
                <p>Bienvenido</p>
                <p>Seleciona la accion que quieras realizar en las pestañas del menu de la izquierda</p>
            </div>


            <?php
            require_once($_SERVER["DOCUMENT_ROOT"] . "/src/view/alumno/tablas.php")
            ?>


        </section>
        <footer class="h-[5vh] flex justify-between items-center">
            <div class=" flex pl-4 ">
                <p>Copyright c 2014-2021</p>
                <p>AdminLTE.io.</p>
                <p>All rights reserved.</p>
            </div>
            <p class="pr-4">Anything you want</p>
        </footer>
    </main>
</body>

</html>