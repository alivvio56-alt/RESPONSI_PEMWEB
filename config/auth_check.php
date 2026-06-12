<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (empty($_SESSION['user_id'])) {
    $dir = dirname($_SERVER['SCRIPT_NAME']);
    $check = $_SERVER['DOCUMENT_ROOT'] . $dir . '/auth/login.php';
    if (!file_exists($check)) {
        $dir = dirname($dir);
    }
    header('Location: ' . rtrim($dir, '/') . '/auth/login.php?error=Kamu+harus+login+terlebih+dahulu');
    exit;
}
?>