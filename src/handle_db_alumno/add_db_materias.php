<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/src/model/conecction.php");
if (isset($_POST['inscribir']) && $_POST['inscribir'] === 'Inscribir') {

    $materia_id = $_POST['materia_id'];
    session_start();
    $user_id = $_SESSION['user_id'];

    $query = "INSERT INTO curso_alumno(alumno_id,curso_id)VALUES($user_id,$materia_id) ";
    $pdo->query($query);
    header("location: /src/view/alumno/dashboard.php");
}
