<?php
/**
 * API de Expositores - Versão Corrigida
 */

session_start();

// Headers
header('Content-Type: application/json; charset=utf-8');

// Verificar autenticação
function isAuthenticated() {
    return isset($_SESSION['seminario_auth']) && $_SESSION['seminario_auth'] === true;
}

// Diretórios
$dataDir = __DIR__ . '/data/';
$imagesDir = __DIR__ . '/images/';
$expositoresFile = $dataDir . 'expositores.json';

// Criar diretórios se necessário
if (!is_dir($dataDir)) mkdir($dataDir, 0755, true);
if (!is_dir($imagesDir)) mkdir($imagesDir, 0755, true);

// Função para ler expositores
function getExpositores($file) {
    if (!file_exists($file)) {
        return [
            ['id' => 1, 'nome' => 'TechSafety Pro', 'descricao' => 'Equipamentos de proteção individual especializados para audiovisual', 'stand' => 'Estande A1', 'imagem' => '', 'icone' => 'fas fa-building'],
            ['id' => 2, 'nome' => 'ErgoMedia Solutions', 'descricao' => 'Móveis ergonômicos e soluções para estúdios', 'stand' => 'Estande A2', 'imagem' => '', 'icone' => 'fas fa-shield-alt'],
            ['id' => 3, 'nome' => 'WellBeing Media', 'descricao' => 'Programas de bem-estar e saúde ocupacional', 'stand' => 'Estande A3', 'imagem' => '', 'icone' => 'fas fa-heartbeat'],
            ['id' => 4, 'nome' => 'AudioSafe Tech', 'descricao' => 'Tecnologia em monitoramento de segurança em sets', 'stand' => 'Estande B1', 'imagem' => '', 'icone' => 'fas fa-tools'],
            ['id' => 5, 'nome' => 'Emergency AV', 'descricao' => 'Kits de primeiros socorros e treinamentos de emergência', 'stand' => 'Estande B2', 'imagem' => '', 'icone' => 'fas fa-first-aid'],
            ['id' => 6, 'nome' => 'CertifiAV', 'descricao' => 'Certificações e auditorias em segurança audiovisual', 'stand' => 'Estande B3', 'imagem' => '', 'icone' => 'fas fa-certificate']
        ];
    }
    
    $content = file_get_contents($file);
    return json_decode($content, true) ?: [];
}

// Função para salvar expositores
function saveExpositores($file, $data) {
    return file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
}

// Processar requisição
$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'GET') {
    // Listar expositores
    $expositores = getExpositores($expositoresFile);
    echo json_encode(['success' => true, 'data' => $expositores]);
    
} elseif ($method === 'POST') {
    
    // Verificar autenticação para POST
    if (!isAuthenticated()) {
        echo json_encode(['success' => false, 'error' => 'Não autenticado']);
        exit;
    }
    
    $action = $_POST['action'] ?? '';
    
    if ($action === 'editar') {
        $id = intval($_POST['id'] ?? 0);
        $nome = $_POST['nome'] ?? '';
        $descricao = $_POST['descricao'] ?? '';
        $stand = $_POST['stand'] ?? '';
        
        if (!$id || !$nome || !$descricao || !$stand) {
            echo json_encode(['success' => false, 'error' => 'Dados obrigatórios faltando']);
            exit;
        }
        
        $expositores = getExpositores($expositoresFile);
        
        // Encontrar expositor
        $found = false;
        foreach ($expositores as &$expositor) {
            if ($expositor['id'] == $id) {
                $expositor['nome'] = $nome;
                $expositor['descricao'] = $descricao;
                $expositor['stand'] = $stand;
                
                // Processar imagem se enviada
                if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
                    $file = $_FILES['imagem'];
                    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
                    
                    if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
                        // Remover imagem anterior
                        if (!empty($expositor['imagem'])) {
                            $oldFile = $imagesDir . $expositor['imagem'];
                            if (file_exists($oldFile)) unlink($oldFile);
                        }
                        
                        // Nova imagem
                        $filename = 'expositor_' . $id . '.' . $ext;
                        if (move_uploaded_file($file['tmp_name'], $imagesDir . $filename)) {
                            $expositor['imagem'] = $filename;
                        }
                    }
                }
                
                // Remover imagem se solicitado
                if (isset($_POST['remover_imagem']) && $_POST['remover_imagem'] === '1') {
                    if (!empty($expositor['imagem'])) {
                        $oldFile = $imagesDir . $expositor['imagem'];
                        if (file_exists($oldFile)) unlink($oldFile);
                        $expositor['imagem'] = '';
                    }
                }
                
                $found = true;
                break;
            }
        }
        
        if (!$found) {
            echo json_encode(['success' => false, 'error' => 'Expositor não encontrado']);
            exit;
        }
        
        if (saveExpositores($expositoresFile, $expositores)) {
            echo json_encode(['success' => true, 'message' => 'Expositor atualizado com sucesso']);
        } else {
            echo json_encode(['success' => false, 'error' => 'Erro ao salvar']);
        }
        
    } else {
        echo json_encode(['success' => false, 'error' => 'Ação inválida: ' . $action]);
    }
    
} else {
    echo json_encode(['success' => false, 'error' => 'Método não permitido']);
}
?>