<?php
include("../modelo/db.php");
$con = connection();
$usuario = $_SESSION['username'];
$stmt = $con->prepare("SELECT * FROM usuarios WHERE :usuario");
$stmt->bindParam(':user', $user); //se bindean los parametros
$stmt->execute();
return $stmt->fetchAll(PDO::FETCH_ASSOC);
?>