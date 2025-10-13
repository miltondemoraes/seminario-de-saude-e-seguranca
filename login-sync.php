<?php
/**
 * Login simples para sincronizar sessões
 */

session_start();

header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $senha = $_POST['senha'] ?? '';
    
    if ($senha === 'adm2025!') {
        $_SESSION['seminario_auth'] = true;
        echo json_encode([
            'success' => true,
            'message' => 'Login realizado com sucesso'
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'error' => 'Senha incorreta'
        ]);
    }
} else {
    // Verificar status
    echo json_encode([
        'success' => true,
        'authenticated' => isset($_SESSION['seminario_auth']) && $_SESSION['seminario_auth'] === true
    ]);
}
?>