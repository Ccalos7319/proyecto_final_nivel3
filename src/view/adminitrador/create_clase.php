<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/src/model/conecction.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Maestro</title>
    <link href="/dist/output.css" rel="stylesheet">
</head>

<body>
    <div class="flex flex-col justify-center  h-screen items-center">

        <form class=" w-[350px] h-[300px]  flex flex-col gap-4 justify-center  rounded-2xl bg-slate-200 p-4" action="/src/handle_db/create_db_clase.php" method="post">
            <h1 class="text-[30px] font-semibold">Agregar Clase</h1>


            <label class=" font-semibold" for="nombreMateria">Nombre de la materia </label>
            <input class="w-[310px] h-[30px] rounded-md" type="text" name="nombreMateria">

            <label class=" font-semibold" for="maestrosDisponibles">Maestros disponibles para la clase</label>
            <select class="w-[310px] h-[30px] rounded-md" name="opcion">
            <?php
    
            $stmt =  $pdo->query("SELECT * FROM users where role_id = 2");
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <option  value="<?= $row["id_user"] ?>"><?= $row["nombre"] ?></option>

            <?php
            }

            ?>
            </select>



            <div class="flex gap-3 justify-end w-[310px] pt-3">
            <a href="/src/view/adminitrador/dashboard.php " class="bg-[#6c757c] text-white rounded-md w-20 h-7 text-center">Close</a>
                <button class="bg-[#007aff] w-20 h-7 rounded-md text-white font-semibold" type="submit">Crear</button>

            </div>

        </form>
    </div>
</body>

</html>