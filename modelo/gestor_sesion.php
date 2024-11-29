<?php
function secure_session_start() {
    // Configurar parámetros de la cookie antes de iniciar la sesión
    session_set_cookie_params([
        'lifetime' => 0, 
        'path' => '/', 
        'domain' => '', 
        'secure' => isset($_SERVER['HTTPS']), 
        'httponly' => true, 
        'samesite' => 'Strict'
    ]);
    
    // Iniciar la sesión
    session_start();

    // Verificar si la sesión ha sido inicializada
    if (!isset($_SESSION['initialized'])) {
        $_SESSION['initialized'] = true;
        $_SESSION['IP'] = $_SERVER['REMOTE_ADDR']; 
        $_SESSION['USER_AGENT'] = $_SERVER['HTTP_USER_AGENT']; 
        session_regenerate_id(true); // Regenerar ID de sesión
    } else {
        // Verificar si las IP o el User-Agent han cambiado
        if ($_SESSION['IP'] !== $_SERVER['REMOTE_ADDR'] || 
            $_SESSION['USER_AGENT'] !== $_SERVER['HTTP_USER_AGENT']) {
            session_destroy(); // Destruir la sesión si hay secuestro
            header("Location: index.php?error=session_hijacked");
            exit();
        }
    }
}

function session_doc() {
    secure_session_start(); // Iniciar o asegurar la sesión

    // Definir tiempo de inactividad antes de cerrar sesión
    $timeout_duration = 600; // 10 minutos
    if (isset($_SESSION['LAST_ACTIVITY']) && 
        (time() - $_SESSION['LAST_ACTIVITY']) > $timeout_duration) {
        session_unset(); // Limpiar datos de la sesión
        session_destroy(); // Destruir sesión
        header("Location: index.php?error=session_timeout");
        exit();
    }
    $_SESSION['LAST_ACTIVITY'] = time(); // Actualizar el tiempo de la última actividad

    // Verificar si el usuario está autenticado
    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
        header("Location: index.php?error=2"); // Redirigir si no está autenticado
        exit();
    }
}
?>
