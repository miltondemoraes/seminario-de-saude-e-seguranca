<?php
/**
 * Página de Gerência - Seminário de Saúde e Segurança no Audiovisual
 */

// Iniciar sessão
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Definir fuso horário
date_default_timezone_set('America/Sao_Paulo');

// Verificar autenticação
$usuario_correto = 'admin';
$senha_correta = 'seminario2024';
$esta_logado = isset($_SESSION['gerencia_logado']) && $_SESSION['gerencia_logado'] === true;

// Processar login
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $usuario = $_POST['usuario'] ?? '';
    $senha = $_POST['senha'] ?? '';
    
    if ($usuario === $usuario_correto && $senha === $senha_correta) {
        $_SESSION['gerencia_logado'] = true;
        header('Location: ' . $_SERVER['REQUEST_URI']);
        exit;
    } else {
        $erro_login = 'Credenciais incorretas!';
    }
}

// Processar logout
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: ' . strtok($_SERVER['REQUEST_URI'], '?'));
    exit;
}

// Função para ler inscrições do arquivo
function lerInscricoes() {
    $arquivo = __DIR__ . '/data/inscricoes.txt';
    $inscricoes = [];
    
    if (file_exists($arquivo)) {
        $linhas = file($arquivo, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        
        foreach ($linhas as $linha) {
            $dados = explode('|', $linha);
            if (count($dados) >= 8) {
                $inscricoes[] = [
                    'data' => $dados[0],
                    'nome' => $dados[1],
                    'email' => $dados[2],
                    'telefone' => $dados[3],
                    'empresa' => $dados[4],
                    'cargo' => $dados[5],
                    'experiencia' => $dados[6],
                    'newsletter' => $dados[7],
                    'areaAtuacao' => $dados[8] ?? '',
                    'temDRT' => $dados[9] ?? '',
                    'drtNumero' => $dados[10] ?? '',
                    'palestras' => $dados[11] ?? ''
                ];
            }
        }
    }
    
    return $inscricoes;
}

// Se não estiver logado, mostrar tela de login
if (!$esta_logado) {
    ?>
    <!DOCTYPE html>
    <html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login - Gerência Seminário</title>
        <style>
            * { margin: 0; padding: 0; box-sizing: border-box; }
            body {
                font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
            }
            .login-container {
                background: white;
                padding: 2rem;
                border-radius: 10px;
                box-shadow: 0 10px 30px rgba(0,0,0,0.3);
                width: 100%;
                max-width: 400px;
            }
            .login-header {
                text-align: center;
                margin-bottom: 2rem;
                color: #333;
            }
            .form-group {
                margin-bottom: 1rem;
            }
            label {
                display: block;
                margin-bottom: 0.5rem;
                color: #555;
                font-weight: 500;
            }
            input[type="text"], input[type="password"] {
                width: 100%;
                padding: 0.75rem;
                border: 2px solid #ddd;
                border-radius: 5px;
                font-size: 1rem;
            }
            input[type="text"]:focus, input[type="password"]:focus {
                outline: none;
                border-color: #667eea;
            }
            .btn-login {
                width: 100%;
                padding: 0.75rem;
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                color: white;
                border: none;
                border-radius: 5px;
                font-size: 1rem;
                cursor: pointer;
                transition: transform 0.2s;
            }
            .btn-login:hover {
                transform: translateY(-2px);
            }
            .erro {
                color: #e74c3c;
                text-align: center;
                margin-top: 1rem;
            }
            .info {
                background: #f8f9fa;
                padding: 1rem;
                border-radius: 5px;
                margin-top: 1rem;
                font-size: 0.9rem;
                color: #666;
            }
        </style>
    </head>
    <body>
        <div class="login-container">
            <div class="login-header">
                <h2>🔐 Acesso Gerência</h2>
                <p>Seminário Sindcine</p>
            </div>
            
            <form method="post">
                <div class="form-group">
                    <label for="usuario">Usuário</label>
                    <input type="text" id="usuario" name="usuario" required>
                </div>
                
                <div class="form-group">
                    <label for="senha">Senha</label>
                    <input type="password" id="senha" name="senha" required>
                </div>
                
                <button type="submit" name="login" class="btn-login">Entrar</button>
                
                <?php if (isset($erro_login)): ?>
                    <div class="erro"><?php echo htmlspecialchars($erro_login); ?></div>
                <?php endif; ?>
            </form>
            
            <div class="info">
                <strong>Acesso de teste:</strong><br>
                Usuário: admin<br>
                Senha: seminario2024
            </div>
        </div>
    </body>
    </html>
    <?php
    exit;
}

// Se chegou até aqui, está logado - carregar inscrições
$inscricoes = lerInscricoes();
$total = count($inscricoes);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento - Seminário Sindcine</title>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary-yellow: #FFD700;
            --dark-yellow: #FFA500;
            --primary-black: #0d0d0d;
            --light-black: #2d2d2d;
            --text-white: #ffffff;
            --text-gray: #cccccc;
            --text-dark: #333333;
            --accent-yellow: #FFED4A;
            --shadow: rgba(0, 0, 0, 0.3);
            --gradient-yellow: linear-gradient(135deg, #FFD700 0%, #FFA500 100%);
            --gradient-dark: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
        }

        body {
            font-family: 'Inter', sans-serif;
            line-height: 1.6;
            color: var(--text-dark);
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            min-height: 100vh;
        }

        .admin-header {
            background: var(--gradient-dark);
            color: var(--text-white);
            padding: 2rem 0;
            box-shadow: 0 5px 20px var(--shadow);
        }

        .header-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header-title {
            font-size: 1.8rem;
            font-weight: 700;
        }

        .logout-btn {
            background: var(--gradient-yellow);
            color: var(--primary-black);
            text-decoration: none;
            padding: 0.75rem 1.5rem;
            border-radius: 25px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .logout-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 215, 0, 0.3);
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }

        .stat-card {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .stat-icon {
            font-size: 3rem;
            color: var(--primary-yellow);
            margin-bottom: 1rem;
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--primary-black);
            margin-bottom: 0.5rem;
        }

        .stat-label {
            color: var(--text-gray);
            font-weight: 500;
        }

        .inscricoes-section {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            border-bottom: 2px solid #f0f0f0;
            padding-bottom: 1rem;
        }

        .section-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary-black);
        }

        .export-btn {
            background: var(--gradient-yellow);
            color: var(--primary-black);
            text-decoration: none;
            padding: 0.75rem 1.5rem;
            border-radius: 25px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .export-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 215, 0, 0.3);
        }

        .inscricoes-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }

        .inscricoes-table th,
        .inscricoes-table td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid #f0f0f0;
        }

        .inscricoes-table th {
            background: var(--gradient-yellow);
            font-weight: 600;
            color: var(--primary-black);
        }

        .inscricoes-table tr:hover {
            background: #f8f9fa;
        }

        .no-data {
            text-align: center;
            padding: 3rem;
            color: var(--text-gray);
        }

        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
                gap: 1rem;
            }
            
            .stats-grid {
                grid-template-columns: 1fr;
            }
            
            .inscricoes-table {
                font-size: 0.9rem;
            }
            
            .inscricoes-table th,
            .inscricoes-table td {
                padding: 0.5rem;
            }
        }
    </style>
