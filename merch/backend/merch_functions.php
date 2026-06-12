<?php
require_once __DIR__ . '/../../config/database.php';

function rupiah(int $amount): string
{
    return 'Rp' . number_format($amount, 0, ',', '.');
}

function cleanInput(?string $value): string
{
    return trim((string) $value);
}

function redirectWithMessage(string $url, string $type, string $message): void
{
    $separator = str_contains($url, '?') ? '&' : '?';
    header('Location: ' . $url . $separator . $type . '=' . urlencode($message));
    exit;
}

function requireLogin(): void
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if (empty($_SESSION['user_id'])) {
        header('Location: ../../auth/login.php?error=' . urlencode('Kamu harus login terlebih dahulu.'));
        exit;
    }
}

function requireAdmin(): void
{
    requireLogin();
    if (($_SESSION['role'] ?? 'user') !== 'admin') {
        header('Location: ../index.php?error=' . urlencode('Akses ditolak. Hanya admin yang boleh mengelola merchandise.'));
        exit;
    }
}

function findProduct(int $id): ?array
{
    $stmt = getDB()->prepare('SELECT * FROM merch_products WHERE id = ? LIMIT 1');
    $stmt->execute([$id]);
    $product = $stmt->fetch();
    return $product ?: null;
}

function getActiveProducts(): array
{
    $stmt = getDB()->query('SELECT * FROM merch_products WHERE is_active = 1 ORDER BY created_at DESC, id DESC');
    return $stmt->fetchAll();
}

function getAllProducts(): array
{
    $stmt = getDB()->query('SELECT * FROM merch_products ORDER BY created_at DESC, id DESC');
    return $stmt->fetchAll();
}

function getOrders(): array
{
    $stmt = getDB()->query("SELECT o.*, p.name AS product_name, p.category, u.username
        FROM merch_orders o
        JOIN merch_products p ON p.id = o.product_id
        LEFT JOIN users u ON u.id = o.user_id
        ORDER BY o.created_at DESC, o.id DESC");
    return $stmt->fetchAll();
}

function saveUploadedImage(array $file): ?string
{
    if (empty($file['name']) || ($file['error'] ?? UPLOAD_ERR_NO_FILE) === UPLOAD_ERR_NO_FILE) {
        return null;
    }

    if (($file['error'] ?? UPLOAD_ERR_OK) !== UPLOAD_ERR_OK) {
        throw new RuntimeException('Upload gambar gagal.');
    }

    $allowed = [
        'image/jpeg' => 'jpg',
        'image/png' => 'png',
        'image/webp' => 'webp',
    ];

    $mime = mime_content_type($file['tmp_name']);
    if (!isset($allowed[$mime])) {
        throw new RuntimeException('Format gambar harus JPG, PNG, atau WEBP.');
    }

    if (($file['size'] ?? 0) > 2 * 1024 * 1024) {
        throw new RuntimeException('Ukuran gambar maksimal 2MB.');
    }

    $filename = 'product_' . date('Ymd_His') . '_' . bin2hex(random_bytes(4)) . '.' . $allowed[$mime];
    $targetDir = __DIR__ . '/../uploads/';
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0755, true);
    }

    $targetPath = $targetDir . $filename;
    if (!move_uploaded_file($file['tmp_name'], $targetPath)) {
        throw new RuntimeException('Gagal menyimpan gambar.');
    }

    return 'uploads/' . $filename;
}
?>
