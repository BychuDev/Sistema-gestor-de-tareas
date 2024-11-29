<?php

require '../modelo/db.php';
$con = connection();
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $usuario        = $_POST["usuario"];
    $password       = $_POST["password"];
    $cargo          = $_POST["cargo"];
   
    // Verificación de que no haya campos con caracteres especiales
   
    $usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    $cargo = filter_input(INPUT_POST, 'cargo', FILTER_SANITIZE_STRING)
    $password = password_hash($password, PASSWORD_DEFAULT);

    if (
        empty($usuario) || empty($password) || empty($cargo) 
    ) {
        echo "Todos los campos son obligatorios.";
        header("Location: registro.php?error=1");
        exit();
    }
}
$id = null;
$password = password_hash($password,PASSWORD_DEFAULT); //hashing de la contraseña, todas deben ser hasheadas
$stmt = $con -> prepare("INSERT INTO usuarios VALUES (:usuario, :password, :cargo);");
$stmt -> bindParam(':usuario',$usuario);
$stmt -> bindParam(':password',$password);
$stmt -> bindParam(':cargo',$cargo);
if ($stmt -> execute()) {
	header("Location: ../index.php");
	exit();
}else{
	header("Location: register.php?error=2");
	exit();
}
?>