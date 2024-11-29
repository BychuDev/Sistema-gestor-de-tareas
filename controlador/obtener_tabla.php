<?php
include("../modelo/db.php");
$con = connection();
function get_table($tabla){
    $stmt = $con->prepare("SELECT * FROM :tabla");
    $stmt->bindParam(':tabla', $tabla); //se bindean los parametros
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function get_data_usuario(){
    $usuario = $_SESSION['username'];
    $stmt = $con->prepare("SELECT * FROM usuarios WHERE :usuario");
    $stmt->bindParam(':user', $user); //se bindean los parametros
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
?>