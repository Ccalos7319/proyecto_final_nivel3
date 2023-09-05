<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/src/model/conecction.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $nombreMateria = $_POST['nombreMateria'];
    $idMaestro = $_POST['opcion'];

   
    $stmt = $pdo->prepare("INSERT INTO curso (name) VALUES (:nombreMateria)");
    $stmt->bindParam(':nombreMateria', $nombreMateria);
    $stmt->execute();

  
    $nuevaClaseId = $pdo->lastInsertId();

  
    $stmt2 = $pdo->prepare("INSERT INTO curso_maestro (curso_id, maestro_id) VALUES (:cursoId, :maestroId)");
    $stmt2->bindParam(':cursoId', $nuevaClaseId);
    $stmt2->bindParam(':maestroId', $idMaestro);
    $stmt2->execute();

    header("location: /src/view/adminitrador/dashboard.php");
}




?>
