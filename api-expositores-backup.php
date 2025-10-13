<?php
/**
 * API para gerenciamento de expositores
 * Arquivo: api-expositores.php
 */

// Iniciar sessão
session_start();

// Definir headers para CORS e JSON
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

// Tratar OPTIONS (preflight)
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit(0);
}

// Diretório de imagens
$images_dir = __DIR__ . '/images/';
$data_dir = __DIR__ . '/data/';
$expositores_file = $data_dir . 'expositores.json';

// Criar diretórios se não existirem
if (!is_dir($images_dir)) {
    mkdir($images_dir, 0755, true);
}
if (!is_dir($data_dir)) {
    mkdir($data_dir, 0755, true);
}

// Função para ler dados dos expositores
function lerExpositores($file_path) {
    if (file_exists($file_path)) {
        $content = file_get_contents($file_path);
        return json_decode($content, true) ?: [];
    }
    
    // Retornar dados padrão se arquivo não existir
    return [
        [
            'id' => 1,
            'nome' => 'TechSafety Pro',
            'descricao' => 'Equipamentos de proteção individual especializados para audiovisual',
            'stand' => 'Estande A1',
            'imagem' => '',
            'icone' => 'fas fa-building'
        ],
        [
            'id' => 2,
            'nome' => 'ErgoMedia Solutions',
            'descricao' => 'Móveis ergonômicos e soluções para estúdios',
            'stand' => 'Estande A2',
            'imagem' => '',
            'icone' => 'fas fa-shield-alt'
        ],
        [
            'id' => 3,
            'nome' => 'WellBeing Media',
            'descricao' => 'Programas de bem-estar e saúde ocupacional',
            'stand' => 'Estande A3',
            'imagem' => '',
            'icone' => 'fas fa-heartbeat'
        ],
        [
            'id' => 4,
            'nome' => 'AudioSafe Tech',
            'descricao' => 'Tecnologia em monitoramento de segurança em sets',
            'stand' => 'Estande B1',
            'imagem' => '',
            'icone' => 'fas fa-tools'
        ],
        [
            'id' => 5,
            'nome' => 'Emergency AV',
            'descricao' => 'Kits de primeiros socorros e treinamentos de emergência',
            'stand' => 'Estande B2',
            'imagem' => '',
            'icone' => 'fas fa-first-aid'
        ],
        [
            'id' => 6,
            'nome' => 'CertifiAV',
            'descricao' => 'Certificações e auditorias em segurança audiovisual',
            'stand' => 'Estande B3',
            'imagem' => '',
            'icone' => 'fas fa-certificate'
        ]
    ];
}

// Função para salvar dados dos expositores
function salvarExpositores($file_path, $expositores) {
    return file_put_contents($file_path, json_encode($expositores, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
}

// Função para verificar autenticação
function verificarAuth() {
    return isset($_SESSION['seminario_auth']) && $_SESSION['seminario_auth'] === true;
}

// Processar requisição
$method = $_SERVER['REQUEST_METHOD'];

// Debug: log dos dados recebidos
error_log("=== API EXPOSITORES DEBUG ===");
error_log("Método: " . $method);
error_log("POST: " . print_r($_POST, true));
error_log("SESSION: " . print_r($_SESSION, true));

// Verificar autenticação para operações sensíveis
if (in_array($method, ['POST', 'DELETE']) && !verificarAuth()) {
    error_log("Falha na autenticação");
    echo json_encode([
        'success' => false,
        'error' => 'Acesso não autorizado'
    ]);
    exit;
}

switch ($method) {
    case 'GET':
        $action = $_GET['action'] ?? 'listar';
        
        switch ($action) {
            case 'listar':
                $expositores = lerExpositores($expositores_file);
                echo json_encode([
                    'success' => true,
                    'data' => $expositores
                ]);
                break;
                
            default:
                echo json_encode([
                    'success' => false,
                    'error' => 'Ação não encontrada'
                ]);
        }
        break;
        
    case 'POST':
        $action = $_POST['action'] ?? '';
        error_log("Ação POST recebida: '" . $action . "'");
        
        switch ($action) {
            case 'editar':
                error_log("Processando edição de expositor");
                $expositores = lerExpositores($expositores_file);
                $id = intval($_POST['id'] ?? 0);
                error_log("ID do expositor: " . $id);
                
                // Encontrar expositor
                $index = array_search($id, array_column($expositores, 'id'));
                if ($index === false) {
                    error_log("Expositor não encontrado com ID: " . $id);
                    echo json_encode([
                        'success' => false,
                        'error' => 'Expositor não encontrado'
                    ]);
                    exit;
                }
                
                // Atualizar dados
                $expositores[$index]['nome'] = $_POST['nome'] ?? $expositores[$index]['nome'];
                $expositores[$index]['descricao'] = $_POST['descricao'] ?? $expositores[$index]['descricao'];
                $expositores[$index]['stand'] = $_POST['stand'] ?? $expositores[$index]['stand'];
                
                // Processar nova imagem se enviada
                if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
                    $upload_file = $_FILES['imagem'];
                    $file_extension = strtolower(pathinfo($upload_file['name'], PATHINFO_EXTENSION));
                    
                    // Validações
                    $allowed_types = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
                    if (!in_array($file_extension, $allowed_types)) {
                        echo json_encode([
                            'success' => false,
                            'error' => 'Tipo de arquivo não permitido. Use JPG, PNG, GIF ou WebP.'
                        ]);
                        exit;
                    }
                    
                    if ($upload_file['size'] > 5 * 1024 * 1024) {
                        echo json_encode([
                            'success' => false,
                            'error' => 'Arquivo muito grande. Máximo 5MB.'
                        ]);
                        exit;
                    }
                    
                    // Remover imagem anterior
                    if (!empty($expositores[$index]['imagem'])) {
                        $old_image = $images_dir . $expositores[$index]['imagem'];
                        if (file_exists($old_image)) {
                            unlink($old_image);
                        }
                    }
                    
                    // Nova imagem
                    $filename = 'expositor_' . $id . '.' . $file_extension;
                    $target_path = $images_dir . $filename;
                    
                    if (move_uploaded_file($upload_file['tmp_name'], $target_path)) {
                        $expositores[$index]['imagem'] = $filename;
                    }
                }
                
                // Opção para remover imagem
                if (isset($_POST['remover_imagem']) && $_POST['remover_imagem'] === '1') {
                    if (!empty($expositores[$index]['imagem'])) {
                        $old_image = $images_dir . $expositores[$index]['imagem'];
                        if (file_exists($old_image)) {
                            unlink($old_image);
                        }
                        $expositores[$index]['imagem'] = '';
                    }
                }
                
                // Salvar
                if (salvarExpositores($expositores_file, $expositores)) {
                    echo json_encode([
                        'success' => true,
                        'message' => 'Expositor atualizado com sucesso',
                        'data' => $expositores[$index]
                    ]);
                } else {
                    echo json_encode([
                        'success' => false,
                        'error' => 'Erro ao salvar dados'
                    ]);
                }
                break;
                
            default:
                error_log("Ação POST não reconhecida: '" . $action . "'");
                error_log("POST completo: " . print_r($_POST, true));
                echo json_encode([
                    'success' => false,
                    'error' => 'Ação não reconhecida: ' . $action
                ]);
        }
        break;
        
    default:
        echo json_encode([
            'success' => false,
            'error' => 'Método não suportado'
        ]);
}
?>