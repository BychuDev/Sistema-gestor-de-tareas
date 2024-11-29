<?php
require_once '../modelo/gestor_sesion.php';
session_doc();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="estilos/registro.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                   
                    <div class="imgcontainer">
                        <img src="/media/img/user.png" alt="Avatar" class="avatar">
                    </div>
                    <div class="card-header text-center">
                        <h3>Panel de Registro</h3>
                    </div>
                    <div class="card-body">
                        <form action="../controlador/registro_pagina.php" method="post">
                        <?php
if (isset($_GET['error'])) {
    echo '<div style="color: white; text-align: center; margin-top: 20px;">';
    switch ($_GET['error']) {
        case '1':
            echo "<a style='color: black'>Todos los campos son obligatorios.</a>";
            break;
        default:
            echo "Error desconocido.";
    }
    echo '</div>';
}
?>
                            <div class="mb-3">
                                <label for="usuario" class="form-label">Usuario</label>
                                <input type="text" id="usuario" name="usuario" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" id="nombre2" name="nombre2" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Correo Electrónico</label>
                                <input type="email" id="email" name="email" class="form-control" required>
                            </div>
                            <div class="mb-3">
    <label for="cargo" class="form-label">Tipo de usuario</label>
    <select id="cargo" name="cargo" class="form-control" required>
        <option value="Usuario">Usuario</option>
        <option value="Administrador">Administrador</option>
    </select>
</div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña</label>
                                <input type="password" id="password" name="password" class="form-control" required>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Registrarse</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>