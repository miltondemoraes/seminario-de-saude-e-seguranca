<?php
/**
 * API simplificada para teste de expositores
 */

session_start();

header('Content-Type: application/json; charset=utf-8');

// Simular login se não estiver logado
if (!isset($_SESSION['seminario_auth'])) {
    $_SESSION['seminario_auth'] = true;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? 'indefinido';
    
    // Log de debug
    error_log("=== API TESTE ===");
    error_log("Action: " . $action);
    error_log("POST: " . print_r($_POST, true));
    
    if ($action === 'editar') {
        // Simular sucesso
        echo json_encode([
            'success' => true,
            'message' => 'Expositor atualizado com sucesso (teste)',
            'debug' => [
                'action' => $action,
                'post_data' => $_POST
            ]
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'error' => 'Ação não reconhecida: ' . $action,
            'debug' => [
                'received_action' => $action,
                'all_post' => $_POST
            ]
        ]);
    }
} else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Retornar dados de teste
    echo json_encode([
        'success' => true,
        'data' => [
            [
                'id' => 1,
                'nome' => 'Teste Expositor',
                'descricao' => 'Descrição de teste',
                'stand' => 'Stand A1',
                'imagem' => '',
                'icone' => 'fas fa-building'
            ]
        ]
    ]);
} else {
    echo json_encode([
        'success' => false,
        'error' => 'Método não suportado: ' . $_SERVER['REQUEST_METHOD']
    ]);
}
?>