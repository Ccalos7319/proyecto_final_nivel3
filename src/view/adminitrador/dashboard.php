<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Administrador</title>
    <link href="/dist/output.css" rel="stylesheet">
    <script src="/src/view/adminitrador/javaScript/script.js"defer></script>
</head>
<body class="flex ">
    <nav class=" bg-[#353a40] text-white h-screen w-[25vh] flex flex-col gap-6">
        <div class="flex items-center gap-3 border-b-2 pl-3 pb-3">
            <img class=" w-20 rounded-full " src="/public/logo.jpg" alt="logoUniversidad">
            <p>Universidad</p>
        </div>
        <div class=" border-b-2 pl-3 pb-3">
            <p>Admin</p>
            <p>Administrador</p>
        </div>
        <div class="pl-3 flex flex-col gap-3 ">
            <p>MENU ADMINISTRADOR</p>
            <div class=" flex gap-3">
                <img src="/public/permiso.png" alt="icono">
               <a href="#" onclick="showTable(1)">Permisos</a> 
            </div>
            <div class="flex gap-3">
                <img src="/public/maestro.png" alt="icono">
               <a href="#" onclick="showTable(2)">Maestro</a> 
            </div>
            <div class="flex gap-3">
                <img src="/public/alumno.png" alt="icono">
               <a href="#" onclick="showTable(3)">Alumnos</a> 
            </div>
            <div class="flex gap-3">
                <img src="/public/board.png" alt="icono">
               <a href="#" onclick="showTable(4)">clases</a> 
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
                <p>Administrador</p>
                <img src="/public/expand.png" alt="despliegue">
            </div>
        </nav>
        <section class=" bg-[#f5f6fa] h-[90vh] flex flex-col gap-6">
            <div class=" flex justify-between p-4" >
                <p class=" pl-4 font-semibold text-2xl">Dashboard</p>
                <div class="flex gap-2">
                    <p class=" text-blue-600">Home</p>
                    <p>/</p>
                    <p>Dashboard</p>
                </div>
                
            </div>
            <div class=" bg-white w-[700px] h-[80px] flex flex-col justify-center pl-6 ml-6 shadow-lg">
                <p>Bienvenido</p>
                <p>Seleciona la accion que quieras realizar en las pestañas del menu de la izquierda</p>
            </div>


            <?php
            require_once($_SERVER["DOCUMENT_ROOT"]."/src/view/adminitrador/tablas.php")
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