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


    <table id="table1" class=" border-solid border-2 border-gray-300 w-[90%] ml-10" style="display: none;">
        <thead class=" ">
            <tr class="">

                <th class="border-solid border-2 border-gray-300">#</th>
                <th class="border-solid border-2 border-gray-300">Email/Usuario</th>
                <th class="border-solid border-2 border-gray-300">Permiso</th>
                <th class="border-solid border-2 border-gray-300">Estado</th>
                <th class="border-solid border-2 border-gray-300">Acciones</th>
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
                        <th class="border-solid border-2 border-gray-300"><?= $rowper["id_user"] ?></th>
                        <th class="border-solid border-2 border-gray-300"><?= $rowper["correo"] ?></th>
                        <th class="border-solid border-2 border-gray-300"><?= $rowper["name"] ?></th>
                        <th class="border-solid border-2 border-gray-300">Activo</td>

                        <th class=" flex justify-center border-solid border-2 border-gray-300 ">
                            <a href="/src/view/adminitrador/edit.php?id=<?= $idpermiso ?>"><img src="/public/edit.svg" alt=""></a>

                        </th>

                    </tr>
            <?php

                }
            }


            ?>


        </tbody>
    </table>


    <div id="table2" style="display: none;">
        <div class="flex justify-between w-[90%] ml-10 p-3 ">
            <p>lista de Maestros</p>
            <a class="bg-[#007aff] w-[140px] h-7 rounded-md text-white font-semibold text-center" href="/src/view/adminitrador/create_maestro.php">Agregar Maestro</a>
        </div>
        <table class="border-solid border-2 border-gray-300 w-[90%] ml-10">
            <thead class=" ">
                <tr class="">

                    <th class="border-solid border-2 border-gray-300">#</th>
                    <th class="border-solid border-2 border-gray-300">DNI</th>
                    <th class="border-solid border-2 border-gray-300">Nombre</th>
                    <th class="border-solid border-2 border-gray-300">Correo</th>
                    <th class="border-solid border-2 border-gray-300">Direccion</th>
                    <th class="border-solid border-2 border-gray-300">Fec. de Nacimiento</th>
                    <th class="border-solid border-2 border-gray-300">Clase Asignada</th>
                    <th class="border-solid border-2 border-gray-300">Acciones</th>
                </tr>

            </thead>
            <tbody>
                <?php

                $stmnt = $pdo->query("SELECT u.id_user AS id, u.dni, u.nombre, u.correo, u.direccion, u.fechanac, c.name AS clase_asignada FROM users AS u INNER JOIN curso_maestro AS cm ON u.id_user = cm.maestro_id INNER JOIN curso AS c ON cm.curso_id = c.id WHERE u.role_id = 2;
                ");
                while ($row = $stmnt->fetch(PDO::FETCH_ASSOC)) {
                    $idmaestro = $row["id"];

                ?>
                    <tr class="">
                        <th class="border-solid border-2 border-gray-300"><?= $row["id"] ?> </th>
                        <th class="border-solid border-2 border-gray-300"><?= $row["dni"] ?></th>
                        <th class="border-solid border-2 border-gray-300"><?= $row["nombre"] ?></th>
                        <th class="border-solid border-2 border-gray-300"><?= $row["correo"] ?></th>
                        <th class="border-solid border-2 border-gray-300"><?= $row["direccion"] ?></th>
                        <th class="border-solid border-2 border-gray-300"><?= $row["fechanac"] ?></th>
                        <th class="border-solid border-2 border-gray-300"><?= $row["clase_asignada"] ?></th>

                        <th class=" flex border-solid border-2 border-gray-300">
                            <a href="/src/view/adminitrador/edit_maestro.php?id=<?= $idmaestro ?>"><img src="/public/edit.svg" alt="edit"></a>
                            <a href="/src/handle_db/delete_db_alumno.php?id=<?= $idmaestro ?>"><img src="/public/delete.svg" alt="delete"></a>

                        </th>

                    </tr>

                <?php
                }
                ?>



            </tbody>
        </table>
    </div>

    <div id="table3" style="display: none;">
        <div class="flex justify-between w-[90%] ml-10 p-3 ">
            <p>Informacion de Alumnos</p>
            <a class="bg-[#007aff] w-[140px] h-7 rounded-md text-white font-semibold text-center" href="/src//view/adminitrador/create_alumno.php">Agregar Alumno</a>
        </div>
        <table class=" border-solid border-2 border-gray-300 w-[90%] ml-10">
            <thead class=" ">
                <tr class="">

                    <th class="border-solid border-2 border-gray-300">#</th>
                    <th class="border-solid border-2 border-gray-300">DNI</th>
                    <th class="border-solid border-2 border-gray-300">Nombre</th>
                    <th class="border-solid border-2 border-gray-300">Correo</th>
                    <th class="border-solid border-2 border-gray-300">Direccion</th>
                    <th class="border-solid border-2 border-gray-300">Fec. de Nacimiento</th>
                    <th class="border-solid border-2 border-gray-300">Acciones</th>
                </tr>

            </thead>
            <tbody>
                <?php

                $stmnt = $pdo->query("SELECT * FROM users where role_id = 3");
                while ($row = $stmnt->fetch(PDO::FETCH_ASSOC)) {
                    $idalumno = $row["id_user"];
                ?>
                    <tr class="">
                        <th class="border-solid border-2 border-gray-300"><?= $row["id_user"] ?> </th>
                        <th class="border-solid border-2 border-gray-300"><?= $row["dni"] ?></th>
                        <th class="border-solid border-2 border-gray-300"><?= $row["nombre"] ?></th>
                        <th class="border-solid border-2 border-gray-300"><?= $row["correo"] ?></th>
                        <th class="border-solid border-2 border-gray-300"><?= $row["direccion"] ?></th>
                        <th class="border-solid border-2 border-gray-300"><?= $row["fechanac"] ?></th>
                        <th class=" flex justify-center border-solid border-2 border-gray-300">
                            <a href="/src/view/adminitrador/edit_alumno.php?id=<?= $idalumno ?>"><img src="/public/edit.svg" alt="edit"></a>
                            <a href="/src/handle_db/delete_db_alumno.php?id=<?= $idalumno ?>"><img src="/public/delete.svg" alt="delete"></a>

                        </th>

                    </tr>

                <?php
                }
                ?>



            </tbody>
        </table>
    </div>



    <div id="table4" style="display: none;">
        <div class="flex justify-between w-[90%] ml-10 p-3 ">
            <p>Informacion de Clases</p>
            <a class="bg-[#007aff] w-[140px] h-7 rounded-md text-white font-semibold text-center" href="/src/view/adminitrador/create_clase.php">Agregar Clase</a>
        </div>
        <table class=" border-solid border-2 border-gray-300 w-[90%] ml-10">
            <thead class=" ">
                <tr class="">

                    <th class="border-solid border-2 border-gray-300">#</th>
                    <th class="border-solid border-2 border-gray-300">Clase</th>
                    <th class="border-solid border-2 border-gray-300">Maestro</th>
                    <th class="border-solid border-2 border-gray-300">Alumnos inscritos</th>
                    <th class="border-solid border-2 border-gray-300">Acciones</th>

                </tr>

            </thead>
            <tbody>
                <?php

                $stmnt = $pdo->query("SELECT
                c.id AS id,
                c.name AS clase,
                CONCAT(u.nombre) AS maestro,
                COUNT(ca.id) AS Num_Alumnos_Inscritos
            FROM
                curso AS c
            LEFT JOIN
                curso_maestro AS cm ON c.id = cm.curso_id
            LEFT JOIN
                users AS u ON cm.maestro_id = u.id_user
            LEFT JOIN
                curso_alumno AS ca ON c.id = ca.curso_id
            GROUP BY
                c.id, c.name, Maestro
            ");
                while ($row = $stmnt->fetch(PDO::FETCH_ASSOC)) {
                    $idclase = $row["id"];

                ?>
                    <tr class="">
                        <th class="border-solid border-2 border-gray-300"><?= $row["id"] ?> </th>
                        <th class="border-solid border-2 border-gray-300"><?= $row["clase"] ?></th>
                        <th class="border-solid border-2 border-gray-300"><?= $row["maestro"] ?></th>
                        <th class="border-solid border-2 border-gray-300"><?= $row["Num_Alumnos_Inscritos"] ?></th>


                        <th class=" flex justify-center border-solid border-2 border-gray-300">
                            <a href="/src/view/adminitrador/edit_clase.php?id=<?= $idclase ?>"><img src="/public/edit.svg" alt="edit"></a>
                            <a href="/src/handle_db/delete_db_clase.php?id=<?= $idclase ?>"><img src="/public/delete.svg" alt="delete"></a>

                        </th>

                    </tr>

                <?php
                }
                ?>



            </tbody>
        </table>
    </div>

</body>

</html>