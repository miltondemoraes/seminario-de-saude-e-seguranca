<?php
/**
 * Teste de debug para API de expositores
 */

// Iniciar sessão
session_start();

// Headers
header('Content-Type: application/json; charset=utf-8');

// Debug info
$debug = [
    'method' => $_SERVER['REQUEST_METHOD'],
    'post_data' => $_POST,
    'files_data' => $_FILES,
    'session_auth' => $_SESSION['seminario_auth'] ?? 'não definido',
    'auth_status' => isset($_SESSION['seminario_auth']) && $_SESSION['seminario_auth'] === true
];

echo json_encode([
    'success' => true,
    'debug' => $debug,
    'message' => 'Debug API funcionando'
]);
?>