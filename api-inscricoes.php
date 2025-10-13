<?php
/**
 * API para dados de inscrições do seminário
 * Arquivo: api-inscricoes.php
 */

// Definir fuso horário para o Brasil
date_default_timezone_set('America/Sao_Paulo');

// Definir headers para CORS e JSON
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

// Função para ler dados do arquivo
function lerInscricoes() {
    $file_path = __DIR__ . '/data/inscricoes.txt';
    $inscricoes = array();
    
    if (file_exists($file_path)) {
        $lines = file($file_path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        
        foreach ($lines as $line) {
            $dados = explode('|', $line);
            if (count($dados) >= 8) {
                $inscricoes[] = array(
                    'data' => $dados[0],
                    'nome' => $dados[1],
                    'email' => $dados[2],
                    'telefone' => $dados[3],
                    'empresa' => $dados[4],
                    'cargo' => $dados[5],
                    'experiencia' => $dados[6],
                    'newsletter' => $dados[7]
                );
            }
        }
    }
    
    return $inscricoes;
}

// Função para calcular estatísticas
function calcularEstatisticas($inscricoes) {
    $total = count($inscricoes);
    $newsletter = count(array_filter($inscricoes, function($i) { return $i['newsletter'] === 'Sim'; }));
    $empresas = count(array_unique(array_column($inscricoes, 'empresa')));
    
    return array(
        'total' => $total,
        'newsletter' => $newsletter,
        'empresas' => $empresas,
        'data_atualizacao' => (function() { 
            date_default_timezone_set('America/Sao_Paulo'); 
            return date('d/m/Y H:i:s'); 
        })()
    );
}

// Processar requisição
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        $action = $_GET['action'] ?? 'dados';
        
        switch ($action) {
            case 'dados':
                $inscricoes = lerInscricoes();
                echo json_encode(array(
                    'success' => true,
                    'data' => $inscricoes,
                    'count' => count($inscricoes)
                ));
                break;
                
            case 'estatisticas':
                $inscricoes = lerInscricoes();
                $stats = calcularEstatisticas($inscricoes);
                echo json_encode(array(
                    'success' => true,
                    'stats' => $stats
                ));
                break;
                
            case 'exportar':
                $inscricoes = lerInscricoes();
                
                // Headers para download CSV
                header('Content-Type: text/csv; charset=utf-8');
                header('Content-Disposition: attachment; filename="inscricoes-seminario-' . date('Y-m-d') . '.csv"');
                
                // Criar CSV
                $output = fopen('php://output', 'w');
                
                // Cabeçalho do CSV
                fputcsv($output, array(
                    'Data/Hora',
                    'Nome',
                    'Email', 
                    'Telefone',
                    'Empresa',
                    'Cargo',
                    'Experiência',
                    'Newsletter'
                ));
                
                // Dados
                foreach ($inscricoes as $inscricao) {
                    fputcsv($output, array(
                        $inscricao['data'],
                        $inscricao['nome'],
                        $inscricao['email'],
                        $inscricao['telefone'],
                        $inscricao['empresa'],
                        $inscricao['cargo'],
                        $inscricao['experiencia'],
                        $inscricao['newsletter']
                    ));
                }
                
                fclose($output);
                exit;
                
            default:
                echo json_encode(array(
                    'success' => false,
                    'error' => 'Ação não encontrada'
                ));
        }
        break;
        
    case 'POST':
        // Verificar autenticação
        $input = json_decode(file_get_contents('php://input'), true);
        
        if (isset($input['action']) && $input['action'] === 'login') {
            $senha = $input['senha'] ?? '';
            $senha_correta = 'adm2025!';
            
            if ($senha === $senha_correta) {
                session_start();
                $_SESSION['seminario_auth'] = true;
                
                echo json_encode(array(
                    'success' => true,
                    'message' => 'Login realizado com sucesso'
                ));
            } else {
                echo json_encode(array(
                    'success' => false,
                    'error' => 'Senha incorreta'
                ));
            }
        } else {
            echo json_encode(array(
                'success' => false,
                'error' => 'Ação não reconhecida'
            ));
        }
        break;
        
    default:
        echo json_encode(array(
            'success' => false,
            'error' => 'Método não suportado'
        ));
}
?>