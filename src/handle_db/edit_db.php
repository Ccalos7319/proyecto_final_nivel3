<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/src/model/conecction.php");
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
    <title>Document</title>
</head>

<body>

    <form action="" method="post">
        <input type="text" name="id" hidden value="<?= $data["id_user"] ?>">
        <label for="correo">Email del Usuario </label>
        <input type="text" name="correo"  value="<?= $data["correo"] ?>">
        <label for="wage">Rol de usuario </label>
        <input type="text" name="wage" value="<?= $data[""] ?>">

        <button type="submit">Save</button>
    </form>
</body>

</html>