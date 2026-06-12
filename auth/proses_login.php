<?php
session_start();

require_once '../config/database.php';
require_once '../config/app.php';

function safeRedirect(string $redirect, string $baseUrl): string
{
    if (str_starts_with($redirect, $baseUrl) || str_starts_with($redirect, '/')) {
        return $redirect;
    }
    return $baseUrl . 'home.php';
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: login.php');
    exit;
}

$username = trim($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';
$redirect = safeRedirect($_POST['redirect'] ?? ($BASE_URL . 'home.php'), $BASE_URL);

if ($username === '' || $password === '') {
    header('Location: login.php?error=' . urlencode('Username dan password wajib diisi.') . '&redirect=' . urlencode($redirect));
    exit;
}

try {
    $stmt = getDB()->prepare('SELECT id, username, password, role FROM users WHERE username = ? LIMIT 1');
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if (!$user || !password_verify($password, $user['password'])) {
        header('Location: login.php?error=' . urlencode('Username atau password salah.') . '&redirect=' . urlencode($redirect));
        exit;
    }

    session_regenerate_id(true);
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['role'] = $user['role'] ?? 'user';

    header('Location: ' . $redirect);
    exit;
} catch (PDOException $e) {
    header('Location: login.php?error=' . urlencode('Login gagal karena masalah database.'));
    exit;
}
