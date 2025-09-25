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
    
    register_nav_menus(array(
        'primary' => __('Menu Principal', 'seminario-av'),
    ));
}
add_action('after_setup_theme', 'seminario_theme_setup');

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
    $wp_customize->add_section('seminario_settings', array(
        'title' => 'Configurações do Seminário',
        'priority' => 30,
    ));
    
    $wp_customize->add_setting('seminario_event_date', array(
        'default' => '15 de Dezembro, 2025',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('seminario_event_date', array(
        'label' => 'Data do Evento',
        'section' => 'seminario_settings',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('seminario_event_time', array(
        'default' => '8h às 18h',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('seminario_event_time', array(
        'label' => 'Horário do Evento',
        'section' => 'seminario_settings',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('seminario_event_location', array(
        'default' => 'Centro de Convenções - São Paulo',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('seminario_event_location', array(
        'label' => 'Local do Evento',
        'section' => 'seminario_settings',
        'type' => 'text',
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
?>