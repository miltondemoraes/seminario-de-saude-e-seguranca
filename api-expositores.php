<?php
session_start();

// Senha fixa para simplificar
if (!isset($_SESSION['admin_logged'])) {
    $_SESSION['admin_logged'] = true; // Para simplificar, sempre logado
}

header('Content-Type: application/json');

$images_dir = __DIR__ . '/images/';
$data_file = __DIR__ . '/data/expositores.json';

// Criar diretórios
if (!is_dir($images_dir)) mkdir($images_dir, 0777, true);
if (!is_dir(dirname($data_file))) mkdir(dirname($data_file), 0777, true);

// Dados padrão
$default_data = [
    ['id' => 1, 'nome' => 'TechSafety Pro', 'descricao' => 'Equipamentos de proteção individual especializados para audiovisual', 'stand' => 'Estande A1', 'imagem' => '', 'icone' => 'fas fa-building', 'link' => ''],
    ['id' => 2, 'nome' => 'ErgoMedia Solutions', 'descricao' => 'Móveis ergonômicos e soluções para estúdios', 'stand' => 'Estande A2', 'imagem' => '', 'icone' => 'fas fa-shield-alt', 'link' => ''],
    ['id' => 3, 'nome' => 'WellBeing Media', 'descricao' => 'Programas de bem-estar e saúde ocupacional', 'stand' => 'Estande A3', 'imagem' => '', 'icone' => 'fas fa-heartbeat', 'link' => ''],
    ['id' => 4, 'nome' => 'AudioSafe Tech', 'descricao' => 'Tecnologia em monitoramento de segurança em sets', 'stand' => 'Estande B1', 'imagem' => '', 'icone' => 'fas fa-tools', 'link' => ''],
    ['id' => 5, 'nome' => 'Emergency AV', 'descricao' => 'Kits de primeiros socorros e treinamentos de emergência', 'stand' => 'Estande B2', 'imagem' => '', 'icone' => 'fas fa-first-aid', 'link' => ''],
    ['id' => 6, 'nome' => 'CertifiAV', 'descricao' => 'Certificações e auditorias em segurança audiovisual', 'stand' => 'Estande B3', 'imagem' => '', 'icone' => 'fas fa-certificate', 'link' => '']
];

// Carregar dados
if (file_exists($data_file)) {
    $expositores = json_decode(file_get_contents($data_file), true) ?: $default_data;
} else {
    $expositores = $default_data;
    file_put_contents($data_file, json_encode($expositores, JSON_PRETTY_PRINT));
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    echo json_encode(['success' => true, 'data' => $expositores]);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'editar') {
    $id = (int)$_POST['id'];
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $stand = $_POST['stand'];
    $link = isset($_POST['link']) ? $_POST['link'] : '';
    
    // Encontrar o expositor
    foreach ($expositores as &$exp) {
        if ($exp['id'] === $id) {
            $exp['nome'] = $nome;
            $exp['descricao'] = $descricao;
            $exp['stand'] = $stand;
            $exp['link'] = $link;
            
            // Upload de imagem
            if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === 0) {
                $file = $_FILES['imagem'];
                $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
                $filename = 'expositor_' . $id . '.' . $ext;
                
                // Remover imagem anterior
                if ($exp['imagem'] && file_exists($images_dir . $exp['imagem'])) {
                    unlink($images_dir . $exp['imagem']);
                }
                
                // Mover nova imagem
                if (move_uploaded_file($file['tmp_name'], $images_dir . $filename)) {
                    $exp['imagem'] = $filename;
                }
            }
            
            // Remover imagem se solicitado
            if (isset($_POST['remover_imagem']) && $_POST['remover_imagem'] === '1') {
                if ($exp['imagem'] && file_exists($images_dir . $exp['imagem'])) {
                    unlink($images_dir . $exp['imagem']);
                }
                $exp['imagem'] = '';
            }
            
            break;
        }
    }
    
    // Salvar
    file_put_contents($data_file, json_encode($expositores, JSON_PRETTY_PRINT));
    
    echo json_encode(['success' => true, 'message' => 'Expositor atualizado!']);
    exit;
}

echo json_encode(['success' => false, 'error' => 'Ação inválida']);
?>