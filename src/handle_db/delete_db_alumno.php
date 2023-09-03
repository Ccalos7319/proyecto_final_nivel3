
<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/src/model/conecction.php");

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $stmnt = $pdo->query("DELETE FROM users where id_user = $id");
    header("location: /src/view/adminitrador/dashboard.php");
}
