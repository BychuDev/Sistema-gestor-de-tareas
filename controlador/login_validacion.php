<?php
require '../modelo/db.php';
session_start();
$con = connection();

if ($_SERVER["REQUEST_METHOD"] === "POST") { 
    $user = $_POST['user'];
    $password = $_POST['password'];
    $user = filter_input(INPUT_POST, 'user', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    if (empty($user) || empty($password)) {
        header("Location: ../vista/index.php?error=1");
        exit();
    }

    try {
        $stmt = $con->prepare("SELECT password FROM usuarios WHERE usuario = :user");
        $stmt->bindParam(':user', $user);
        $stmt->execute();

        if ($stmt->rowCount() === 1) {
            $row = $stmt->fetch();
            if (password_verify($password, $row['password'])) {
                $_SESSION['username'] = $user;
                $_SESSION['logged_in'] = true;
                $_SESSION['cargo'] = $row['cargo']; // Se guarda el cargo

                // Redirigir según el cargo
                if ($_SESSION['cargo'] === 'Administrador') {
                    header("Location: admin.php");
                } else {
                    header("Location: content.php");
                }
                exit();
            } else {
                header("Location: ../vista/index.php?error=2");
                exit();
            }
        } else {
            header("Location: ../vista/index.php?error=3");
            exit();
        }
    } catch (PDOException $e) {
        error_log($e->getMessage(), 3, 'errors_log_login.log');
        die('Error al procesar la solicitud.');
    }
}
?>
