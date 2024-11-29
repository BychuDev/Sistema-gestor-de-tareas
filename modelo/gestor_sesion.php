<?php
session_start();
function session_doc() {
    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
        header("Location: index.php?error=2");
    }
}
?>