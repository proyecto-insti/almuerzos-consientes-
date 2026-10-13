<?php
/**
 * Conexión PDO a MySQL para XAMPP.
 * En una instalación estándar, MySQL usa localhost, root y contraseña vacía.
 */

$host = getenv('DB_HOST') ?: '127.0.0.1';
$baseDeDatos = getenv('DB_NAME') ?: 'almuerzos_conscientes';
$usuario = getenv('DB_USER') ?: 'root';
$contrasena = getenv('DB_PASSWORD') ?: '';

$dsn = "mysql:host={$host};dbname={$baseDeDatos};charset=utf8mb4";

try {
    $pdo = new PDO($dsn, $usuario, $contrasena, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);
} catch (PDOException $error) {
    http_response_code(500);
    exit('No fue posible conectar con MySQL. Verifique que XAMPP esté activo y que la base exista.');
}
