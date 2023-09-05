<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    $nuevoNombreClase = $_POST['nuevoNombreMateria'];
    $nuevoMaestro = $_POST['opcion'];
    $idClase = $_POST["id"];

    
    
   
    $stmt = $pdo->prepare("UPDATE curso SET name = :nombreClase WHERE id = :idClase");
    $stmt->bindParam(':nombreClase', $nuevoNombreClase);
    $stmt->bindParam(':idClase', $idClase);
    $stmt->execute();
    
    $stmt2 = $pdo->prepare("UPDATE curso_maestro SET maestro_id = :nuevoMaestro WHERE curso_id = :idClase");
    $stmt2->bindParam(':nuevoMaestro', $nuevoMaestro);
    $stmt2->bindParam(':idClase', $idClase);
    $stmt2->execute();
    
    
  
    header('Location: /ruta_de_tu_pagina_principal.php');
    exit();
}
?>