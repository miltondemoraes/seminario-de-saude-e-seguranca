<?php get_header(); ?>

<main>
    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-background"></div>
        <div class="container">
            <div class="hero-content">
                <!-- Sindcine Logo -->
                <div class="sindcine-hero-logo">
                    <img src="<?php echo get_template_directory_uri(); ?>/image.png" alt="Sindcine" class="sindcine-logo-hero">
                </div>
                <h1 class="hero-title">
                    <span class="highlight"><?php echo get_theme_mod('seminario_hero_title_line1', '2º Seminário de'); ?></span><br>
                    <?php echo get_theme_mod('seminario_hero_title_line2', 'Saúde e Segurança'); ?><br>
                    <span class="highlight"><?php echo get_theme_mod('seminario_hero_title_line3', 'no Audiovisual'); ?></span>
                </h1>
                <p class="hero-description">
                    <?php echo get_theme_mod('seminario_hero_description', 'Serão dois dias durante os quais reuniremos especialistas em tecnologia, legislação, saúde e comportamento para discutir os seguintes temas:<br><br>• Riscos dentro de um set de filmagens<br>• Normas de segurança do audiovisual<br>• Contratação e uso de seguros<br>• Segurança em filmagens de rua<br>• Assédio e violência em filmagens<br>• Saúde física e mental'); ?>
                </p>
                <div class="hero-info">
                    <div class="info-item">
                        <i class="fas fa-calendar-alt"></i>
                        <span><?php echo get_theme_mod('seminario_event_date', '15 de Dezembro, 2025'); ?></span>
                    </div>
                    <div class="info-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <span><?php echo get_theme_mod('seminario_event_location', 'Centro de Convenções - São Paulo'); ?></span>
                    </div>
                    <div class="info-item">
                        <i class="fas fa-clock"></i>
                        <span><?php echo get_theme_mod('seminario_event_time', '8h às 18h'); ?></span>
                    </div>
                </div>
                <a href="#cadastro" class="cta-button">
                    <i class="fas fa-user-plus"></i>
                    <?php echo get_theme_mod('seminario_hero_cta', 'Cadastre-se Gratuitamente'); ?>
                </a>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="evento" class="about">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title"><?php echo get_theme_mod('seminario_about_title', 'Sobre o Evento'); ?></h2>
                <p class="section-subtitle">
                    <?php echo get_theme_mod('seminario_about_subtitle', 'Conectando profissionais para um audiovisual mais seguro e saudável'); ?>
                </p>
            </div>
            <div class="about-content">
                <div class="about-text">
                    <img src="<?php echo get_template_directory_uri(); ?>/cinemateca.jpg" alt="Cinemateca" style="width:100%;max-width:800px;height:auto;margin-bottom:2rem;border-radius:10px;box-shadow:0 4px 12px rgba(0,0,0,0.1);">
                    <p>
                        <?php echo get_theme_mod('seminario_about_text1', 'Com o objetivo de melhorar as condições de trabalho e proteger a integridade e a vida dos técnicos do audiovisual, o Sindcine promoverá o II Seminário de Saúde e Segurança em Filmagens, dias 25 e 26 de novembro, na Cinemateca Brasileira em São Paulo.'); ?>
                    </p>
                    <p>
                        <?php echo get_theme_mod('seminario_about_text2', 'Serão dois dias durante os quais reuniremos especialistas em tecnologia, legislação, saúde e comportamento para discutir os seguintes temas:'); ?>
                    </p>
                    <p>
                        • Riscos dentro de um set de filmagens<br>
                        • Normas de segurança do audiovisual<br>
                        • Contratação e uso de seguros<br>
                        • Segurança em filmagens de rua<br>
                        • Assédio e violência em filmagens<br>
                        • Saúde física e mental
                    </p>
                </div>
                <div class="stats">
                    <div class="stat-item">
                        <div class="stat-number"><?php echo get_theme_mod('seminario_about_stat1_number', '500+'); ?></div>
                        <div class="stat-label"><?php echo get_theme_mod('seminario_about_stat1_label', 'Participantes Esperados'); ?></div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number"><?php echo get_theme_mod('seminario_about_stat2_number', '15+'); ?></div>
                        <div class="stat-label"><?php echo get_theme_mod('seminario_about_stat2_label', 'Palestrantes Especialistas'); ?></div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number"><?php echo get_theme_mod('seminario_about_stat3_number', '8h'); ?></div>
                        <div class="stat-label"><?php echo get_theme_mod('seminario_about_stat3_label', 'de Conteúdo Intensivo'); ?></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Program Section -->
    <section id="programacao" class="program">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title"><?php echo get_theme_mod('seminario_program_title', 'Programação'); ?></h2>
                <p class="section-subtitle">
                    <?php echo get_theme_mod('seminario_program_subtitle', 'Agenda completa com palestras e workshops especializados'); ?>
                </p>
            </div>
            <div class="program-container">
                <!-- Dia 1 -->
                <div class="program-day">
                    <h3 class="day-title">1º Dia - 25 de Novembro de 2025</h3>
                    <div class="program-timeline">
                        <div class="timeline-item">
                            <div class="timeline-time">09:00 - 09:50</div>
                            <div class="timeline-content">
                                <h3>Credenciamento</h3>
                                <p>Recepção dos participantes</p>
                            </div>
                        </div>
                        
                        <div class="timeline-item">
                            <div class="timeline-time">09:50</div>
                            <div class="timeline-content">
                                <h3>Fala de Abertura do Seminário</h3>
                                <p><strong>Presidente do SINDCINE - Sonia Santana</strong></p>
                            </div>
                        </div>
                        
                        <div class="timeline-item highlight">
                            <div class="timeline-time">10:00</div>
                            <div class="timeline-content">
                                <h3>Mesa 1 - Conceituação de Risco/Condutas de Risco</h3>
                                <p>Nesta mesa, pretendemos conceituar o risco de uma forma geral, bem como demonstrar práticas para mitigar a exposição ao perigo. Também vamos tratar da questão da conscientização dos técnicos. Além disso, será abordada a legislação relativa à segurança do trabalhador.</p>
                                <p><strong>Mediador:</strong> Flávia Guerra</p>
                                <p><strong>Debatedores:</strong><br>
                                • Pedro Tourinho – Fundacentro (30')</p>
                            </div>
                        </div>
                        
                        <div class="timeline-item">
                            <div class="timeline-time">10:30</div>
                            <div class="timeline-content">
                                <h3>Coffee Break</h3>
                                <p>Intervalo para networking</p>
                            </div>
                        </div>
                        
                        <div class="timeline-item highlight">
                            <div class="timeline-time">11:00</div>
                            <div class="timeline-content">
                                <h3>Continuação Mesa 1</h3>
                                <p><strong>Debatedores:</strong><br>
                                • Edson Martinho e Marcelo Mutto - Abracopel (30')<br>
                                • Marcelo Vazzoler - Vertical Pro (30')<br>
                                • SPcine (30')<br>
                                • CET (30')</p>
                                <p><strong>Abertura para Perguntas (30')</strong></p>
                            </div>
                        </div>
                        
                        <div class="timeline-item">
                            <div class="timeline-time">13:00</div>
                            <div class="timeline-content">
                                <h3>Pausa Almoço</h3>
                                <p>Intervalo para refeição</p>
                            </div>
                        </div>
                        
                        <div class="timeline-item highlight">
                            <div class="timeline-time">14:30</div>
                            <div class="timeline-content">
                                <h3>Mesa 2 - Riscos Específicos e Riscos Iminentes em Sets de Filmagens</h3>
                                <p>O debate tratará dos riscos específicos na produção, jornadas excessivas, filmagens em vias públicas e locais não autorizados, utilização de equipamento de proteção individual (EPIs). Profissionais de filmagens de risco, como produções subaquáticas e pilotagem de precisão, apresentarão técnicas de segurança.</p>
                                <p><strong>Mediador:</strong> Flávia Guerra</p>
                                <p><strong>Debatedores:</strong><br>
                                • Poliana Brandão – Produtora de Locação (25')<br>
                                • Max Lima – Produtor de Locação (25')<br>
                                • Telma Fonseca - Diretora de Produção (30')<br>
                                • Arnaldo Mesquita – Diretor de Fotografia (30')<br>
                                • José Macedo de Medeiros (Jamelão) – Gaffer (30')<br>
                                • Rosiane Evangelista Matias – Elétrica (30')<br>
                                • Lucas Pupo – Especialista em Filmagens Subaquáticas (40')<br>
                                • Agnaldo Bueno – Dublê (30')<br>
                                • Walter Carrasco – Efeitos Armas/Bombeiro Especializado (30')<br>
                                • Anderson de Souza – Coordenador de Ação/Piloto de Precisão<br>
                                • Raíssa Drumond – Produtora Executiva (30')</p>
                                <p><strong>Abertura para Perguntas (30')</strong></p>
                            </div>
                        </div>
                        
                        <div class="timeline-item">
                            <div class="timeline-time">19:30</div>
                            <div class="timeline-content">
                                <h3>Encerramento</h3>
                                <p>Encerramento do primeiro dia</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Dia 2 -->
                <div class="program-day">
                    <h3 class="day-title">2º Dia - 26 de Novembro de 2025</h3>
                    <div class="program-timeline">
                        <div class="timeline-item">
                            <div class="timeline-time">09:00 - 09:50</div>
                            <div class="timeline-content">
                                <h3>Credenciamento</h3>
                                <p>Recepção dos participantes</p>
                            </div>
                        </div>
                        
                        <div class="timeline-item">
                            <div class="timeline-time">09:50</div>
                            <div class="timeline-content">
                                <h3>Fala de Abertura do Seminário</h3>
                                <p><strong>Presidente do SINDCINE - Sonia Santana</strong><br>
                                <strong>1º Secretário do SINDCINE - Claudio Leone (Diretor de Fotografia)</strong></p>
                            </div>
                        </div>
                        
                        <div class="timeline-item highlight">
                            <div class="timeline-time">10:00</div>
                            <div class="timeline-content">
                                <h3>Mesa 1 - Cultura de Segurança no Mercado</h3>
                                <p>A atitude de todos os envolvidos no processo de produção precisa levar em conta, em todos os momentos, a questão da segurança. Assim, é necessário que clientes, agências, produtoras e profissionais adotem a cultura da prevenção.</p>
                                <p><strong>Mediadores:</strong> Sonia Santana / Claudio Leone</p>
                                <p><strong>Debatedores:</strong><br>
                                • Roberto Tourinho / Patricia Alexandre - SINAPRO SP (30')<br>
                                • Paulo Dantas – Movieart (30')<br>
                                • Esli Leal - O2 Filmes (30')<br>
                                • Georgia Costa - Coração da Selva (30')<br>
                                • Pingo – Produtor Executivo (30')<br>
                                • Renata Rezende – HBO</p>
                                <p><strong>Abertura para Perguntas (30')</strong></p>
                            </div>
                        </div>
                        
                        <div class="timeline-item">
                            <div class="timeline-time">13:00</div>
                            <div class="timeline-content">
                                <h3>Pausa Almoço</h3>
                                <p>Intervalo para refeição</p>
                            </div>
                        </div>
                        
                        <div class="timeline-item highlight">
                            <div class="timeline-time">14:30</div>
                            <div class="timeline-content">
                                <h3>Mesa 2 - Responsabilidade Civil e Criminal/Contratação e Assédio e Violência</h3>
                                <p>Dano, responsabilidade subjetiva, dolo e culpa, culpa concorrente, responsabilidade objetiva, quantificação do dano, danos materiais, extensão do dano, acidente ou doença profissional, incapacidade (total e permanente, total e temporária, parcial e permanente, parcial e temporária), danos morais (conceitos jurídicos envolvidos na responsabilidade do contratante). A responsabilidade criminal no caso do acidente de trabalho. Ausência do suporte do INSS e a responsabilidade direta do empregador ou contratante.</p>
                                <p><strong>Mediador:</strong> Dr. Marcelo de Campos Mendes Pereira (Advogado SINDCINE)</p>
                                <p><strong>Debatedores:</strong><br>
                                • Gleice Aguillar - Corretora filmSeg (30')<br>
                                • Dra Raquel Lemos – Advogada Especializada em Audiovisual (30')<br>
                                • Amanda Gabriele (30')</p>
                                <p><strong>Abertura para Perguntas (30')</strong></p>
                            </div>
                        </div>
                        
                        <div class="timeline-item highlight">
                            <div class="timeline-time">16:30</div>
                            <div class="timeline-content">
                                <h3>Mesa 3 - Saúde Mental e Física</h3>
                                <p><strong>Palestrante:</strong> Izabella Camargo (1h)</p>
                                <p><strong>Abertura para Perguntas (30')</strong></p>
                            </div>
                        </div>
                        
                        <div class="timeline-item">
                            <div class="timeline-time">18:00</div>
                            <div class="timeline-content">
                                <h3>Entrega Selo Sindcine</h3>
                                <p>Cerimônia de entrega do selo</p>
                            </div>
                        </div>
                        
                        <div class="timeline-item">
                            <div class="timeline-time">18:30</div>
                            <div class="timeline-content">
                                <h3>Coquetel / Encerramento</h3>
                                <p>Confraternização e encerramento do evento</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Speakers Section -->
    <section id="palestrantes" class="speakers">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title"><?php echo get_theme_mod('seminario_speakers_title', 'Palestrantes'); ?></h2>
                <p class="section-subtitle">
                    <?php echo get_theme_mod('seminario_speakers_subtitle', 'Especialistas reconhecidos na área de saúde e segurança ocupacional'); ?>
                </p>
            </div>
            <div class="speakers-grid">
                <?php 
                // Valores padrão para 20 palestrantes
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
                
                for ($i = 1; $i <= 20; $i++): 
                    $name = get_theme_mod("seminario_speaker{$i}_name", $speakers_defaults[$i]['name']);
                    $title = get_theme_mod("seminario_speaker{$i}_title", $speakers_defaults[$i]['title']);
                    ?>
                    <div class="speaker-card">
                        <h3 class="speaker-name"><?php echo esc_html($name); ?></h3>
                        <p class="speaker-title"><?php echo esc_html($title); ?></p>
                    </div>
                <?php endfor; ?>
            </div>
        </div>
    </section>

    <!-- Supporters Section -->
    <section id="apoiadores" class="supporters">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title"><?php echo get_theme_mod('seminario_supporters_title', 'Apoiadores'); ?></h2>
                <p class="section-subtitle">
                    <?php echo get_theme_mod('seminario_supporters_subtitle', 'Conheça as instituições e organizações que apoiam nossa iniciativa'); ?>
                </p>
            </div>
            <div class="supporters-content">
                <div class="supporters-info">
                    <p>
                        <?php echo get_theme_mod('seminario_supporters_text', 'O sucesso deste seminário só é possível graças ao apoio de importantes instituições do setor audiovisual, que compartilham nossa visão de promover um ambiente de trabalho mais seguro e saudável.'); ?>
                    </p>
                </div>
                <div class="supporters-grid">
                    <?php
                    // Carregar dados dos apoiadores
                    $apoiadores_file = __DIR__ . '/data/apoiadores.json';
                    $apoiadores = [];
                    
                    if (file_exists($apoiadores_file)) {
                        $content = file_get_contents($apoiadores_file);
                        $apoiadores = json_decode($content, true) ?: [];
                    }

                    // Se não há dados salvos, usar dados padrão
                    if (empty($apoiadores)) {
                        $apoiadores = [
                            [
                                'id' => 1,
                                'nome' => 'SINDCINE-SP',
                                'descricao' => 'Sindicato dos Trabalhadores na Indústria Cinematográfica de São Paulo',
                                'categoria' => 'Sindicato',
                                'imagem' => '',
                                'icone' => 'fas fa-users',
                                'link' => ''
                            ],
                            [
                                'id' => 2,
                                'nome' => 'ABET - Associação Brasileira de Exposições e Feiras',
                                'descricao' => 'Organização que promove o desenvolvimento do setor de eventos',
                                'categoria' => 'Associação',
                                'imagem' => '',
                                'icone' => 'fas fa-handshake',
                                'link' => ''
                            ],
                            [
                                'id' => 3,
                                'nome' => 'SET - Sociedade Brasileira de Engenharia de Televisão',
                                'descricao' => 'Entidade técnico-científica para o desenvolvimento da TV brasileira',
                                'categoria' => 'Sociedade Técnica',
                                'imagem' => '',
                                'icone' => 'fas fa-broadcast-tower',
                                'link' => ''
                            ],
                            [
                                'id' => 4,
                                'nome' => 'ANCINE - Agência Nacional do Cinema',
                                'descricao' => 'Agência reguladora vinculada ao Ministério da Cultura',
                                'categoria' => 'Órgão Público',
                                'imagem' => '',
                                'icone' => 'fas fa-film',
                                'link' => ''
                            ],
                            [
                                'id' => 5,
                                'nome' => 'ABRACI - Associação Brasileira de Cinematografia',
                                'descricao' => 'Representação dos profissionais de cinematografia no Brasil',
                                'categoria' => 'Associação',
                                'imagem' => '',
                                'icone' => 'fas fa-camera',
                                'link' => ''
                            ],
                            [
                                'id' => 6,
                                'nome' => 'Ministério do Trabalho e Emprego',
                                'descricao' => 'Órgão federal responsável pelas políticas de trabalho e emprego',
                                'categoria' => 'Órgão Público',
                                'imagem' => '',
                                'icone' => 'fas fa-briefcase',
                                'link' => ''
                            ],
                            [
                                'id' => 7,
                                'nome' => 'FUNDACENTRO',
                                'descricao' => 'Fundação Jorge Duprat Figueiredo de Segurança e Medicina do Trabalho',
                                'categoria' => 'Fundação',
                                'imagem' => '',
                                'icone' => 'fas fa-shield-alt',
                                'link' => ''
                            ],
                            [
                                'id' => 8,
                                'nome' => 'SEBRAE - São Paulo',
                                'descricao' => 'Serviço Brasileiro de Apoio às Micro e Pequenas Empresas',
                                'categoria' => 'Instituição',
                                'imagem' => '',
                                'icone' => 'fas fa-chart-line',
                                'link' => ''
                            ],
                            [
                                'id' => 9,
                                'nome' => 'ABERT - Associação Brasileira de Emissoras de Rádio e Televisão',
                                'descricao' => 'Entidade representante das emissoras de rádio e TV no Brasil',
                                'categoria' => 'Associação',
                                'imagem' => '',
                                'icone' => 'fas fa-tower-broadcast',
                                'link' => ''
                            ],
                            [
                                'id' => 10,
                                'nome' => 'SINDASP - Sindicato dos Atores',
                                'descricao' => 'Sindicato dos atores de São Paulo',
                                'categoria' => 'Sindicato',
                                'imagem' => '',
                                'icone' => 'fas fa-masks-theater',
                                'link' => ''
                            ],
                            [
                                'id' => 11,
                                'nome' => 'ABPD - Associação Brasileira de Produtoras de Conteúdo',
                                'descricao' => 'Organização de produtoras de conteúdo e audiovisual',
                                'categoria' => 'Associação',
                                'imagem' => '',
                                'icone' => 'fas fa-video',
                                'link' => ''
                            ],
                            [
                                'id' => 12,
                                'nome' => 'INSS - Instituto Nacional do Seguro Social',
                                'descricao' => 'Órgão responsável pela previdência social no Brasil',
                                'categoria' => 'Órgão Público',
                                'imagem' => '',
                                'icone' => 'fas fa-hospital',
                                'link' => ''
                            ],
                            [
                                'id' => 13,
                                'nome' => 'Cinemateca Brasileira',
                                'descricao' => 'Instituição dedicada à preservação e pesquisa de cinema',
                                'categoria' => 'Instituição',
                                'imagem' => '',
                                'icone' => 'fas fa-film-roll',
                                'link' => ''
                            ],
                            [
                                'id' => 14,
                                'nome' => 'TV Cultura',
                                'descricao' => 'Emissora pública de televisão de São Paulo',
                                'categoria' => 'Organização',
                                'imagem' => '',
                                'icone' => 'fas fa-tv',
                                'link' => ''
                            ],
                            [
                                'id' => 15,
                                'nome' => 'SPCine - Agência Paulista de Cinema',
                                'descricao' => 'Agência de fomento à cinematografia do Estado de São Paulo',
                                'categoria' => 'Órgão Público',
                                'imagem' => '',
                                'icone' => 'fas fa-clapperboard',
                                'link' => ''
                            ],
                            [
                                'id' => 16,
                                'nome' => 'Prefeitura de São Paulo - Secretaria de Cultura',
                                'descricao' => 'Secretaria municipal responsável pelas políticas culturais',
                                'categoria' => 'Órgão Público',
                                'imagem' => '',
                                'icone' => 'fas fa-landmark',
                                'link' => ''
                            ]
                        ];
                    }
                    
                    foreach ($apoiadores as $apoiador) :
                    ?>
                    <div class="supporter-card">
                        <div class="supporter-logo">
                            <?php if ($apoiador['imagem']) : ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/images/<?php echo $apoiador['imagem']; ?>" class="apoiador-image">
                            <?php else : ?>
                                <i class="<?php echo $apoiador['icone']; ?>"></i>
                            <?php endif; ?>
                        </div>
                        <h3 class="supporter-name"><?php echo $apoiador['nome']; ?></h3>
                        <p class="supporter-description"><?php echo $apoiador['descricao']; ?></p>
                        <div class="supporter-category"><?php echo $apoiador['categoria']; ?></div>
                        <?php if (!empty($apoiador['link'])) : ?>
                            <a href="<?php echo esc_url($apoiador['link']); ?>" target="_blank" rel="noopener noreferrer" class="supporter-link">
                                <span class="supporter-link-icon">🌐</span>
                                Saiba Mais
                            </a>
                        <?php endif; ?>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Exhibition Section -->
    <section id="exposicao" class="exhibition">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title"><?php echo get_theme_mod('seminario_exhibition_title', 'Expositores'); ?></h2>
                <p class="section-subtitle">
                    <?php echo get_theme_mod('seminario_exhibition_subtitle', 'Conheça as empresas parceiras e suas soluções inovadoras'); ?>
                </p>
            </div>
            <div class="exhibition-content">
                <div class="exhibition-info">
                    <p>
                        <?php echo get_theme_mod('seminario_exhibition_text', 'Durante todo o evento, você poderá visitar os estandes de nossos parceiros e conhecer as mais recentes tecnologias e serviços voltados para saúde e segurança no audiovisual.'); ?>
                    </p>
                </div>
                <div class="exhibitors-grid">
                    <?php
                    // Carregar dados dos expositores
                    $expositores_file = __DIR__ . '/data/expositores.json';
                    $expositores = [];
                    
                    if (file_exists($expositores_file)) {
                        $content = file_get_contents($expositores_file);
                        $expositores = json_decode($content, true) ?: [];
                    }

                    // Calcular base URL do site para caminhos absolutos
                    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
                    $host = $_SERVER['HTTP_HOST'];
                    $scriptDir = dirname($_SERVER['SCRIPT_NAME']);
                    $base_url = rtrim($protocol . '://' . $host . $scriptDir, '/');

                    // Se não há dados salvos, usar dados padrão
                    if (empty($expositores)) {
                        $expositores = [
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
                            ],
                            [
                                'id' => 7,
                                'nome' => 'SafeSound Studios',
                                'descricao' => 'Isolamento acústico e proteção auditiva profissional',
                                'stand' => 'Estande C1',
                                'imagem' => '',
                                'icone' => 'fas fa-volume-up'
                            ],
                            [
                                'id' => 8,
                                'nome' => 'LightGuard Pro',
                                'descricao' => 'Equipamentos de iluminação segura e eficiente',
                                'stand' => 'Estande C2',
                                'imagem' => '',
                                'icone' => 'fas fa-lightbulb'
                            ],
                            [
                                'id' => 9,
                                'nome' => 'WorkFlow Security',
                                'descricao' => 'Sistemas de segurança e monitoramento para produções',
                                'stand' => 'Estande C3',
                                'imagem' => '',
                                'icone' => 'fas fa-video'
                            ],
                            [
                                'id' => 10,
                                'nome' => 'EcoMedia Solutions',
                                'descricao' => 'Soluções sustentáveis e eco-friendly para audiovisual',
                                'stand' => 'Estande D1',
                                'imagem' => '',
                                'icone' => 'fas fa-leaf'
                            ],
                            [
                                'id' => 11,
                                'nome' => 'ProHealth AV',
                                'descricao' => 'Serviços de saúde ocupacional especializados',
                                'stand' => 'Estande D2',
                                'imagem' => '',
                                'icone' => 'fas fa-user-md'
                            ],
                            [
                                'id' => 12,
                                'nome' => 'TechRescue Media',
                                'descricao' => 'Equipamentos de resgate e emergência em sets',
                                'stand' => 'Estande D3',
                                'imagem' => '',
                                'icone' => 'fas fa-ambulance'
                            ]
                        ];
                    }
                    
                    foreach ($expositores as $expositor) :
                    ?>
                    <div class="exhibitor-card">
                        <div class="exhibitor-logo">
                            <?php if ($expositor['imagem']) : ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/images/<?php echo $expositor['imagem']; ?>" class="expositor-image">
                            <?php else : ?>
                                <i class="<?php echo $expositor['icone']; ?>"></i>
                            <?php endif; ?>
                        </div>
                        <h3 class="exhibitor-name"><?php echo $expositor['nome']; ?></h3>
                        <p class="exhibitor-description"><?php echo $expositor['descricao']; ?></p>
                        <?php if (!empty($expositor['link'])) : ?>
                            <a href="<?php echo esc_url($expositor['link']); ?>" target="_blank" rel="noopener noreferrer" class="exhibitor-link">
                                <span class="exhibitor-link-icon">🌐</span>
                                Saiba Mais
                            </a>
                        <?php endif; ?>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Registration Section -->
    <section id="cadastro" class="registration">
        <div class="container">
            <div class="registration-content">
                <div class="registration-info">
                    <h2 class="section-title"><?php echo get_theme_mod('seminario_registration_title', 'Faça sua Inscrição'); ?></h2>
                    <p class="section-subtitle">
                        <?php echo get_theme_mod('seminario_registration_subtitle', 'Garanta sua vaga neste evento imperdível!'); ?><br>
                        <strong><?php echo get_theme_mod('seminario_registration_free_text', 'Inscrições totalmente gratuitas'); ?></strong>
                    </p>
                    <div class="benefits-list">
                        <div class="benefit-item">
                            <i class="fas fa-check"></i>
                            <span>Acesso a todas as palestras</span>
                        </div>
                        <div class="benefit-item">
                            <i class="fas fa-check"></i>
                            <span>Material didático gratuito</span>
                        </div>
                        <div class="benefit-item">
                            <i class="fas fa-check"></i>
                            <span>Certificado de participação</span>
                        </div>
                        <div class="benefit-item">
                            <i class="fas fa-check"></i>
                            <span>Networking com profissionais</span>
                        </div>
                        <div class="benefit-item">
                            <i class="fas fa-check"></i>
                            <span>Coffee breaks inclusos</span>
                        </div>
                    </div>
                </div>
                <div class="registration-form-container">
                    <form class="registration-form" id="registrationForm">
                        <?php wp_nonce_field('seminario_nonce', 'seminario_nonce'); ?>
                        <div class="form-group">
                            <label for="nome">Nome Completo *</label>
                            <input type="text" id="nome" name="nome" required>
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail *</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="telefone">Telefone *</label>
                            <input type="tel" id="telefone" name="telefone" required>
                        </div>
                        <div class="form-group">
                            <label for="empresa">Empresa/Instituição</label>
                            <input type="text" id="empresa" name="empresa">
                        </div>
                        <div class="form-group">
                            <label for="cargo">Cargo/Função</label>
                            <input type="text" id="cargo" name="cargo">
                        </div>
                        <div class="form-group">
                            <label for="experiencia">Área de Experiência *</label>
                            <select id="experiencia" name="experiencia" required>
                                <option value="">Selecione...</option>
                                <option value="producao">Produção Audiovisual</option>
                                <option value="tecnica">Área Técnica</option>
                                <option value="seguranca">Segurança do Trabalho</option>
                                <option value="saude">Saúde Ocupacional</option>
                                <option value="gestao">Gestão/Administração</option>
                                <option value="estudante">Estudante</option>
                                <option value="outros">Outros</option>
                            </select>
                        </div>
                        
                        <div class="form-group palestras-group">
                            <label class="palestras-label">Palestras de Interesse (selecione uma ou mais) *</label>

                            <!-- Hidden field to store comma-separated values for submission -->
                            <input type="hidden" id="palestras-hidden" name="palestras" value="">

                            <!-- Dropdown Toggle Button -->
                            <button type="button" class="palestras-dropdown-toggle" id="palestrasDropdownToggle">
                                <span class="dropdown-text">Selecione as palestras...</span>
                                <span class="dropdown-count" id="palestrasCount"></span>
                                <i class="fas fa-chevron-down"></i>
                            </button>

                            <!-- Collapsible Checkboxes Panel -->
                            <div class="palestras-dropdown-panel" id="palestrasDropdownPanel" style="display: none;">
                                <div class="palestras-options">
                                    <label class="palestra-checkbox-item">
                                        <input type="checkbox" class="palestra-checkbox" value="mesa1_dia1">
                                        <span class="palestra-option-text">
                                            <strong>Mesa 1 - 25/11 (10h)</strong>
                                            <span class="palestra-title">Conceituação de Risco/Condutas de Risco</span>
                                        </span>
                                    </label>

                                    <label class="palestra-checkbox-item">
                                        <input type="checkbox" class="palestra-checkbox" value="mesa2_dia1">
                                        <span class="palestra-option-text">
                                            <strong>Mesa 2 - 25/11 (14h30)</strong>
                                            <span class="palestra-title">Riscos Específicos e Riscos Iminentes em Sets</span>
                                        </span>
                                    </label>

                                    <label class="palestra-checkbox-item">
                                        <input type="checkbox" class="palestra-checkbox" value="mesa1_dia2">
                                        <span class="palestra-option-text">
                                            <strong>Mesa 1 - 26/11 (10h)</strong>
                                            <span class="palestra-title">Cultura de Segurança no Mercado</span>
                                        </span>
                                    </label>

                                    <label class="palestra-checkbox-item">
                                        <input type="checkbox" class="palestra-checkbox" value="mesa2_dia2">
                                        <span class="palestra-option-text">
                                            <strong>Mesa 2 - 26/11 (14h30)</strong>
                                            <span class="palestra-title">Responsabilidade Civil e Criminal/Contratação e Assédio</span>
                                        </span>
                                    </label>

                                    <label class="palestra-checkbox-item">
                                        <input type="checkbox" class="palestra-checkbox" value="mesa3_dia2">
                                        <span class="palestra-option-text">
                                            <strong>Mesa 3 - 26/11 (16h30)</strong>
                                            <span class="palestra-title">Saúde Mental e Física</span>
                                        </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group checkbox-group">
                            <label class="checkbox-label">
                                <input type="checkbox" id="newsletter" name="newsletter">
                                <span class="checkmark"></span>
                                Quero receber informações sobre futuros eventos
                            </label>
                        </div>
                        <div class="form-group checkbox-group">
                            <label class="checkbox-label">
                                <input type="checkbox" id="termos" name="termos" required>
                                <span class="checkmark"></span>
                                Concordo com os <a href="#" class="terms-link" id="openTermsModal">termos de uso</a> e política de privacidade *
                            </label>
                        </div>
                        <button type="submit" class="submit-button">
                            Confirmar Cadastro
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Terms Modal -->
    <div id="termsModal" class="terms-modal-overlay" style="display: none;">
        <div class="terms-modal">
            <div class="terms-modal-header">
                <h2>Termo de Uso e Política de Privacidade</h2>
                <button class="terms-modal-close" id="closeTermsModal">
                    ×
                </button>
            </div>
            <div class="terms-modal-content">
                <h3>TERMO DE USO E POLÍTICA DE PRIVACIDADE PARA O 2º SEMINÁRIO DE SAÚDE E SEGURANÇA NO AUDIOVISUAL</h3>
                
                <p>Declaro que fui devidamente informado(a) sobre o evento, organizado pelo Sindcine, que ocorrerá nos dias <strong>25 e 26 de novembro de 2025</strong>, na <strong>Cinemateca Brasileira, Largo Senador Raul Cardoso, 207, São Paulo (SP)</strong>.</p>
                
                <p>Declaro estar ciente e concordar com os seguintes termos:</p>
                
                <h4>1. Aceitação:</h4>
                <p>Li e concordo plenamente com todas as regras, horários e regulamentos estabelecidos para o evento, conforme divulgados no site do Seminário (<a href="http://seminario.sindcine.org.br" target="_blank">http://seminario.sindcine.org.br</a>).</p>
                
                <h4>2. Informações:</h4>
                <p>As informações fornecidas no formulário de inscrição estão corretas e completas.</p>
                
                <h4>3. Conduta:</h4>
                <p>Comprometo-me a seguir as normas de conduta e comportamento durante a participação no evento, mantendo a integridade e o respeito aos demais participantes e organizadores.</p>
                
                <h4>4. Uso de Imagem:</h4>
                <p>Autorizo a utilização da minha imagem, nome e depoimentos em fotos, vídeos e gravações realizadas durante o evento, exclusivamente para fins de divulgação e documentação do evento, em meios de comunicação como internet, rádio e TV, sem que isso gere direito a indenização.</p>
                
                <h4>5. Responsabilidade:</h4>
                <p>Estou ciente de que o organizador Sindcine é o único responsável pela realização do evento e que não será responsabilizado por atrasos, cancelamentos ou outras alterações imprevistas, conforme programa publicado no site do Seminário.</p>
                
                <h4>6. Dados:</h4>
                <p>Autorizo o uso dos meus dados cadastrais para comunicação e envio de informações relacionadas ao evento e a outros eventos futuros do Sindcine, bem como informações dos patrocinadores e expositores do evento. O Sindcine compromete-se a não compartilhar meus dados. Poderei a qualquer momento revogar a autorização para envio de informações.</p>
                
                <p class="terms-date"><em>São Paulo, 15 de outubro de 2025</em></p>
            </div>
            <div class="terms-modal-footer">
                <button class="terms-accept-btn" id="acceptTermsBtn">
                    Li e Concordo
                </button>
            </div>
        </div>
    </div>

    <!-- How to Get There Section -->
    <section id="como-chegar" class="how-to-get-there">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title"><?php echo get_theme_mod('seminario_location_title', 'Como Chegar'); ?></h2>
                <p class="section-subtitle">
                    <?php echo get_theme_mod('seminario_location_subtitle', 'Todas as informações para sua chegada ao evento'); ?>
                </p>
            </div>
            <div class="location-content">
                <div class="location-info">
                    <div class="address-card">
                        <div class="address-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="address-details">
                            <h3>Local do Evento</h3>
                            <p class="venue-name"><?php echo get_theme_mod('seminario_location_venue_name', get_theme_mod('seminario_event_location', 'Centro de Convenções - São Paulo')); ?></p>
                            <p class="full-address">
                                <?php echo nl2br(get_theme_mod('seminario_location_address', 'Rua das Convenções, 1000\n Vila Olímpia - São Paulo/SP \n CEP: 04551-000')); ?>
                            </p>
                        </div>
                    </div>
                    
                    <div class="transport-options">
                        <h3>Opções de Transporte</h3>
                        <div class="transport-grid">
                            <div class="transport-item">
                                <i class="fas fa-subway"></i>
                                <div>
                                    <h4>Metrô</h4>
                                    <p>As estações mais próximas são Hospital São Paulo (Linha 5 Lilás) e a Vila Mariana (Linha 1 Azul)</p>
                                </div>
                            </div>
                            <div class="transport-item">
                                <i class="fas fa-bus"></i>
                                <div>
                                    <h4>Ônibus</h4>
                                    <p>475R-10 - Term. Pq. D. Pedro II / Jd. São Savério<br>
                                    476G-10 – Ibirapuera/ Jd. Elba<br>
                                    5106-10 - Jd. Selma / Lgo. São Francisco</p>
                                </div>
                            </div>
                            <div class="transport-item">
                                <i class="fas fa-car"></i>
                                <div>
                                    <h4>Estacionamento</h4>
                                    <p>A Cinemateca não possui estacionamento para o público, mas a região conta com muitas vagas disponíveis.</p>
                                </div>
                            </div>
                            <div class="transport-item">
                                <i class="fas fa-bicycle"></i>
                                <div>
                                    <h4>Bicicleta</h4>
                                    <p>A região conta com ciclo faixas e rotas de bicicletas. A Cinemateca possui bicicletário.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="map-container">
                    <?php 
                    $custom_map_image = get_theme_mod('seminario_location_map_image', '');
                    $default_map_image = get_template_directory_uri() . '/Loc.png';
                    
                    if (!empty($custom_map_image)) {
                        // Se houver imagem personalizada via Customizer
                        $map_image = $custom_map_image;
                        $map_alt = get_theme_mod('seminario_location_map_alt', 'Localização do evento');
                    } else {
                        // Usar loc.png como imagem padrão
                        $map_image = $default_map_image;
                        $map_alt = 'Localização do ' . get_theme_mod('seminario_event_location', 'evento');
                    }
                    ?>
                    <div class="static-map">
                        <img src="<?php echo esc_url($map_image); ?>" 
                             alt="<?php echo esc_attr($map_alt); ?>" 
                             class="map-image">
                    </div>
                    <div class="map-actions">
                        <a href="https://maps.google.com/?q=<?php echo urlencode(get_theme_mod('seminario_event_location', 'Centro de Convenções - São Paulo')); ?>" 
                           target="_blank" class="map-link">
                            <i class="fas fa-external-link-alt"></i>
                            Ver no Google Maps
                        </a>
                        <a href="https://www.waze.com/ul?q=<?php echo urlencode(get_theme_mod('seminario_event_location', 'Centro de Convenções - São Paulo')); ?>" 
                           target="_blank" class="map-link">
                            <i class="fab fa-waze"></i>
                            Abrir no Waze
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="arrival-tips">
                <h3>Dicas Importantes</h3>
                <div class="tips-grid">
                    <div class="tip-item">
                        <i class="fas fa-clock"></i>
                        <div>
                            <h4>Chegue Cedo</h4>
                            <p>Recomendamos chegar 30 minutos antes para o credenciamento</p>
                        </div>
                    </div>
                    <div class="tip-item">
                        <i class="fas fa-id-card"></i>
                        <div>
                            <h4>Documento Obrigatório</h4>
                            <p>Traga um documento com foto para confirmar sua inscrição</p>
                        </div>
                    </div>
                    <div class="tip-item">
                        <i class="fas fa-wifi"></i>
                        <div>
                            <h4>Wi-Fi Gratuito</h4>
                            <p>Rede "SeminarioAV-Guest" disponível em todo o local</p>
                        </div>
                    </div>
                    <div class="tip-item">
                        <i class="fas fa-coffee"></i>
                        <div>
                            <h4>Coffee Break</h4>
                            <p>Será servido gratuitamente em todos os intervalos</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Sindcine Section -->
    <section id="sobre-sindcine" class="about-sindcine">
        <div class="container">
            <div class="section-header">
                <div class="sindcine-logo-container">
                    <img src="<?php echo get_template_directory_uri(); ?>/logo_sindicine.png" alt="Logo Sindcine" class="sindcine-logo">
                </div>
                <h2 class="section-title">Sobre o Sindcine</h2>
            </div>
            <div class="sindcine-content">
                <div class="sindcine-info">
                    <div class="sindcine-text">
                        <p>
                            Com 39 anos de atividade ininterrupta desde 1986, o Sindcine é a entidade que organiza e protege os direitos dos trabalhadores do cinema e audiovisual dos Estados de São Paulo, Rio Grande do Sul, Mato Grosso, Mato Grosso do Sul, Goiás, Tocantins e Distrito Federal. O Sindcine se empenha na regularização da situação profissional dos técnicos do setor de cinema e audiovisual e também da sua preparação técnica, de forma a elevar a qualidade das produções e reduzir os riscos de acidentes de trabalho. Os associados do Sindcine são tanto profissionais contratados (CLT) como autônomos (freelancers), e contam com assessoria jurídica, previdenciária entre outros benefícios.
                        </p>
                        <p>
                            Uma das principais lutas do Sindcine é pela implementação de práticas seguras nas produções audiovisuais, com o objetivo de preservar a integridade física e mental dos trabalhadores. Não se trata apenas de prevenir acidentes e utilizar equipamentos de proteção, mas principalmente criar uma cultura de segurança durante todo a produção, inclusive fora dos sets de filmagem. Também evitar situações de exaustão, que podem debilitar o profissional, encurtar sua carreira e levar a doenças precoces. Nossa meta é que a profissão de técnico do audiovisual ofereça qualidade de vida, saúde e segurança.
                        </p>
                    </div>
                </div>
                
                <div class="sindcine-links">
                    <h3>Para saber mais sobre o Sindcine e tornar-se um filiado, acesse nossas site e redes sociais:</h3>
                    <div class="social-links">
                        <a href="http://www.sindcine.com.br" target="_blank" rel="noopener noreferrer" class="social-link">
                            <span>Nosso Site</span>
                        </a>
                        <a href="https://www.instagram.com/sindcine" target="_blank" rel="noopener noreferrer" class="social-link">
                            <span>Instagram</span>
                        </a>
                        <a href="https://www.facebook.com/Sindcine" target="_blank" rel="noopener noreferrer" class="social-link">
                            <span>Facebook</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>