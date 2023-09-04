<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/src/model/conecction.php");
if (isset($_GET['id'])) {
    $idClase = $_GET['id'];
   
    try {
      
        $sql = "DELETE FROM curso WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $idClase, PDO::PARAM_INT);
     
        $stmt->execute();
        
        header("location: /src/view/adminitrador/dashboard.php");
        exit();
    } catch (PDOException $e) {
       
        echo "Error al eliminar la clase: " . $e->getMessage();
    }
} else {
}
?>
