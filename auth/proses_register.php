<?php
session_start();

require_once '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: register.php');
    exit;
}

$username = trim($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';
$confirmPassword = $_POST['confirm_password'] ?? '';

if ($username === '' || $password === '' || $confirmPassword === '') {
    $_SESSION['error'] = 'Semua field wajib diisi.';
    $_SESSION['old_username'] = $username;
    header('Location: register.php');
    exit;
}

if (strlen($username) < 3 || strlen($username) > 50) {
    $_SESSION['error'] = 'Username harus terdiri dari 3–50 karakter.';
    $_SESSION['old_username'] = $username;
    header('Location: register.php');
    exit;
}

if (!preg_match('/^[A-Za-z0-9_.-]+$/', $username)) {
    $_SESSION['error'] = 'Username hanya boleh berisi huruf, angka, titik, garis bawah, atau tanda hubung.';
    $_SESSION['old_username'] = $username;
    header('Location: register.php');
    exit;
}

if (strlen($password) < 6) {
    $_SESSION['error'] = 'Password minimal 6 karakter.';
    $_SESSION['old_username'] = $username;
    header('Location: register.php');
    exit;
}

if ($password !== $confirmPassword) {
    $_SESSION['error'] = 'Password dan konfirmasi password tidak sama.';
    $_SESSION['old_username'] = $username;
    header('Location: register.php');
    exit;
}

try {
    $db = getDB();

    $check = $db->prepare('SELECT id FROM users WHERE username = ? LIMIT 1');
    $check->execute([$username]);

    if ($check->fetch()) {
        $_SESSION['error'] = 'Username sudah terdaftar. Gunakan username lain.';
        $_SESSION['old_username'] = $username;
        header('Location: register.php');
        exit;
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $insert = $db->prepare("INSERT INTO users (username, password, role) VALUES (?, ?, 'user')");
    $insert->execute([$username, $hashedPassword]);

    unset($_SESSION['old_username']);
    $_SESSION['success'] = 'Registrasi berhasil. Silakan masuk menggunakan akun baru Anda.';
    header('Location: login.php');
    exit;
} catch (PDOException $e) {
    $_SESSION['error'] = 'Registrasi gagal karena terjadi masalah pada database.';
    $_SESSION['old_username'] = $username;
    header('Location: register.php');
    exit;
}
