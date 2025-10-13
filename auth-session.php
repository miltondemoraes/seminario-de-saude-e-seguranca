<?php
/**
 * Sistema de autenticação para APIs
 * Arquivo: auth-session.php
 */

// Iniciar sessão se não estiver ativa
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/**
 * Verificar se o usuário está autenticado
 */
function verificarAutenticacao() {
    return isset($_SESSION['seminario_auth']) && $_SESSION['seminario_auth'] === true;
}

/**
 * Fazer login do usuário
 */
function fazerLogin($senha) {
    $senha_correta = 'adm2025!';
    
    if ($senha === $senha_correta) {
        $_SESSION['seminario_auth'] = true;
        return true;
    }
    
    return false;
}

/**
 * Fazer logout do usuário
 */
function fazerLogout() {
    unset($_SESSION['seminario_auth']);
    session_destroy();
}

/**
 * Endpoint de autenticação via POST
 */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    header('Content-Type: application/json; charset=utf-8');
    
    switch ($_POST['action']) {
        case 'login':
            $senha = $_POST['senha'] ?? '';
            if (fazerLogin($senha)) {
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
            break;
            
        case 'logout':
            fazerLogout();
            echo json_encode([
                'success' => true,
                'message' => 'Logout realizado com sucesso'
            ]);
            break;
            
        case 'verificar':
            echo json_encode([
                'success' => true,
                'authenticated' => verificarAutenticacao()
            ]);
            break;
            
        default:
            echo json_encode([
                'success' => false,
                'error' => 'Ação não reconhecida'
            ]);
    }
    exit;
}
?>