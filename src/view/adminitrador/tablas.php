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
        <thead class=" ">
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
            require_once($_SERVER["DOCUMENT_ROOT"] . "/src/model/conecction.php");

            $stmnt = $pdo->query("SELECT u.id_user, u.correo,r.name  FROM users u  inner join roles r on u.id_user =r.id_roles;");

            while ($row = $stmnt->fetch(PDO::FETCH_ASSOC)) {
                $id = $row["id_user"];

            ?>
                <tr>
                    <td><?= $row["id_user"] ?></td>
                    <td><?= $row["correo"] ?></td>
                    <td><?= $row["name"] ?></td>
                    <td>Activo</td>

                    <td><a href="/src/handle_db/edit_db.php?id=<?= $id ?>"><img src="/public/edit.svg" alt=""></a></td>
                    

                
                  

                </tr>


            <?php

            }


            ?>


        </tbody>
    </table>


    <table id="table2" class="table" style="display: none;">

        <thead class="border-b-2 ">
            <tr class="dark:text-white">

                <th>Id</th>
                <th>Name</th>
                <th>Wage</th>
                <th>tabla 2</th>
            </tr>

        </thead>
        <tbody>

            <tr class="h-[50px]  border-b-2 ">
                <th>carne</th>
                <th>pescado</th>
                <th>1000</th>

            </tr>


        </tbody>
    </table>


    <table id="table3" class="table" style="display: none;">
        <thead class="border-b-2 ">
            <tr class="dark:text-white">

                <th>Id</th>
                <th>Name</th>
                <th>Wage</th>
                <th>tabla3</th>
            </tr>

        </thead>
        <tbody>

            <tr class="h-[50px]  border-b-2 ">
                <th>carne</th>
                <th>pescado</th>
                <th>1000</th>

            </tr>


        </tbody>
    </table>


    <table id="table4" class="table" style="display: none;">
        <thead class="border-b-2 ">
            <tr class="dark:text-white">

                <th>Id</th>
                <th>Name</th>
                <th>Wage</th>
                <th>tabla4</th>
            </tr>

        </thead>
        <tbody>

            <tr class="h-[50px]  border-b-2 ">
                <th>carne</th>
                <th>pescado</th>
                <th>1000</th>

            </tr>


        </tbody>
    </table>
</body>

</html>