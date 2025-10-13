<?php
// Verificar autenticação
session_start();
if (!isset($_SESSION['seminario_auth']) || $_SESSION['seminario_auth'] !== true) {
    http_response_code(401);
    echo json_encode(['success' => false, 'error' => 'Não autenticado']);
    exit;
}

// Configurações
$apoiadores_file = __DIR__ . '/data/apoiadores.json';
$images_dir = __DIR__ . '/images/';

// Garantir que o diretório de imagens existe
if (!file_exists($images_dir)) {
    mkdir($images_dir, 0755, true);
}

// Função para carregar apoiadores
function carregarApoiadores($file) {
    if (!file_exists($file)) {
        return [];
    }
    $content = file_get_contents($file);
    return json_decode($content, true) ?: [];
}

// Função para salvar apoiadores
function salvarApoiadores($file, $apoiadores) {
    $json = json_encode($apoiadores, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    return file_put_contents($file, $json) !== false;
}

// Processar requisição
$method = $_SERVER['REQUEST_METHOD'];
$action = $_GET['action'] ?? $_POST['action'] ?? '';

try {
    switch ($action) {
        case 'listar':
            $apoiadores = carregarApoiadores($apoiadores_file);
            echo json_encode(['success' => true, 'data' => $apoiadores]);
            break;

        case 'editar':
            if ($method !== 'POST') {
                throw new Exception('Método não permitido');
            }

            $id = intval($_POST['id'] ?? 0);
            $nome = trim($_POST['nome'] ?? '');
            $descricao = trim($_POST['descricao'] ?? '');
            $categoria = trim($_POST['categoria'] ?? '');

            if (!$id || !$nome || !$descricao || !$categoria) {
                throw new Exception('Dados obrigatórios não fornecidos');
            }

            $apoiadores = carregarApoiadores($apoiadores_file);
            $apoiador_index = -1;

            // Encontrar o apoiador
            foreach ($apoiadores as $index => $apoiador) {
                if ($apoiador['id'] == $id) {
                    $apoiador_index = $index;
                    break;
                }
            }

            if ($apoiador_index === -1) {
                throw new Exception('Apoiador não encontrado');
            }

            // Processar upload de imagem se houver
            $imagem_nome = $apoiadores[$apoiador_index]['imagem'];
            
            if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
                $arquivo = $_FILES['imagem'];
                
                // Validar tipo de arquivo
                $tipos_permitidos = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
                if (!in_array($arquivo['type'], $tipos_permitidos)) {
                    throw new Exception('Tipo de arquivo não permitido. Use JPG, PNG, GIF ou WebP.');
                }
                
                // Validar tamanho (5MB)
                if ($arquivo['size'] > 5 * 1024 * 1024) {
                    throw new Exception('Arquivo muito grande. Tamanho máximo: 5MB.');
                }
                
                // Remover imagem anterior se existir
                if ($imagem_nome && file_exists($images_dir . $imagem_nome)) {
                    unlink($images_dir . $imagem_nome);
                }
                
                // Gerar nome único
                $extensao = pathinfo($arquivo['name'], PATHINFO_EXTENSION);
                $imagem_nome = 'apoiador_' . $id . '.' . $extensao;
                
                // Mover arquivo
                if (!move_uploaded_file($arquivo['tmp_name'], $images_dir . $imagem_nome)) {
                    throw new Exception('Erro ao salvar arquivo de imagem');
                }
            }

            // Verificar se deve remover imagem
            if (isset($_POST['remover_imagem']) && $_POST['remover_imagem'] == '1') {
                if ($imagem_nome && file_exists($images_dir . $imagem_nome)) {
                    unlink($images_dir . $imagem_nome);
                }
                $imagem_nome = '';
            }

            // Atualizar dados do apoiador
            $apoiadores[$apoiador_index]['nome'] = $nome;
            $apoiadores[$apoiador_index]['descricao'] = $descricao;
            $apoiadores[$apoiador_index]['categoria'] = $categoria;
            $apoiadores[$apoiador_index]['imagem'] = $imagem_nome;

            // Salvar
            if (!salvarApoiadores($apoiadores_file, $apoiadores)) {
                throw new Exception('Erro ao salvar dados');
            }

            echo json_encode(['success' => true, 'message' => 'Apoiador atualizado com sucesso!']);
            break;

        default:
            throw new Exception('Ação não reconhecida');
    }

} catch (Exception $e) {
    http_response_code(400);
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}
?>