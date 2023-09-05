<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/src/model/conecction.php");
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $pdo->query("DELETE FROM curso_alumno where curso_id = $id");
    header("location: /src/view/alumno/dashboard.php");
}

?>
