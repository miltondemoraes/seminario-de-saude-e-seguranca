<?php
// Definir fuso horário para o Brasil
date_default_timezone_set('America/Sao_Paulo');

function seminario_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    
    // Suporte para page builders (Elementor, Beaver Builder, etc.)
    add_theme_support('custom-header');
    add_theme_support('custom-background');
    add_theme_support('customize-selective-refresh-widgets');
    
    register_nav_menus(array(
        'primary' => __('Menu Principal', 'seminario-av'),
    ));
}
add_action('after_setup_theme', 'seminario_theme_setup');

// Configurações de upload
function seminario_upload_settings() {
    // Aumentar limite de upload se necessário
    @ini_set('upload_max_filesize', '64M');
    @ini_set('post_max_size', '64M');
    @ini_set('max_execution_time', 300);
    
    // Verificar e criar pasta de uploads se necessário
    $upload_dir = wp_upload_dir();
    
    if (!wp_mkdir_p($upload_dir['path'])) {
        // Se não conseguir criar com wp_mkdir_p, tentar criar manualmente
        $year = date('Y');
        $month = date('m');
        
        $base_dir = $upload_dir['basedir'];
        $year_dir = $base_dir . '/' . $year;
        $month_dir = $year_dir . '/' . $month;
        
        // Criar pasta do ano
        if (!file_exists($year_dir)) {
            wp_mkdir_p($year_dir);
        }
        
        // Criar pasta do mês
        if (!file_exists($month_dir)) {
            wp_mkdir_p($month_dir);
        }
    }
}
add_action('init', 'seminario_upload_settings');

// Permitir tipos de arquivo adicionais
function seminario_upload_mimes($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    $mimes['webp'] = 'image/webp';
    return $mimes;
}
add_filter('upload_mimes', 'seminario_upload_mimes');

// Função para debug de uploads
function seminario_check_upload_permissions() {
    $upload_dir = wp_upload_dir();
    
    $info = array(
        'base_dir' => $upload_dir['basedir'],
        'base_url' => $upload_dir['baseurl'],
        'path' => $upload_dir['path'],
        'url' => $upload_dir['url'],
        'subdir' => $upload_dir['subdir'],
        'error' => $upload_dir['error'],
        'base_dir_writable' => is_writable($upload_dir['basedir']),
        'path_exists' => file_exists($upload_dir['path']),
        'path_writable' => is_writable($upload_dir['path'])
    );
    
    return $info;
}

function seminario_scripts_styles() {
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&display=swap', array(), '1.0');
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css', array(), '6.0.0');
    wp_enqueue_style('seminario-style', get_stylesheet_uri(), array(), '1.0');
    
    wp_enqueue_script('seminario-script', get_template_directory_uri() . '/js/script.js', array('jquery'), '1.0', true);
    
    wp_localize_script('seminario-script', 'seminario_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('seminario_nonce')
    ));
}
add_action('wp_enqueue_scripts', 'seminario_scripts_styles');

function seminario_handle_registration() {
    // Verificar se a requisição é AJAX
    if (!wp_doing_ajax()) {
        wp_die('Acesso negado');
    }
    
    // Verificar nonce
    if (!check_ajax_referer('seminario_nonce', 'nonce', false)) {
        wp_send_json_error('Token de segurança inválido');
        wp_die();
    }
    
    $nome = sanitize_text_field($_POST['nome']);
    $email = sanitize_email($_POST['email']);
    $telefone = sanitize_text_field($_POST['telefone']);
    $empresa = sanitize_text_field($_POST['empresa']);
    $cargo = sanitize_text_field($_POST['cargo']);
    $experiencia = sanitize_text_field($_POST['experiencia']);
    $newsletter = isset($_POST['newsletter']) ? 1 : 0;
    
    if(empty($nome) || empty($email) || empty($telefone) || empty($experiencia)) {
        wp_send_json_error('Campos obrigatórios não preenchidos');
        wp_die();
    }
    
    if(!is_email($email)) {
        wp_send_json_error('Email inválido');
        wp_die();
    }
    
    // Salvar dados NO ARQUIVO data/inscricoes.txt DO TEMA
    $data_dir = get_template_directory() . '/data';
    $file_path = $data_dir . '/inscricoes.txt';
    
    // Criar diretório se não existir
    if (!file_exists($data_dir)) {
        if (!wp_mkdir_p($data_dir)) {
            // Se não conseguir criar, tentar criar com permissões básicas
            @mkdir($data_dir, 0755, true);
        }
    }
    
    // Preparar dados para salvar - usar horário de Brasília (GMT-3)
    date_default_timezone_set('America/Sao_Paulo');
    $horario_brasil = date('d/m/Y H:i');
    
    $data_line = sprintf(
        "%s|%s|%s|%s|%s|%s|%s|%s\n",
        $horario_brasil,
        str_replace('|', '-', $nome),
        str_replace('|', '-', $email),
        str_replace('|', '-', $telefone),
        str_replace('|', '-', $empresa ?: 'Não informado'),
        str_replace('|', '-', $cargo ?: 'Não informado'),
        str_replace('|', '-', $experiencia),
        $newsletter ? 'Sim' : 'Não'
    );
    
    // MÉTODO DIRETO E SIMPLES - garantir que funcione
    $saved = false;
    
    // Tentar método 1: file_put_contents
    if (is_writable($data_dir) || !file_exists($file_path)) {
        $saved = @file_put_contents($file_path, $data_line, FILE_APPEND | LOCK_EX);
    }
    
    // Tentar método 2: fopen/fwrite se o primeiro falhou
    if ($saved === false) {
        $handle = @fopen($file_path, 'a');
        if ($handle) {
            $saved = @fwrite($handle, $data_line);
            @fclose($handle);
        }
    }
    
    // Tentar método 3: criar arquivo com permissões e tentar novamente
    if ($saved === false) {
        @touch($file_path);
        @chmod($file_path, 0666);
        $saved = @file_put_contents($file_path, $data_line, FILE_APPEND | LOCK_EX);
    }
    
    // Se AINDA não conseguiu salvar no arquivo, erro claro
    if($saved === false) {
        wp_send_json_error('ERRO: Não foi possível salvar no arquivo ' . $file_path . '. Verifique permissões da pasta.');
        wp_die();
    }
    
    wp_send_json_success('Cadastro realizado com sucesso!');
    wp_die();
}
add_action('wp_ajax_seminario_registration', 'seminario_handle_registration');
add_action('wp_ajax_nopriv_seminario_registration', 'seminario_handle_registration');

