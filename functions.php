<?php
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
    check_ajax_referer('seminario_nonce', 'nonce');
    
    $nome = sanitize_text_field($_POST['nome']);
    $email = sanitize_email($_POST['email']);
    $telefone = sanitize_text_field($_POST['telefone']);
    $empresa = sanitize_text_field($_POST['empresa']);
    $cargo = sanitize_text_field($_POST['cargo']);
    $experiencia = sanitize_text_field($_POST['experiencia']);
    $newsletter = isset($_POST['newsletter']) ? 1 : 0;
    
    if(empty($nome) || empty($email) || empty($telefone) || empty($experiencia)) {
        wp_send_json_error('Campos obrigatórios não preenchidos');
    }
    
    if(!is_email($email)) {
        wp_send_json_error('Email inválido');
    }
    
    global $wpdb;
    $table_name = $wpdb->prefix . 'seminario_registrations';
    
    $result = $wpdb->insert(
        $table_name,
        array(
            'nome' => $nome,
            'email' => $email,
            'telefone' => $telefone,
            'empresa' => $empresa,
            'cargo' => $cargo,
            'experiencia' => $experiencia,
            'newsletter' => $newsletter,
            'data_cadastro' => current_time('mysql')
        ),
        array('%s', '%s', '%s', '%s', '%s', '%s', '%d', '%s')
    );
    
    if($result === false) {
        wp_send_json_error('Erro ao salvar cadastro');
    }
    
    $admin_email = get_option('admin_email');
    $subject = 'Nova inscrição - Seminário AV';
    $message = "Nova inscrição recebida:\n\n";
    $message .= "Nome: {$nome}\n";
    $message .= "Email: {$email}\n";
    $message .= "Telefone: {$telefone}\n";
    $message .= "Empresa: {$empresa}\n";
    $message .= "Cargo: {$cargo}\n";
    $message .= "Experiência: {$experiencia}\n";
    $message .= "Newsletter: " . ($newsletter ? 'Sim' : 'Não') . "\n";
    
    wp_mail($admin_email, $subject, $message);
    
    $user_subject = 'Confirmação de Inscrição - Seminário de Saúde e Segurança no Audiovisual';
    $user_message = "Olá {$nome},\n\n";
    $user_message .= "Obrigado por se inscrever no Seminário de Saúde e Segurança no Audiovisual!\n\n";
    $user_message .= "Dados do evento:\n";
    $user_message .= "Data: 15 de Dezembro, 2025\n";
    $user_message .= "Horário: 8h às 18h\n";
    $user_message .= "Local: Centro de Convenções - São Paulo\n\n";
    $user_message .= "Em breve enviaremos mais informações sobre o evento.\n\n";
    $user_message .= "Atenciosamente,\n";
    $user_message .= "Equipe Seminário AV";
    
    wp_mail($email, $user_subject, $user_message);
    
    wp_send_json_success('Cadastro realizado com sucesso!');
}
add_action('wp_ajax_seminario_registration', 'seminario_handle_registration');
add_action('wp_ajax_nopriv_seminario_registration', 'seminario_handle_registration');

function seminario_create_registration_table() {
    global $wpdb;
    
    $table_name = $wpdb->prefix . 'seminario_registrations';
    
    $charset_collate = $wpdb->get_charset_collate();
    
    $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        nome varchar(255) NOT NULL,
        email varchar(255) NOT NULL,
        telefone varchar(20) NOT NULL,
        empresa varchar(255),
        cargo varchar(255),
        experiencia varchar(100) NOT NULL,
        newsletter tinyint(1) DEFAULT 0,
        data_cadastro datetime DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY (id)
    ) $charset_collate;";
    
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}
register_activation_hook(__FILE__, 'seminario_create_registration_table');

function seminario_admin_menu() {
    add_menu_page(
        'Inscrições Seminário',
        'Seminário AV',
        'manage_options',
        'seminario-inscricoes',
        'seminario_admin_page',
        'dashicons-groups',
        30
    );
}
add_action('admin_menu', 'seminario_admin_menu');

