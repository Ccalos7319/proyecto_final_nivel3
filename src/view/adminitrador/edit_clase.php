<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/src/model/conecction.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $idclase = $_POST["idclase"];
    $nuevaClase = $_POST["clase"];
    $nuevoMaestro = $_POST["maestro"];


    try {

        $sql = "UPDATE curso SET name = :nuevaClase WHERE id = :idclase";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":nuevaClase", $nuevaClase);
        $stmt->bindParam(":idclase", $idclase);
        $stmt->execute();


        $sql = "UPDATE curso_maestro SET maestro_id = :nuevoMaestro WHERE curso_id = :idclase";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":nuevoMaestro", $nuevoMaestro);
        $stmt->bindParam(":idclase", $idclase);
        $stmt->execute();


        header("location: /src/view/adminitrador/dashboard.php");
        exit();
    } catch (PDOException $e) {
        echo "Error al actualizar la clase: " . $e->getMessage();
    }
}


if (isset($_GET["id"])) {
    $idclase = $_GET["id"];


    try {


        $sql = "SELECT c.name AS clase, cm.maestro_id AS maestro FROM curso AS c
                LEFT JOIN curso_maestro AS cm ON c.id = cm.curso_id
                WHERE c.id = :idclase";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":idclase", $idclase);
        $stmt->execute();
        $clase = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error al obtener la información de la clase: " . $e->getMessage();
    }
} else {

    echo "ID de clase no válido";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Clase</title>
    <link href="/dist/output.css" rel="stylesheet">
</head>

<body>
    <div class="flex flex-col justify-center  h-screen items-center">

        <form method="post" class="  w-[350px] h-[300px]  flex flex-col gap-2 justify-center  rounded-2xl bg-slate-200 p-4">
            <h1 class="text-[30px] font-semibold">Editar Clase</h1>
            <input class="w-[310px] h-[30px] rounded-md" type="hidden" name="idclase" value="<?= $idclase ?>">
            <label class=" font-semibold" for="clase">Nombre de la Clase:</label>
            <input class="w-[310px] h-[30px] rounded-md" type="text" id="clase" name="clase" value="<?= $clase["clase"] ?>">
            <br>
            <label class=" font-semibold" for="maestro">Maestro:</label>
            <select class="w-[310px] h-[30px] rounded-md" id="maestro" name="maestro">

                <?php



                try {
                    $sql = "SELECT id_user, nombre FROM users WHERE role_id = 2";
                    $stmt = $pdo->query($sql);
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $selected = ($row["id_user"] == $clase["maestro"]) ? "selected" : "";
                        echo "<option value='{$row["id_user"]}' $selected>{$row["nombre"]}</option>";
                    }
                } catch (PDOException $e) {
                    echo "Error al obtener la lista de maestros: " . $e->getMessage();
                }
                ?>
            </select>
            <br>
            <div class="flex justify-end gap-2">
                <a href="/src/view/adminitrador/dashboard.php " class="bg-[#6c757c] text-white rounded-md w-20 h-7 text-center">Close</a>
                <button class="bg-[#007aff] w-32 h-7 rounded-md text-white font-semibold" type="submit">Guardar cambios</button>
            </div>


        </form>
    </div>


</body>

</html>