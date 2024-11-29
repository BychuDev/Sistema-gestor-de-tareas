<?php

require '../modelo/db.php';
$con = connection();
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $usuario        = $_POST["usuario"];
    $nombre2       = $_POST["nombre2"];
    $email          = $_POST["email"];
    $cargo = $_POST["cargo"];
    $password   = $_POST['password'];
   
    // Verificación de que no haya campos con caracteres especiales
   
    $usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
    $nombre2 = filter_input(INPUT_POST,'nombre2',FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    $cargo = filter_input(INPUT_POST, 'cargo', FILTER_SANITIZE_STRING);
    $password = password_hash($password, PASSWORD_DEFAULT);

    if (
        empty($usuario) || empty($nombre2) || empty($email) || empty($cargo) || empty($password)
    ) {
        header("Location: ../vista/registro.php?error=1");
        exit();
    }
}
$id = null;
$stmt = $con->prepare("INSERT INTO usuarios (usuario, nombre2, email, cargo, password) VALUES (:usuario, :nombre2, :email, :cargo, :password);");
$stmt -> bindParam(':usuario',$usuario);
$stmt -> bindParam(':nombre2',$nombre2);
$stmt -> bindParam(':email',$email);
$stmt -> bindParam(':cargo',$cargo);
$stmt -> bindParam(':password',$password);
if ($stmt -> execute()) {
	header("Location: ../vista/admin.php");
	exit();
}else{
	header("Location: register.php?error=2");
	exit();
}
?>