function seminario_admin_page() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'seminario_registrations';
    
    $registrations = $wpdb->get_results("SELECT * FROM $table_name ORDER BY data_cadastro DESC");
    
    echo '<div class="wrap">';
    echo '<h1>Inscrições do Seminário</h1>';
    
    if(!empty($registrations)) {
        echo '<table class="wp-list-table widefat fixed striped">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>Nome</th>';
        echo '<th>Email</th>';
        echo '<th>Telefone</th>';
        echo '<th>Empresa</th>';
        echo '<th>Cargo</th>';
        echo '<th>Experiência</th>';
        echo '<th>Newsletter</th>';
        echo '<th>Data Cadastro</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        
        foreach($registrations as $reg) {
            echo '<tr>';
            echo '<td>' . esc_html($reg->nome) . '</td>';
            echo '<td>' . esc_html($reg->email) . '</td>';
            echo '<td>' . esc_html($reg->telefone) . '</td>';
            echo '<td>' . esc_html($reg->empresa) . '</td>';
            echo '<td>' . esc_html($reg->cargo) . '</td>';
            echo '<td>' . esc_html($reg->experiencia) . '</td>';
            echo '<td>' . ($reg->newsletter ? 'Sim' : 'Não') . '</td>';
            echo '<td>' . date('d/m/Y H:i', strtotime($reg->data_cadastro)) . '</td>';
            echo '</tr>';
        }
        
        echo '</tbody>';
        echo '</table>';
    } else {
        echo '<p>Nenhuma inscrição encontrada.</p>';
    }
    
    echo '</div>';
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
        'default' => 'Seminário de',
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
    
    // Timeline Items (7 items as in the original)
    $timeline_defaults = array(
        1 => array('time' => '08:00 - 09:00', 'title' => 'Credenciamento e Coffee Break', 'description' => 'Recepção dos participantes e networking inicial'),
        2 => array('time' => '09:00 - 10:30', 'title' => 'Abertura: Panorama da Segurança no Audiovisual', 'description' => 'Visão geral dos principais desafios e oportunidades do setor'),
        3 => array('time' => '10:45 - 12:00', 'title' => 'Ergonomia em Estúdios de Gravação', 'description' => 'Práticas para prevenção de lesões ocupacionais'),
        4 => array('time' => '12:00 - 13:30', 'title' => 'Almoço e Networking', 'description' => 'Oportunidade para conexões profissionais'),
        5 => array('time' => '13:30 - 15:00', 'title' => 'Segurança em Sets de Filmagem', 'description' => 'Protocolos e equipamentos de proteção essenciais'),
        6 => array('time' => '15:15 - 16:30', 'title' => 'Saúde Mental na Indústria Audiovisual', 'description' => 'Estratégias para bem-estar psicológico no trabalho'),
        7 => array('time' => '16:45 - 18:00', 'title' => 'Mesa Redonda e Encerramento', 'description' => 'Discussão aberta e considerações finais')
    );
    
    for ($i = 1; $i <= 7; $i++) {
        // Time
        $wp_customize->add_setting("seminario_program_item{$i}_time", array(
            'default' => $timeline_defaults[$i]['time'],
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control("seminario_program_item{$i}_time", array(
            'label'    => "Item {$i} - Horário",
            'section'  => 'seminario_program',
            'type'     => 'text',
        ));
        
        // Title
        $wp_customize->add_setting("seminario_program_item{$i}_title", array(
            'default' => $timeline_defaults[$i]['title'],
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control("seminario_program_item{$i}_title", array(
            'label'    => "Item {$i} - Título",
            'section'  => 'seminario_program',
            'type'     => 'text',
        ));
        
        // Description
        $wp_customize->add_setting("seminario_program_item{$i}_description", array(
            'default' => $timeline_defaults[$i]['description'],
            'sanitize_callback' => 'sanitize_textarea_field',
        ));
        $wp_customize->add_control("seminario_program_item{$i}_description", array(
            'label'    => "Item {$i} - Descrição",
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
    
    // Individual Speakers (3 speakers as in the original)
    $speakers_defaults = array(
        1 => array('name' => 'Dr. Carlos Silva', 'title' => 'Especialista em Ergonomia', 'bio' => '20 anos de experiência em ergonomia ocupacional'),
        2 => array('name' => 'Dra. Maria Santos', 'title' => 'Psicóloga Ocupacional', 'bio' => 'Especialista em saúde mental no trabalho'),
        3 => array('name' => 'Eng. João Costa', 'title' => 'Engenheiro de Segurança', 'bio' => 'Consultor em segurança para a indústria audiovisual')
    );
    
    for ($i = 1; $i <= 3; $i++) {
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
        
        // Speaker Bio
        $wp_customize->add_setting("seminario_speaker{$i}_bio", array(
            'default' => $speakers_defaults[$i]['bio'],
            'sanitize_callback' => 'sanitize_textarea_field',
        ));
        $wp_customize->add_control("seminario_speaker{$i}_bio", array(
            'label'    => "Palestrante {$i} - Descrição",
            'section'  => 'seminario_speakers',
            'type'     => 'textarea',
        ));
        
        // Speaker Image
        $wp_customize->add_setting("seminario_speaker{$i}_image", array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        ));
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "seminario_speaker{$i}_image", array(
            'label'    => "Palestrante {$i} - Foto",
            'section'  => 'seminario_speakers',
        )));
    }
    
    // Exhibition Section
    $wp_customize->add_section('seminario_exhibition', array(
        'title'    => 'Seção Exposição',
        'priority' => 55,
    ));
    
    $wp_customize->add_setting('seminario_exhibition_title', array(
        'default' => 'Exposição',
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
    
    $wp_customize->add_setting('seminario_site_name', array(
        'default' => 'Seminário AV',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('seminario_site_name', array(
        'label'    => 'Nome do Site (Logo)',
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
}
add_action('customize_register', 'seminario_customize_register');

function seminario_export_registrations() {
    if(!current_user_can('manage_options')) {
        return;
    }
    
    global $wpdb;
    $table_name = $wpdb->prefix . 'seminario_registrations';
    $registrations = $wpdb->get_results("SELECT * FROM $table_name ORDER BY data_cadastro DESC", ARRAY_A);
    
    if(!empty($registrations)) {
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=inscricoes-seminario.csv');
        
        $output = fopen('php://output', 'w');
        
        fputcsv($output, array('Nome', 'Email', 'Telefone', 'Empresa', 'Cargo', 'Experiência', 'Newsletter', 'Data Cadastro'));
        
        foreach($registrations as $reg) {
            fputcsv($output, array(
                $reg['nome'],
                $reg['email'],
                $reg['telefone'],
                $reg['empresa'],
                $reg['cargo'],
                $reg['experiencia'],
                $reg['newsletter'] ? 'Sim' : 'Não',
                $reg['data_cadastro']
            ));
        }
        
        fclose($output);
    }
    exit;
}

if(isset($_GET['export_seminario']) && $_GET['export_seminario'] === 'csv') {
    add_action('init', 'seminario_export_registrations');
}

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

?>