// FUNÇÃO DE TESTE - REMOVER DEPOIS
function teste_salvamento_inscricao() {
    if (isset($_GET['teste_inscricao']) && $_GET['teste_inscricao'] === 'sim') {
        $data_dir = get_template_directory() . '/data';
        $file_path = $data_dir . '/inscricoes.txt';
        
        echo "<h1>TESTE DE SALVAMENTO</h1>";
        echo "<p><strong>Pasta do tema:</strong> " . get_template_directory() . "</p>";
        echo "<p><strong>Diretório data:</strong> " . $data_dir . "</p>";
        echo "<p><strong>Arquivo completo:</strong> " . $file_path . "</p>";
        echo "<p><strong>Pasta existe?</strong> " . (file_exists($data_dir) ? 'SIM' : 'NÃO') . "</p>";
        echo "<p><strong>Arquivo existe?</strong> " . (file_exists($file_path) ? 'SIM' : 'NÃO') . "</p>";
        echo "<p><strong>Pasta é gravável?</strong> " . (is_writable($data_dir) ? 'SIM' : 'NÃO') . "</p>";
        
        // Tentar criar a pasta se não existir
        if (!file_exists($data_dir)) {
            $created = wp_mkdir_p($data_dir);
            echo "<p><strong>Tentativa de criar pasta:</strong> " . ($created ? 'SUCESSO' : 'FALHOU') . "</p>";
        }
        
        // Tentar escrever uma linha de teste - usar horário de Brasília
        date_default_timezone_set('America/Sao_Paulo');
        $linha_teste = date('d/m/Y H:i') . "|Teste Manual|teste@manual.com|(11) 99999-9999|Teste|Teste|Iniciante|Sim\n";
        $resultado = file_put_contents($file_path, $linha_teste, FILE_APPEND | LOCK_EX);
        
        echo "<p><strong>Tentativa de escrita:</strong> " . ($resultado !== false ? 'SUCESSO (' . $resultado . ' bytes)' : 'FALHOU') . "</p>";
        
        if (file_exists($file_path)) {
            echo "<h2>CONTEÚDO DO ARQUIVO:</h2>";
            echo "<pre>" . htmlspecialchars(file_get_contents($file_path)) . "</pre>";
        }
        
        exit;
    }
}
add_action('init', 'teste_salvamento_inscricao');

// Sistema de roteamento para página de gerenciamento
function seminario_gerencia_route() {
    // Verificar se a URL é /gerencia
    if ($_SERVER['REQUEST_URI'] === '/gerencia' || $_SERVER['REQUEST_URI'] === '/gerencia/') {
        // Redirecionar para a nova página HTML estática
        $redirect_url = get_template_directory_uri() . '/gerencia.html';
        wp_redirect($redirect_url);
        exit;
    }
}
add_action('init', 'seminario_gerencia_route');