</head>
<body>
    <header class="admin-header">
        <div class="header-content">
            <h1 class="header-title">
                <i class="fas fa-chart-line"></i>
                Gerenciamento - Seminário Sindcine
            </h1>
            <a href="?logout=1" class="logout-btn">
                <i class="fas fa-sign-out-alt"></i>
                Sair
            </a>
        </div>
    </header>

    <main class="container">
        <!-- Estatísticas -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-users"></i>
                </div>
                <div class="stat-number"><?php echo $total; ?></div>
                <div class="stat-label">Inscrições Totais</div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-calendar-check"></i>
                </div>
                <div class="stat-number"><?php echo date('d/m/Y'); ?></div>
                <div class="stat-label">Última Atualização</div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-envelope"></i>
                </div>
                <div class="stat-number"><?php echo count(array_filter($inscricoes, function($i) { return $i['newsletter'] === 'Sim'; })); ?></div>
                <div class="stat-label">Newsletter</div>
            </div>
        </div>

        <!-- Lista de Inscrições -->
        <div class="inscricoes-section">
            <div class="section-header">
                <h2 class="section-title">
                    <i class="fas fa-list"></i>
                    Lista de Inscrições
                </h2>
                <?php if ($total > 0): ?>
                <a href="?exportar=csv" class="export-btn">
                    <i class="fas fa-download"></i>
                    Exportar CSV
                </a>
                <?php endif; ?>
            </div>

            <?php if ($total > 0): ?>
                <table class="inscricoes-table">
                    <thead>
                        <tr>
                            <th>Data</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Telefone</th>
                            <th>Empresa</th>
                            <th>Cargo</th>
                            <th>Palestras</th>
                            <th>Newsletter</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($inscricoes as $inscricao): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($inscricao['data']); ?></td>
                            <td><?php echo htmlspecialchars($inscricao['nome']); ?></td>
                            <td><?php echo htmlspecialchars($inscricao['email']); ?></td>
                            <td><?php echo htmlspecialchars($inscricao['telefone']); ?></td>
                            <td><?php echo htmlspecialchars($inscricao['empresa']); ?></td>
                            <td><?php echo htmlspecialchars($inscricao['cargo']); ?></td>
                            <td><?php echo htmlspecialchars($inscricao['palestras']); ?></td>
                            <td><?php echo $inscricao['newsletter'] === 'Sim' ? '✅' : '❌'; ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <div class="no-data">
                    <i class="fas fa-inbox" style="font-size: 4rem; color: #ddd; margin-bottom: 1rem;"></i>
                    <h3>Nenhuma inscrição encontrada</h3>
                    <p>As inscrições aparecerão aqui quando forem realizadas.</p>
                </div>
            <?php endif; ?>
        </div>
    </main>
</body>
</html>

<?php
// Processar exportação CSV
if (isset($_GET['exportar']) && $_GET['exportar'] === 'csv' && $total > 0) {
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename="inscricoes-seminario-' . date('Y-m-d') . '.csv"');
    
    $output = fopen('php://output', 'w');
    
    // Cabeçalho CSV
    fputcsv($output, ['Data', 'Nome', 'Email', 'Telefone', 'Empresa', 'Cargo', 'Experiência', 'Palestras', 'Newsletter']);
    
    // Dados
    foreach ($inscricoes as $inscricao) {
        fputcsv($output, [
            $inscricao['data'],
            $inscricao['nome'],
            $inscricao['email'],
            $inscricao['telefone'],
            $inscricao['empresa'],
            $inscricao['cargo'],
            $inscricao['experiencia'],
            $inscricao['palestras'],
            $inscricao['newsletter']
        ]);
    }
    
    fclose($output);
    exit;
}
?>