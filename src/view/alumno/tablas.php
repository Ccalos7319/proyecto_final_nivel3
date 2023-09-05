<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/src/model/conecction.php");



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="/dist/output.css" rel="stylesheet">
</head>

<body>


    <table id="table1" class=" border-solid border-2 border-indigo-600 w-[90%] ml-10" style="display: none;">
        <thead class="">
            <tr class="">

                <th>#</th>
                <th>Email/Usuario</th>
                <th>Permiso</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>

        </thead>
        <tbody>

            <?php


            $stmnt = $pdo->query("SELECT *  FROM users u  inner join roles r on u.role_id  = r.id_roles;");

            while ($rowper = $stmnt->fetch(PDO::FETCH_ASSOC)) {
                if ($rowper["role_id"] === "") {
            ?>
                    <tr>
                        <th><?= $rowper["id_user"] ?></th>
                        <th><?= $rowper["correo"] ?></th>


                        <th><a href="/src/view/adminitrador/edit.php?id=<?= $idpermiso ?>"><img src="/public/edit.svg" alt=""></a></th>

                    </tr>

                <?php
                } else {
                    $idpermiso = $rowper["id_user"];

                ?>
                    <tr>
                        <th><?= $rowper["id_user"] ?></th>
                        <th><?= $rowper["correo"] ?></th>
                        <th><?= $rowper["name"] ?></th>
                        <th>Activo</td>

                        <th><a href="/src/view/adminitrador/edit.php?id=<?= $idpermiso ?>"><img src="/public/edit.svg" alt=""></a></th>

                    </tr>
            <?php

                }
            }


            ?>


        </tbody>
    </table>


    <div id="table2" style="display: none;">
        <div class="flex justify-between w-[50%] ml-10 p-3 ">
            <p>Esquema de clases</p>
        </div>
        <div class="flex gap-2">

            <table class=" border-solid border-2 border-indigo-600 w-[50%] ml-10">
                <thead class=" ">
                    <tr class="">

                        <th>#</th>
                        <th>Materia</th>
                        <th>Darse de baja</th>

                    </tr>

                </thead>
                <tbody>
                    <?php


                    $stmnt = $pdo->query("SELECT u.nombre AS nombre_alumno, c.name AS materia_inscrita, c.id AS curso_id
                    FROM users u
                    INNER JOIN curso_alumno ca ON u.id_user = ca.alumno_id
                    INNER JOIN curso c ON ca.curso_id = c.id;
                    ");

                    while ($rowMateria = $stmnt->fetch(PDO::FETCH_ASSOC)) {
                            $idMateria = $rowMateria["curso_id"];
                           
                    ?>
                        <tr>
                            <th><?= $rowMateria["curso_id"] ?></th>
                            <th><?= $rowMateria["materia_inscrita"] ?></th>


                            <th><a href="/src/handle_db_alumno/delete_db_materias.php?id=<?= $idMateria ?>"><img src="/public/delete.svg" alt=""></a></th>

                        </tr>

                    <?php
                    }

                    ?>

                </tbody>
            </table>

            <div class="border-solid border-2 border-gray-200 w-[45%] pl-4">
                <p>Materias para inscribir</p>
                <p class=" font-bold">Selecciones la(s) Clase(s) usa la tecla ctrl</p>
                <div class="  w-[90%] h-[200px] border-solid border-2 border-gray-300">
                    <?php
                    $stmnt = $pdo->query("SELECT * FROM curso");
                    while ($row = $stmnt->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                        <form action="/src/handle_db_alumno/add_db_materias.php" class=" flex" method="post">
                            <label class=" cursor-pointer" for="inscribir"><?= $row["name"] ?></label>
                            <input type="hidden" name="materia_id" value="<?= $row["id"] ?>">
                            <button type="submit" id="inscribir" name="inscribir" value="Inscribir">Inscribirse</button>
                        </form>
                    <?php
                    }
                    ?>
                </div>
                <div class="flex justify-end p-4">
                    <button class="  bg-[#007aff] w-24 h-8 rounded-md text-white font-semibold" type="submit">Inscribir</button>
                </div>

            </div>
        </div>


    </div>

    <div class="  h-[90vh]" id="table3" style="display: none;">
        <div class=" flex justify-between p-4">
            <p class=" pl-4 font-semibold text-2xl">Editar datos de perfil</p>
            <div class="flex gap-2">
                <p class=" text-blue-600">Home</p>
                <p>/</p>
                <p>Dashboard</p>
            </div>

        </div>
        <?php



        $user_id = $_SESSION['user_id'];
        $stmt = $pdo->prepare("SELECT * FROM users WHERE id_user = ?");
        $stmt->execute([$user_id]);
        $student = $stmt->fetch(PDO::FETCH_ASSOC);
        ?>

        <form method="post" action="/src/handle_db_alumno/edit_db_alumno.php" class="flex flex-col w-[90%] ml-4 gap-4">
            <p>Informacion de Usuario</p>
            <input type="text" hidden value="<?= $student["id_user"] ?>" name="id">
            <label class=" font-semibold" for="matricula">Matricula</label>
            <input class=" rounded-lg h-8" type="text" name="matricula" id="matricula">
            <label class=" font-semibold" for="correo">Correo Electronico</label>
            <input class=" rounded-lg h-8" type="email" name="correo" id="correo" value="<?= $student["correo"] ?>">
            <label class=" font-semibold" for="password">Contraseña ingresa para cambiar la contraseña</label>
            <input class=" rounded-lg h-8" type="password" name="password" id="password">
            <label class=" font-semibold" for="nombre">Nombre(s)</label>
            <input class=" rounded-lg h-8" type="text" name="nombre" id="nombre" value="<?= $student["nombre"] ?>">
            <label class=" font-semibold" for="direccion">Direccíon</label>
            <input class=" rounded-lg h-8" type="text" name="direccion" id="direccion" value="<?= $student["direccion"] ?>">
            <label class=" font-semibold" for="fechanac">Fecha de nacimiento</label>
            <input class=" rounded-lg h-8" type="date" name="fechanac" id="fechanac" value="<?= $student["fechanac"] ?>">

            <button class=" rounded-lg h-8 w-[138px] bg-[#017afe] text-white" type="submit">Guardar cambios</button>
        </form>

    </div>

</body>

</html>