// Página de gerenciamento protegida por senha
function seminario_gerencia_page() {
    session_start();
    
    $senha_correta = 'adm2025!';
    $autenticado = isset($_SESSION['seminario_auth']) && $_SESSION['seminario_auth'] === true;
    
    // Processar login
    if (isset($_POST['senha'])) {
        if ($_POST['senha'] === $senha_correta) {
            $_SESSION['seminario_auth'] = true;
            $autenticado = true;
        } else {
            $erro_login = 'Senha incorreta!';
        }
    }
    
    // Processar logout
    if (isset($_GET['logout'])) {
        session_destroy();
        header('Location: /gerencia');
        exit;
    }
    
    ?>
    <!DOCTYPE html>
    <html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Gerenciamento - Seminário AV</title>
        <style>
            * { margin: 0; padding: 0; box-sizing: border-box; }
            body { font-family: Arial, sans-serif; background: #f5f5f5; }
            .container { max-width: 1200px; margin: 0 auto; padding: 20px; }
            .login-box { 
                background: white; 
                padding: 30px; 
                border-radius: 8px; 
                box-shadow: 0 2px 10px rgba(0,0,0,0.1);
                max-width: 400px;
                margin: 50px auto;
                text-align: center;
            }
            .header { 
                background: #333; 
                color: white; 
                padding: 20px; 
                border-radius: 8px; 
                margin-bottom: 20px;
                display: flex;
                justify-content: space-between;
                align-items: center;
            }
            .data-table { 
                background: white; 
                border-radius: 8px; 
                overflow: hidden;
                box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            }
            table { width: 100%; border-collapse: collapse; }
            th, td { padding: 12px; text-align: left; border-bottom: 1px solid #ddd; }
            th { background: #f8f9fa; font-weight: bold; }
            tr:hover { background: #f8f9fa; }
            .btn { 
                padding: 10px 20px; 
                background: #007cba; 
                color: white; 
                border: none; 
                border-radius: 4px; 
                cursor: pointer;
                text-decoration: none;
                display: inline-block;
            }
            .btn:hover { background: #005a87; }
            .btn-danger { background: #dc3545; }
            .btn-danger:hover { background: #c82333; }
            input[type="password"] { 
                width: 100%; 
                padding: 10px; 
                margin: 10px 0; 
                border: 1px solid #ddd; 
                border-radius: 4px; 
            }
            .error { color: #dc3545; margin: 10px 0; }
            .stats { 
                display: grid; 
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); 
                gap: 20px; 
                margin-bottom: 20px; 
            }
            .stat-card { 
                background: white; 
                padding: 20px; 
                border-radius: 8px; 
                box-shadow: 0 2px 10px rgba(0,0,0,0.1);
                text-align: center;
            }
            .stat-number { font-size: 2em; font-weight: bold; color: #007cba; }
        </style>
    </head>
    <body>
        <?php if (!$autenticado): ?>
            <div class="login-box">
                <h2>🔒 Acesso Restrito</h2>
                <p>Digite a senha para acessar o gerenciamento:</p>
                
                <?php if (isset($erro_login)): ?>
                    <div class="error"><?php echo $erro_login; ?></div>
                <?php endif; ?>
                
                <form method="POST">
                    <input type="password" name="senha" placeholder="Digite a senha..." required>
                    <button type="submit" class="btn">Entrar</button>
                </form>
            </div>
        <?php else: ?>
            <div class="container">
                <div class="header">
                    <h1>📊 Gerenciamento de Inscrições</h1>
                    <a href="?logout=1" class="btn btn-danger">Sair</a>
                </div>
                
                <?php
                // Ler dados do arquivo data/inscricoes.txt
                $file_path = get_template_directory() . '/data/inscricoes.txt';
                $inscricoes = array();
                
                // Tentar ler do arquivo primeiro
                if (file_exists($file_path)) {
                    $lines = file($file_path, FILE_IGNORE_NEW_LINES);
                    foreach ($lines as $line) {
                        if (!empty(trim($line))) {
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
                }
                
                // Se não encontrou no arquivo, ler das options
                if (empty($inscricoes)) {
                    $inscricoes_options = get_option('seminario_inscricoes', array());
                    if (!empty($inscricoes_options)) {
                        $inscricoes = $inscricoes_options;
                    }
                }
                
                $total_inscricoes = count($inscricoes);
                $com_newsletter = count(array_filter($inscricoes, function($i) { return $i['newsletter'] === 'Sim'; }));
                ?>
                
                <div class="stats">
                    <div class="stat-card">
                        <div class="stat-number"><?php echo $total_inscricoes; ?></div>
                        <div>Total de Inscrições</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number"><?php echo $com_newsletter; ?></div>
                        <div>Querem Newsletter</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number"><?php echo date('d/m/Y'); ?></div>
                        <div>Última Atualização</div>
                    </div>
                </div>
                
                <div class="data-table">
                    <?php if (empty($inscricoes)): ?>
                        <div style="padding: 40px; text-align: center; color: #666;">
                            📝 Nenhuma inscrição encontrada ainda.
                        </div>
                    <?php else: ?>
                        <table>
                            <thead>
                                <tr>
                                    <th>Data/Hora</th>
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>Telefone</th>
                                    <th>Empresa</th>
                                    <th>Cargo</th>
                                    <th>Experiência</th>
                                    <th>Newsletter</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach (array_reverse($inscricoes) as $inscricao): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($inscricao['data']); ?></td>
                                        <td><?php echo htmlspecialchars($inscricao['nome']); ?></td>
                                        <td><?php echo htmlspecialchars($inscricao['email']); ?></td>
                                        <td><?php echo htmlspecialchars($inscricao['telefone']); ?></td>
                                        <td><?php echo htmlspecialchars($inscricao['empresa']); ?></td>
                                        <td><?php echo htmlspecialchars($inscricao['cargo']); ?></td>
                                        <td><?php echo htmlspecialchars($inscricao['experiencia']); ?></td>
                                        <td><?php echo $inscricao['newsletter'] === 'Sim' ? '✅' : '❌'; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
    </body>
    </html>
    <?php
}

function seminario_custom_body_classes($classes) {
    if(is_page_template('page-seminario.php')) {
        $classes[] = 'seminario-page';
    }
    return $classes;
}
add_filter('body_class', 'seminario_custom_body_classes');

function seminario_customize_register($wp_customize) {
    // Hero Section
    $wp_customize->add_section('seminario_hero', array(
        'title'    => 'Seção Hero (Principal)',
        'priority' => 30,
    ));
    
    // Hero Title Line 1
    $wp_customize->add_setting('seminario_hero_title_line1', array(
        'default' => '2º Seminário de',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('seminario_hero_title_line1', array(
        'label'    => 'Título Principal - Linha 1',
        'section'  => 'seminario_hero',
        'type'     => 'text',
    ));
    
    // Hero Title Line 2
    $wp_customize->add_setting('seminario_hero_title_line2', array(
        'default' => 'Saúde e Segurança',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('seminario_hero_title_line2', array(
        'label'    => 'Título Principal - Linha 2',
        'section'  => 'seminario_hero',
        'type'     => 'text',
    ));
    
    // Hero Title Line 3
    $wp_customize->add_setting('seminario_hero_title_line3', array(
        'default' => 'no Audiovisual',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('seminario_hero_title_line3', array(
        'label'    => 'Título Principal - Linha 3',
        'section'  => 'seminario_hero',
        'type'     => 'text',
    ));
    
    // Hero Description
    $wp_customize->add_setting('seminario_hero_description', array(
        'default' => 'Um evento essencial para profissionais que buscam conhecimento em práticas seguras e saudáveis na indústria audiovisual.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('seminario_hero_description', array(
        'label'    => 'Descrição Principal',
        'section'  => 'seminario_hero',
        'type'     => 'textarea',
    ));
    
    // Hero CTA Button Text
    $wp_customize->add_setting('seminario_hero_cta', array(
        'default' => 'Cadastre-se Gratuitamente',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('seminario_hero_cta', array(
        'label'    => 'Texto do Botão Principal',
        'section'  => 'seminario_hero',
        'type'     => 'text',
    ));
    
    // Event Information Section
    $wp_customize->add_section('seminario_event_info', array(
        'title'    => 'Informações do Evento',
        'priority' => 35,
    ));
    
    // Event Date
    $wp_customize->add_setting('seminario_event_date', array(
        'default' => '15 de Dezembro, 2025',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('seminario_event_date', array(
        'label'    => 'Data do Evento',
        'section'  => 'seminario_event_info',
        'type'     => 'text',
    ));
    
    // Event Location
    $wp_customize->add_setting('seminario_event_location', array(
        'default' => 'Centro de Convenções - São Paulo',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('seminario_event_location', array(
        'label'    => 'Local do Evento',
        'section'  => 'seminario_event_info',
        'type'     => 'text',
    ));
    
    // Event Time
    $wp_customize->add_setting('seminario_event_time', array(
        'default' => '8h às 18h',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('seminario_event_time', array(
        'label'    => 'Horário do Evento',
        'section'  => 'seminario_event_info',
        'type'     => 'text',
    ));
    
    // About Section
    $wp_customize->add_section('seminario_about', array(
        'title'    => 'Seção Sobre o Evento',
        'priority' => 40,
    ));
    
    // About Title
    $wp_customize->add_setting('seminario_about_title', array(
        'default' => 'Sobre o Evento',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('seminario_about_title', array(
        'label'    => 'Título da Seção',
        'section'  => 'seminario_about',
        'type'     => 'text',
    ));
    
    // About Subtitle
    $wp_customize->add_setting('seminario_about_subtitle', array(
        'default' => 'Conectando profissionais para um audiovisual mais seguro e saudável',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('seminario_about_subtitle', array(
        'label'    => 'Subtítulo da Seção',
        'section'  => 'seminario_about',
        'type'     => 'text',
    ));
    
    // About Text 1
    $wp_customize->add_setting('seminario_about_text1', array(
        'default' => 'O Seminário de Saúde e Segurança no Audiovisual é um evento único que reúne especialistas, profissionais e estudantes da área para discutir as melhores práticas em segurança ocupacional e bem-estar no setor audiovisual.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('seminario_about_text1', array(
        'label'    => 'Primeiro Parágrafo',
        'section'  => 'seminario_about',
        'type'     => 'textarea',
    ));
    
    // About Text 2
    $wp_customize->add_setting('seminario_about_text2', array(
        'default' => 'Durante um dia completo de palestras, workshops e networking, você terá acesso a conteúdos exclusivos sobre ergonomia, segurança em sets de filmagem, prevenção de acidentes e muito mais.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('seminario_about_text2', array(
        'label'    => 'Segundo Parágrafo',
        'section'  => 'seminario_about',
        'type'     => 'textarea',
    ));
    
    // About Stats
    $wp_customize->add_setting('seminario_about_stat1_number', array(
        'default' => '500+',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('seminario_about_stat1_number', array(
        'label'    => 'Estatística 1 - Número',
        'section'  => 'seminario_about',
        'type'     => 'text',
    ));
    
    $wp_customize->add_setting('seminario_about_stat1_label', array(
        'default' => 'Participantes Esperados',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('seminario_about_stat1_label', array(
        'label'    => 'Estatística 1 - Texto',
        'section'  => 'seminario_about',
        'type'     => 'text',
    ));
    
    $wp_customize->add_setting('seminario_about_stat2_number', array(
        'default' => '15+',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('seminario_about_stat2_number', array(
        'label'    => 'Estatística 2 - Número',
        'section'  => 'seminario_about',
        'type'     => 'text',
    ));
    
    $wp_customize->add_setting('seminario_about_stat2_label', array(
        'default' => 'Palestrantes Especialistas',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('seminario_about_stat2_label', array(
        'label'    => 'Estatística 2 - Texto',
        'section'  => 'seminario_about',
        'type'     => 'text',
    ));
    
    $wp_customize->add_setting('seminario_about_stat3_number', array(
        'default' => '8h',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('seminario_about_stat3_number', array(
        'label'    => 'Estatística 3 - Número',
        'section'  => 'seminario_about',
        'type'     => 'text',
    ));
    
    $wp_customize->add_setting('seminario_about_stat3_label', array(
        'default' => 'de Conteúdo Intensivo',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('seminario_about_stat3_label', array(
        'label'    => 'Estatística 3 - Texto',
        'section'  => 'seminario_about',
        'type'     => 'text',
    ));
    
    // Program Section
    $wp_customize->add_section('seminario_program', array(
        'title'    => 'Seção Programação',
        'priority' => 45,
    ));
    
    $wp_customize->add_setting('seminario_program_title', array(
        'default' => 'Programação',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('seminario_program_title', array(
        'label'    => 'Título da Seção',
        'section'  => 'seminario_program',
        'type'     => 'text',
    ));
    
    $wp_customize->add_setting('seminario_program_subtitle', array(
        'default' => 'Agenda completa com palestras e workshops especializados',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('seminario_program_subtitle', array(
        'label'    => 'Subtítulo da Seção',
        'section'  => 'seminario_program',
        'type'     => 'text',
    ));
    
        $wp_customize->add_control('seminario_program_description', array(
        'label'    => 'Descrição',
        'section'  => 'seminario_program',
        'type'     => 'textarea',
    ));
    
    // Datas dos dias
    $wp_customize->add_setting('seminario_program_day1_date', array(
        'default' => '15 de Dezembro',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('seminario_program_day1_date', array(
        'label'    => 'Data do Dia 1',
        'section'  => 'seminario_program',
        'type'     => 'text',
    ));
    
    $wp_customize->add_setting('seminario_program_day2_date', array(
        'default' => '16 de Dezembro',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('seminario_program_day2_date', array(
        'label'    => 'Data do Dia 2',
        'section'  => 'seminario_program',
        'type'     => 'text',
    ));
    
    // Timeline Items - Dia 1 (5 items)
    $timeline_day1_defaults = array(
        1 => array('time' => '08:00 - 09:00', 'title' => 'Credenciamento e Coffee Break', 'description' => 'Recepção dos participantes e networking inicial'),
        2 => array('time' => '09:00 - 10:30', 'title' => 'Abertura: Panorama da Segurança no Audiovisual', 'description' => 'Visão geral dos principais desafios e oportunidades do setor'),
        3 => array('time' => '10:45 - 12:00', 'title' => 'Ergonomia em Estúdios de Gravação', 'description' => 'Práticas para prevenção de lesões ocupacionais'),
        4 => array('time' => '12:00 - 13:30', 'title' => 'Almoço e Networking', 'description' => 'Oportunidade para conexões profissionais'),
        5 => array('time' => '13:30 - 15:00', 'title' => 'Segurança em Sets de Filmagem', 'description' => 'Protocolos e equipamentos de proteção essenciais')
    );
    
    // Timeline Items - Dia 2 (4 items)
    $timeline_day2_defaults = array(
        1 => array('time' => '08:30 - 09:30', 'title' => 'Coffee Break e Boas-vindas', 'description' => 'Segundo dia com energização e networking'),
        2 => array('time' => '09:30 - 11:00', 'title' => 'Saúde Mental na Indústria Audiovisual', 'description' => 'Estratégias para bem-estar psicológico no trabalho'),
        3 => array('time' => '11:15 - 12:30', 'title' => 'Tecnologias Emergentes em Segurança', 'description' => 'Inovações e ferramentas digitais para prevenção de acidentes'),
        4 => array('time' => '14:00 - 15:30', 'title' => 'Mesa Redonda e Encerramento', 'description' => 'Discussão aberta e considerações finais')
    );
    
    // Campos para Dia 1
    for ($i = 1; $i <= 5; $i++) {
        // Time
        $wp_customize->add_setting("seminario_program_day1_item{$i}_time", array(
            'default' => $timeline_day1_defaults[$i]['time'],
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control("seminario_program_day1_item{$i}_time", array(
            'label'    => "Dia 1 - Item {$i} - Horário",
            'section'  => 'seminario_program',
            'type'     => 'text',
        ));
        
        // Title
        $wp_customize->add_setting("seminario_program_day1_item{$i}_title", array(
            'default' => $timeline_day1_defaults[$i]['title'],
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control("seminario_program_day1_item{$i}_title", array(
            'label'    => "Dia 1 - Item {$i} - Título",
            'section'  => 'seminario_program',
            'type'     => 'text',
        ));
        
        // Description
        $wp_customize->add_setting("seminario_program_day1_item{$i}_description", array(
            'default' => $timeline_day1_defaults[$i]['description'],
            'sanitize_callback' => 'sanitize_textarea_field',
        ));
        $wp_customize->add_control("seminario_program_day1_item{$i}_description", array(
            'label'    => "Dia 1 - Item {$i} - Descrição",
            'section'  => 'seminario_program',
            'type'     => 'textarea',
        ));
    }
    
    // Campos para Dia 2
    for ($i = 1; $i <= 4; $i++) {
        // Time
        $wp_customize->add_setting("seminario_program_day2_item{$i}_time", array(
            'default' => $timeline_day2_defaults[$i]['time'],
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control("seminario_program_day2_item{$i}_time", array(
            'label'    => "Dia 2 - Item {$i} - Horário",
            'section'  => 'seminario_program',
            'type'     => 'text',
        ));
        
        // Title
        $wp_customize->add_setting("seminario_program_day2_item{$i}_title", array(
            'default' => $timeline_day2_defaults[$i]['title'],
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control("seminario_program_day2_item{$i}_title", array(
            'label'    => "Dia 2 - Item {$i} - Título",
            'section'  => 'seminario_program',
            'type'     => 'text',
        ));
        
        // Description
        $wp_customize->add_setting("seminario_program_day2_item{$i}_description", array(
            'default' => $timeline_day2_defaults[$i]['description'],
            'sanitize_callback' => 'sanitize_textarea_field',
        ));
        $wp_customize->add_control("seminario_program_day2_item{$i}_description", array(
            'label'    => "Dia 2 - Item {$i} - Descrição",
            'section'  => 'seminario_program',
            'type'     => 'textarea',
        ));
    }
    
    // Speakers Section
    $wp_customize->add_section('seminario_speakers', array(
        'title'    => 'Seção Palestrantes',
        'priority' => 50,
    ));
    
    $wp_customize->add_setting('seminario_speakers_title', array(
        'default' => 'Palestrantes',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('seminario_speakers_title', array(
        'label'    => 'Título da Seção',
        'section'  => 'seminario_speakers',
        'type'     => 'text',
    ));
    
    $wp_customize->add_setting('seminario_speakers_subtitle', array(
        'default' => 'Especialistas reconhecidos na área de saúde e segurança ocupacional',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('seminario_speakers_subtitle', array(
        'label'    => 'Subtítulo da Seção',
        'section'  => 'seminario_speakers',
        'type'     => 'text',
    ));
    
    // Individual Speakers (20 speakers)
    $speakers_defaults = array(
        1 => array('name' => 'Dr. Carlos Silva', 'title' => 'Especialista em Ergonomia'),
        2 => array('name' => 'Dra. Maria Santos', 'title' => 'Psicóloga Ocupacional'),
        3 => array('name' => 'Eng. João Costa', 'title' => 'Engenheiro de Segurança'),
        4 => array('name' => 'Dra. Ana Paula', 'title' => 'Medicina do Trabalho'),
        5 => array('name' => 'Prof. Roberto Lima', 'title' => 'Audiologia Ocupacional'),
        6 => array('name' => 'Dra. Fernanda Cruz', 'title' => 'Fisioterapia do Trabalho'),
        7 => array('name' => 'Eng. Marcos Oliveira', 'title' => 'Segurança em Altura'),
        8 => array('name' => 'Dra. Juliana Rocha', 'title' => 'Toxicologia Ocupacional'),
        9 => array('name' => 'Prof. André Souza', 'title' => 'Ergonomia Cognitiva'),
        10 => array('name' => 'Dra. Patricia Alves', 'title' => 'Saúde Mental'),
        11 => array('name' => 'Eng. Lucas Martins', 'title' => 'Prevenção de Acidentes'),
        12 => array('name' => 'Dra. Camila Ferreira', 'title' => 'Dermatologia Ocupacional'),
        13 => array('name' => 'Prof. Diego Santos', 'title' => 'Biomecânica'),
        14 => array('name' => 'Dra. Renata Silva', 'title' => 'Pneumologia Ocupacional'),
        15 => array('name' => 'Eng. Rafael Costa', 'title' => 'Gestão de Riscos'),
        16 => array('name' => 'Dra. Vanessa Lima', 'title' => 'Neurologia do Trabalho'),
        17 => array('name' => 'Prof. Thiago Pereira', 'title' => 'Acústica e Ruído'),
        18 => array('name' => 'Dra. Carolina Dias', 'title' => 'Oftalmologia Ocupacional'),
        19 => array('name' => 'Eng. Gabriel Mendes', 'title' => 'Segurança Elétrica'),
        20 => array('name' => 'Dra. Beatriz Rodrigues', 'title' => 'Epidemiologia Ocupacional')
    );
    
    for ($i = 1; $i <= 20; $i++) {
        // Speaker Name
        $wp_customize->add_setting("seminario_speaker{$i}_name", array(
            'default' => $speakers_defaults[$i]['name'],
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control("seminario_speaker{$i}_name", array(
            'label'    => "Palestrante {$i} - Nome",
            'section'  => 'seminario_speakers',
            'type'     => 'text',
        ));
        
        // Speaker Title/Specialty
        $wp_customize->add_setting("seminario_speaker{$i}_title", array(
            'default' => $speakers_defaults[$i]['title'],
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control("seminario_speaker{$i}_title", array(
            'label'    => "Palestrante {$i} - Especialidade",
            'section'  => 'seminario_speakers',
            'type'     => 'text',
        ));
    }
    
    // Exhibition Section
    $wp_customize->add_section('seminario_exhibition', array(
        'title'    => 'Seção Expositores',
        'priority' => 55,
    ));
    
    $wp_customize->add_setting('seminario_exhibition_title', array(
        'default' => 'Expositores',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('seminario_exhibition_title', array(
        'label'    => 'Título da Seção',
        'section'  => 'seminario_exhibition',
        'type'     => 'text',
    ));
    
    $wp_customize->add_setting('seminario_exhibition_subtitle', array(
        'default' => 'Conheça as empresas parceiras e suas soluções inovadoras',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('seminario_exhibition_subtitle', array(
        'label'    => 'Subtítulo da Seção',
        'section'  => 'seminario_exhibition',
        'type'     => 'text',
    ));
    
    $wp_customize->add_setting('seminario_exhibition_text', array(
        'default' => 'Durante todo o evento, você poderá visitar os estandes de nossos parceiros e conhecer as mais recentes tecnologias e serviços voltados para saúde e segurança no audiovisual.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('seminario_exhibition_text', array(
        'label'    => 'Texto da Seção',
        'section'  => 'seminario_exhibition',
        'type'     => 'textarea',
    ));
    
    // Exhibitors (6 exhibitors as in the original)
    $exhibitors_defaults = array(
        1 => array('name' => 'TechSafety Pro', 'description' => 'Equipamentos de proteção individual especializados para audiovisual', 'booth' => 'Estande A1'),
        2 => array('name' => 'ErgoMedia Solutions', 'description' => 'Móveis ergonômicos e soluções para estúdios', 'booth' => 'Estande A2'),
        3 => array('name' => 'WellBeing Media', 'description' => 'Programas de bem-estar e saúde ocupacional', 'booth' => 'Estande A3'),
        4 => array('name' => 'AudioSafe Tech', 'description' => 'Tecnologia em monitoramento de segurança em sets', 'booth' => 'Estande B1'),
        5 => array('name' => 'Emergency AV', 'description' => 'Kits de primeiros socorros e treinamentos de emergência', 'booth' => 'Estande B2'),
        6 => array('name' => 'CertifiAV', 'description' => 'Certificações e auditorias em segurança audiovisual', 'booth' => 'Estande B3')
    );
    
    for ($i = 1; $i <= 6; $i++) {
        // Exhibitor Name
        $wp_customize->add_setting("seminario_exhibitor{$i}_name", array(
            'default' => $exhibitors_defaults[$i]['name'],
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control("seminario_exhibitor{$i}_name", array(
            'label'    => "Expositor {$i} - Nome da Empresa",
            'section'  => 'seminario_exhibition',
            'type'     => 'text',
        ));
        
        // Exhibitor Description
        $wp_customize->add_setting("seminario_exhibitor{$i}_description", array(
            'default' => $exhibitors_defaults[$i]['description'],
            'sanitize_callback' => 'sanitize_textarea_field',
        ));
        $wp_customize->add_control("seminario_exhibitor{$i}_description", array(
            'label'    => "Expositor {$i} - Descrição",
            'section'  => 'seminario_exhibition',
            'type'     => 'textarea',
        ));
        
        // Exhibitor Booth
        $wp_customize->add_setting("seminario_exhibitor{$i}_booth", array(
            'default' => $exhibitors_defaults[$i]['booth'],
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control("seminario_exhibitor{$i}_booth", array(
            'label'    => "Expositor {$i} - Estande",
            'section'  => 'seminario_exhibition',
            'type'     => 'text',
        ));
    }
    
    // Exhibition CTA Section
    $wp_customize->add_setting('seminario_exhibition_cta_title', array(
        'default' => 'Interessado em expor?',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('seminario_exhibition_cta_title', array(
        'label'    => 'Título do CTA',
        'section'  => 'seminario_exhibition',
        'type'     => 'text',
    ));
    
    $wp_customize->add_setting('seminario_exhibition_cta_text', array(
        'default' => 'Entre em contato conosco para conhecer nossas oportunidades de patrocínio',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('seminario_exhibition_cta_text', array(
        'label'    => 'Texto do CTA',
        'section'  => 'seminario_exhibition',
        'type'     => 'text',
    ));
    
    $wp_customize->add_setting('seminario_exhibition_cta_button', array(
        'default' => 'Seja um Expositor',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('seminario_exhibition_cta_button', array(
        'label'    => 'Texto do Botão CTA',
        'section'  => 'seminario_exhibition',
        'type'     => 'text',
    ));
    
    // Registration Section
    $wp_customize->add_section('seminario_registration', array(
        'title'    => 'Seção Inscrições',
        'priority' => 60,
    ));
    
    $wp_customize->add_setting('seminario_registration_title', array(
        'default' => 'Faça sua Inscrição',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('seminario_registration_title', array(
        'label'    => 'Título da Seção',
        'section'  => 'seminario_registration',
        'type'     => 'text',
    ));
    
    $wp_customize->add_setting('seminario_registration_subtitle', array(
        'default' => 'Garanta sua vaga neste evento imperdível!',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('seminario_registration_subtitle', array(
        'label'    => 'Subtítulo da Seção',
        'section'  => 'seminario_registration',
        'type'     => 'text',
    ));
    
    $wp_customize->add_setting('seminario_registration_free_text', array(
        'default' => 'Inscrições totalmente gratuitas',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('seminario_registration_free_text', array(
        'label'    => 'Texto "Gratuito"',
        'section'  => 'seminario_registration',
        'type'     => 'text',
    ));
    
    // How to Get There Section
    $wp_customize->add_section('seminario_location', array(
        'title'    => 'Seção Como Chegar',
        'priority' => 65,
    ));
    
    $wp_customize->add_setting('seminario_location_title', array(
        'default' => 'Como Chegar',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('seminario_location_title', array(
        'label'    => 'Título da Seção',
        'section'  => 'seminario_location',
        'type'     => 'text',
    ));
    
    $wp_customize->add_setting('seminario_location_subtitle', array(
        'default' => 'Todas as informações para sua chegada ao evento',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('seminario_location_subtitle', array(
        'label'    => 'Subtítulo da Seção',
        'section'  => 'seminario_location',
        'type'     => 'text',
    ));
    
    $wp_customize->add_setting('seminario_location_venue_name', array(
        'default' => 'Centro de Convenções - São Paulo',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('seminario_location_venue_name', array(
        'label'    => 'Nome do Local',
        'section'  => 'seminario_location',
        'type'     => 'text',
    ));
    
    $wp_customize->add_setting('seminario_location_address', array(
        'default' => 'Rua das Convenções, 1000\nVila Olímpia - São Paulo/SP\nCEP: 04551-000',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('seminario_location_address', array(
        'label'    => 'Endereço Completo',
        'section'  => 'seminario_location',
        'type'     => 'textarea',
    ));
    
    // About Sindcine Section
    $wp_customize->add_section('seminario_sindcine', array(
        'title'    => 'Seção Sobre o Sindcine',
        'priority' => 70,
    ));
    
    $wp_customize->add_setting('seminario_sindcine_title', array(
        'default' => 'Sobre o Sindcine',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('seminario_sindcine_title', array(
        'label'    => 'Título da Seção',
        'section'  => 'seminario_sindcine',
        'type'     => 'text',
    ));
    
    $wp_customize->add_setting('seminario_sindcine_subtitle', array(
        'default' => 'Conheça o Sindicato dos Trabalhadores nas Indústrias Cinematográficas e do Audiovisual',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('seminario_sindcine_subtitle', array(
        'label'    => 'Subtítulo da Seção',
        'section'  => 'seminario_sindcine',
        'type'     => 'text',
    ));
    
    $wp_customize->add_setting('seminario_sindcine_text1', array(
        'default' => 'O Sindcine é o sindicato que representa os trabalhadores da indústria cinematográfica e audiovisual, lutando por melhores condições de trabalho, segurança e bem-estar de todos os profissionais do setor.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('seminario_sindcine_text1', array(
        'label'    => 'Primeiro Parágrafo',
        'section'  => 'seminario_sindcine',
        'type'     => 'textarea',
    ));
    
    $wp_customize->add_setting('seminario_sindcine_text2', array(
        'default' => 'Fundado com o objetivo de promover os direitos trabalhistas e a segurança ocupacional, o Sindcine tem sido um pilar fundamental na organização de eventos como este seminário, sempre focado na educação e capacitação dos profissionais.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('seminario_sindcine_text2', array(
        'label'    => 'Segundo Parágrafo',
        'section'  => 'seminario_sindcine',
        'type'     => 'textarea',
    ));
    
    // Header/Footer Section
    $wp_customize->add_section('seminario_header_footer', array(
        'title'    => 'Header e Footer',
        'priority' => 75,
    ));
    
    // Logo Upload
    $wp_customize->add_setting('seminario_logo', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'seminario_logo', array(
        'label'    => 'Logo do Seminário',
        'description' => 'Faça upload de uma logo personalizada. Se não configurada, usará a imagem padrão (image.png).',
        'section'  => 'seminario_header_footer',
    )));
    
    $wp_customize->add_setting('seminario_site_name', array(
        'default' => 'Seminário AV',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('seminario_site_name', array(
        'label'    => 'Texto da Logo',
        'description' => 'Texto que aparece no header no lugar da logo (ex: Seminário AV).',
        'section'  => 'seminario_header_footer',
        'type'     => 'text',
    ));
    
    $wp_customize->add_setting('seminario_footer_description', array(
        'default' => 'Promovendo saúde e segurança na indústria audiovisual.',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('seminario_footer_description', array(
        'label'    => 'Descrição do Footer',
        'section'  => 'seminario_header_footer',
        'type'     => 'text',
    ));
    
    // Localização Section (Imagem Estática)
    $wp_customize->add_section('seminario_location', array(
        'title'    => 'Localização do Evento',
        'priority' => 80,
        'description' => 'Configure a imagem do mapa e informações de localização.',
    ));
    
    // Imagem do Mapa
    $wp_customize->add_setting('seminario_location_map_image', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'seminario_location_map_image', array(
        'label'    => 'Imagem do Mapa',
        'description' => 'Faça upload de uma imagem personalizada do mapa. Se não configurada, usará a imagem padrão (Loc.png).',
        'section'  => 'seminario_location',
    )));
    
    // Texto alternativo da imagem
    $wp_customize->add_setting('seminario_location_map_alt', array(
        'default' => 'Localização do evento',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('seminario_location_map_alt', array(
        'label'    => 'Texto Alternativo da Imagem',
        'description' => 'Descrição da imagem para acessibilidade (ex: Mapa do Centro de Convenções)',
        'section'  => 'seminario_location',
        'type'     => 'text',
    ));
}
add_action('customize_register', 'seminario_customize_register');

function seminario_widgets_init() {
    register_sidebar(array(
        'name' => 'Footer 1',
        'id' => 'footer-1',
        'description' => 'Área do Footer 1',
        'before_widget' => '<div class="footer-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
    
    register_sidebar(array(
        'name' => 'Footer 2',
        'id' => 'footer-2',
        'description' => 'Área do Footer 2',
        'before_widget' => '<div class="footer-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
    
    register_sidebar(array(
        'name' => 'Footer 3',
        'id' => 'footer-3',
        'description' => 'Área do Footer 3',
        'before_widget' => '<div class="footer-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
}
add_action('widgets_init', 'seminario_widgets_init');

function seminario_nav_menu_link_attributes($atts, $item, $args) {
    if($args->theme_location == 'primary') {
        $atts['class'] = 'nav-link';
        
        if(strpos($item->url, '#cadastro') !== false) {
            $atts['class'] .= ' btn-cadastro';
        }
    }
    return $atts;
}
add_filter('nav_menu_link_attributes', 'seminario_nav_menu_link_attributes', 10, 3);

// ====================================
// ELEMENTOR COMPATIBILITY
// ====================================

// Add Elementor support
function seminario_elementor_support() {
    // Add theme support for Elementor
    add_theme_support('elementor');
    
    // Add support for full width pages
    add_theme_support('post-formats', array('aside', 'gallery', 'video', 'audio'));
}
add_action('after_setup_theme', 'seminario_elementor_support');

// Remove theme styles on Elementor canvas template
function seminario_elementor_canvas_body_class($classes) {
    if(is_page_template('elementor_canvas')) {
        $classes[] = 'elementor-page elementor-page-canvas';
    }
    return $classes;
}
add_filter('body_class', 'seminario_elementor_canvas_body_class');

// Elementor Pro Locations support
function seminario_register_elementor_locations($elementor_theme_manager) {
    $elementor_theme_manager->register_location('header');
    $elementor_theme_manager->register_location('footer');
    $elementor_theme_manager->register_location('single');
    $elementor_theme_manager->register_location('archive');
}
add_action('elementor/theme/register_locations', 'seminario_register_elementor_locations');

// Ensure Elementor content width matches theme
function seminario_elementor_content_width() {
    return 1400; // Match our container max-width
}
add_filter('elementor/editor/localize_settings', function($settings) {
    $settings['container_width'] = seminario_elementor_content_width();
    return $settings;
});

// Add custom CSS classes to body for Elementor pages
function seminario_elementor_body_classes($classes) {
    if (class_exists('\\Elementor\\Plugin')) {
        $elementor = \Elementor\Plugin::$instance;
        if ($elementor->editor->is_edit_mode()) {
            $classes[] = 'elementor-edit-mode';
        }
        if ($elementor->preview->is_preview_mode()) {
            $classes[] = 'elementor-preview-mode';
        }
    }
    return $classes;
}
add_filter('body_class', 'seminario_elementor_body_classes');

// Elementor theme colors integration
function seminario_add_elementor_theme_colors() {
    if (class_exists('\\Elementor\\Core\\Kits\\Documents\\Tabs\\Global_Colors')) {
        // This will be handled by Elementor's system colors
        add_theme_support('elementor-color-scheme');
    }
}
add_action('after_setup_theme', 'seminario_add_elementor_theme_colors');

// Custom Elementor widgets support
function seminario_elementor_widget_categories($elements_manager) {
    $elements_manager->add_category(
        'seminario-widgets',
        [
            'title' => __('Seminário Widgets', 'seminario-av'),
            'icon' => 'fa fa-plug',
        ]
    );
}
add_action('elementor/elements/categories_registered', 'seminario_elementor_widget_categories');

// Remover widgets indesejados do footer
function seminario_remove_unwanted_widgets() {
    unregister_widget('WP_Widget_Archives');
    unregister_widget('WP_Widget_Categories');
}
add_action('widgets_init', 'seminario_remove_unwanted_widgets', 11);

// JavaScript para remover Archives e Categories do footer
function seminario_remove_footer_elements() {
    ?>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Função para remover elementos que contenham textos específicos
        function removeElementsWithText(texts) {
            texts.forEach(function(text) {
                // Procurar por elementos que contenham o texto
                const elements = document.querySelectorAll('*');
                elements.forEach(function(element) {
                    if (element.textContent && element.textContent.trim().includes(text)) {
                        // Se for um título (H1-H6), remover o elemento pai ou o próprio elemento
                        if (element.tagName && element.tagName.match(/^H[1-6]$/)) {
                            const parent = element.closest('.widget') || element.closest('aside') || element.closest('.footer-section > div');
                            if (parent) {
                                parent.remove();
                            } else {
                                element.remove();
                            }
                        }
                        // Se for uma lista que contém o texto, remover a lista toda
                        else if (element.tagName === 'UL' || element.tagName === 'LI') {
                            const widget = element.closest('.widget') || element.closest('aside') || element.closest('.footer-section > div');
                            if (widget) {
                                widget.remove();
                            } else {
                                element.remove();
                            }
                        }
                    }
                });
            });
        }
        
        // Lista de textos a serem removidos
        const textsToRemove = [
            'Archives',
            'Categories', 
            'Uncategorized',
            'September 2025'
        ];
        
        // Executar remoção
        removeElementsWithText(textsToRemove);
        
        // Executar novamente após um pequeno delay para elementos carregados dinamicamente
        setTimeout(function() {
            removeElementsWithText(textsToRemove);
        }, 500);
    });
    </script>
    <?php
}
add_action('wp_footer', 'seminario_remove_footer_elements');

// Função para testar o horário - adicione ?teste_horario=1 na URL para testar
function seminario_teste_horario() {
    if (isset($_GET['teste_horario']) && $_GET['teste_horario'] == '1') {
        echo '<div style="position: fixed; top: 10px; right: 10px; background: #000; color: #fff; padding: 10px; z-index: 9999;">';
        echo '<h4>Teste de Horário</h4>';
        echo '<p><strong>Horário atual (Brasil):</strong> ' . date('d/m/Y H:i:s') . '</p>';
        echo '<p><strong>Fuso horário ativo:</strong> ' . date_default_timezone_get() . '</p>';
        echo '<p><strong>Timestamp:</strong> ' . time() . '</p>';
        echo '</div>';
    }
}
add_action('wp_footer', 'seminario_teste_horario');

?>