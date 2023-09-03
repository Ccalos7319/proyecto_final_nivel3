<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/src/model/conecction.php");
if (isset($_GET["id"])) {

    $id = $_GET["id"];


    $stmnt = $pdo->prepare("SELECT * FROM users where id_user = :id");
    $stmnt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmnt->execute();

    $data = $stmnt->fetch(PDO::FETCH_ASSOC);
} else {
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link href="/dist/output.css" rel="stylesheet">
</head>

<body>
    <div class="flex flex-col justify-center  h-screen items-center">

        <form class=" w-[350px] h-[350px]  flex flex-col gap-6 justify-center  rounded-2xl bg-slate-200 p-4" action="/src/handle_db/edit_db.php" method="post">
            <h1 class="text-[30px] font-semibold">Editar Permisos</h1>
            <input type="text" name="id" hidden value="<?= $data["id_user"] ?>">
            <label class=" font-semibold" for="correo">Email del Usuario </label>
            <input class="w-[310px] h-[30px] rounded-md" type="text" name="correo" value="<?= $data["correo"] ?>">
            <label class=" font-semibold" for="rol">Rol de usuario </label>
            <input class="w-[310px] h-[30px] rounded-md" type="text" name="rol" value="<?= $data["role_id"] ?>">
            <div class="flex gap-3 justify-end w-[310px]" >
                <button class="bg-[#6c757c] text-white rounded-md w-20 h-7">Close</button>
                <button class="bg-[#007aff] w-32 h-7 rounded-md text-white font-semibold" type="submit">Guardar cambios</button>
                
            </div>

        </form>
    </div>

</body>

</html>