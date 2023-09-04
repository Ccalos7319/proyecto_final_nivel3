<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/src/model/conecction.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $nombreMateria = $_POST['nombreMateria'];
    $idMaestro = $_POST['opcion'];

    // Insertar la nueva clase en la base de datos
    $stmt = $pdo->prepare("INSERT INTO curso (name) VALUES (:nombreMateria)");
    $stmt->bindParam(':nombreMateria', $nombreMateria);
    $stmt->execute();

    // Obtener el ID de la nueva clase
    $nuevaClaseId = $pdo->lastInsertId();

    // Asociar la clase con el maestro en la tabla curso_maestro
    $stmt2 = $pdo->prepare("INSERT INTO curso_maestro (curso_id, maestro_id) VALUES (:cursoId, :maestroId)");
    $stmt2->bindParam(':cursoId', $nuevaClaseId);
    $stmt2->bindParam(':maestroId', $idMaestro);
    $stmt2->execute();

    header("location: /src/view/adminitrador/dashboard.php");
}




?>
