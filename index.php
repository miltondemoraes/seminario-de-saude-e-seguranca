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
                    
                    <div class="program-header">
                        <p><strong>Apresentação:</strong> Flávia Guerra – jorn. esp. audiovisual</p>
                        <p><strong>Mediação:</strong> Sonia Santana – Presidente do Sindcine | Claudio Leone – 1º Secretário do Sindcine</p>
                    </div>
                    
                    <div class="program-timeline">
                        <div class="timeline-item">
                            <div class="timeline-time">09:00 – 09:50</div>
                            <div class="timeline-content">
                                <h3>Credenciamento</h3>
                            </div>
                        </div>
                        
                        <div class="timeline-item">
                            <div class="timeline-time">09:50</div>
                            <div class="timeline-content">
                                <h3>Abertura do Seminário</h3>
                                <p><strong>Presidente do Sindcine – Sonia Santana</strong></p>
                            </div>
                        </div>
                        
                        <div class="timeline-item highlight">
                            <div class="timeline-time">10:00</div>
                            <div class="timeline-content">
                                <h3>Mesa 1 – Conceituação de Risco / Condutas de Risco</h3>
                                <p>Conceituação de risco; práticas para mitigar riscos; conscientização dos técnicos; legislação relativa à segurança dos trabalhadores</p>
                                <p><strong>Debatedores:</strong></p>
                                <ul>
                                    <li>Domingos Lino – Fundacentro</li>
                                    <li>Edson Martinho – Abracopel</li>
                                    <li>Marcelo Mutto – Abracopel</li>
                                    <li>Marcelo Vazzoler – Vertical Pro</li>
                                    <li>Bruno Gomes Moreira – SPcine</li>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="timeline-item">
                            <div class="timeline-time">10:30</div>
                            <div class="timeline-content">
                                <h3>Coffee Break</h3>
                            </div>
                        </div>
                        
                        <div class="timeline-item highlight">
                            <div class="timeline-time">11:00</div>
                            <div class="timeline-content">
                                <h3>Continuação Mesa 1</h3>
                            </div>
                        </div>
                        
                        <div class="timeline-item">
                            <div class="timeline-time">13:00</div>
                            <div class="timeline-content">
                                <h3>Almoço</h3>
                            </div>
                        </div>
                        
                        <div class="timeline-item highlight">
                            <div class="timeline-time">14:30</div>
                            <div class="timeline-content">
                                <h3>Mesa 2 – Riscos Específicos e Riscos Iminentes em Sets de Filmagens</h3>
                                <p>Riscos específicos na produção, jornadas excessivas, filmagens em vias públicas, equipamentos de proteção individual (EPIs); filmagens de risco, como subaquáticas e pilotagem de precisão</p>
                                <p><strong>Debatedores:</strong></p>
                                <ul>
                                    <li>Poliana Brandão – Produtora de Locação</li>
                                    <li>Max Lima – Produtor de Locação</li>
                                    <li>Telma Fonseca – Diretora de Produção</li>
                                    <li>Arnaldo Mesquita – Diretor de Fotografia</li>
                                    <li>Jamelão – Gaffer</li>
                                    <li>Rosiane Evangelista Matias – Elétrica</li>
                                    <li>Lucas Pupo – Especialista em Filmagens Subaquáticas</li>
                                    <li>Agnaldo Bueno – Dublê</li>
                                    <li>Walter Carrasco – Efeitos Armas / Bombeiro Especializado</li>
                                    <li>Anderson de Souza – Coordenador de Ação / Piloto de Precisão</li>
                                    <li>Raíssa Drumond – Produtora Executiva</li>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="timeline-item">
                            <div class="timeline-time">19:30</div>
                            <div class="timeline-content">
                                <h3>Encerramento Dia 1</h3>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Dia 2 -->
                <div class="program-day">
                    <h3 class="day-title">2º Dia - 26 de Novembro de 2025</h3>
                    
                    <div class="program-header">
                        <p><strong>Apresentação:</strong> Flávia Guerra – jorn. esp. audiovisual</p>
                        <p><strong>Mediação:</strong> Sonia Santana – Presidente do Sindcine | Claudio Leone – 1º Secretário do Sindcine</p>
                    </div>
                    
                    <div class="program-timeline">
                        <div class="timeline-item">
                            <div class="timeline-time">09:00 – 09:50</div>
                            <div class="timeline-content">
                                <h3>Credenciamento</h3>
                            </div>
                        </div>
                        
                        <div class="timeline-item">
                            <div class="timeline-time">09:50</div>
                            <div class="timeline-content">
                                <h3>Abertura do segundo dia do Seminário</h3>
                            </div>
                        </div>
                        
                        <div class="timeline-item highlight">
                            <div class="timeline-time">10:00</div>
                            <div class="timeline-content">
                                <h3>Mesa 1 – Cultura de Segurança no Mercado</h3>
                                <p>A segurança deve ser levada em conta em todos os momentos da produção e por todos os participantes: clientes, agências, produtoras e profissionais</p>
                                <p><strong>Debatedores:</strong></p>
                                <ul>
                                    <li>Roberto Tourinho – Sinapro SP</li>
                                    <li>Patricia Alexandre – Sinapro SP</li>
                                    <li>Paulo Dantas – Movie&Arte</li>
                                    <li>Esli Leal – O2 Filmes</li>
                                    <li>Georgia Costa – Coração da Selva</li>
                                    <li>Wellington Pingo – Produtor Executivo</li>
                                    <li>Guilherme Sabato – Safecine</li>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="timeline-item">
                            <div class="timeline-time">13:00</div>
                            <div class="timeline-content">
                                <h3>Almoço</h3>
                            </div>
                        </div>
                        
                        <div class="timeline-item highlight">
                            <div class="timeline-time">14:30</div>
                            <div class="timeline-content">
                                <h3>Mesa 2 – Responsabilidade Civil e Criminal/Contratação e Assédio e Violência</h3>
                                <p>Dano, responsabilidade subjetiva, dolo e culpa; responsabilidade criminal em acidentes de trabalho</p>
                                <p><strong>Mediação:</strong> Dr. Marcelo de Campos Mendes Pereira – Advogado do Sindcine</p>
                                <p><strong>Debatedores:</strong></p>
                                <ul>
                                    <li>Gleice Aguillar – Corretora filmSEG</li>
                                    <li>Dra Raquel Lemos – Advogada especializada em audiovisual</li>
                                    <li>Alexandre Borghi – Psicólogo</li>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="timeline-item">
                            <div class="timeline-time">16:00</div>
                            <div class="timeline-content">
                                <h3>Coffee Break</h3>
                            </div>
                        </div>
                        
                        <div class="timeline-item highlight">
                            <div class="timeline-time">16:30</div>
                            <div class="timeline-content">
                                <h3>Mesa 3 – Saúde Mental e Física</h3>
                                <p><strong>Palestrante:</strong></p>
                                <ul>
                                    <li>Izabella Camargo – jornalista; idealizadora do movimento pela produtividade sustentável e do manifesto em prol da saúde mental; autora do best-seller Dá Um Tempo</li>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="timeline-item">
                            <div class="timeline-time">18:00</div>
                            <div class="timeline-content">
                                <h3>Entrega do Selo Sindcine</h3>
                                <p>Cerimônia de entrega do "Selo Sindcine de Conformidade" para produções que atendem, com excelência, as cláusulas da Convenção Coletiva de Trabalho (CCT)</p>
                            </div>
                        </div>
                        
                        <div class="timeline-item">
                            <div class="timeline-time">18:30</div>
                            <div class="timeline-content">
                                <h3>Coquetel de encerramento do Seminário</h3>
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
                // Valores padrão para 32 palestrantes
                $speakers_defaults = array(
                    1 => array('name' => 'Agnaldo Bueno', 'title' => 'Dublê e coordenador de ação; mais de 500 projetos em 30 anos de atividade; especialista em cenas de ação (acidentes, quedas, fogo, lutas); trabalhou em Carandiru, Cangaço Novo, Cidade de Deus e dezenas de outros'),
                    2 => array('name' => 'Marcelo Vazzoller', 'title' => 'Diretor da Vertical Pro Treinamentos e Serviços em Altura; Técnico em Segurança do Trabalho; alpinista; especialista em resgate em altura; organizador de cursos de resgate em montanha e em espaços confinados'),
                    3 => array('name' => 'Edson Martinho', 'title' => 'Presidente da Abracopel – Ass. Bras. de Conscientização para os Perigos da Eletricidade; Engenheiro Eletricista e de Segurança do Trabalho; Coordenador da Norma de Segurança com Eletricidade ABNT NBR 16384'),
                    4 => array('name' => 'Geórgia Costa Araújo', 'title' => 'Diretora da Coração da Selva; reconhecida por introduzir inovação e tecnologia em seus projetos; produziu "Beleza Fatal", novela da Max; fundou o CineHub e faz parte do conselho da BRAVI'),
                    5 => array('name' => 'Valter Carrasco Junior', 'title' => 'Começou no cinema em 1990 com efeitos especiais e dublê; foi Corpo de Bombeiros de São Paulo (1988–2016); efeitos com fogo, altura, chuva, explosões e outros; sócio da Carrasco FX Team'),
                    6 => array('name' => 'Anderson de Souza', 'title' => 'Dublê e Precision-driver desde 1996; coordenador de ação da equipe Dublês Brasil desde 1999; cenas com carros, perseguições, colisões, capotagens e 2 rodas; instrutor de direção defensiva e evasiva'),
                    7 => array('name' => 'Gleice Kelly Aguilar', 'title' => 'Consultora de riscos e corretora de seguros especializada no audiovisual há mais de 15 anos; à frente da filmSEG; atua em estruturação de seguros e estratégias de prevenção para produções'),
                    8 => array('name' => 'Izabella Camargo', 'title' => 'Repórter e apresentadora das TVs Globo, Band e SBT; idealizadora do movimento pela produtividade sustentável e manifesto em prol da saúde mental; autora de best-seller \'Dá Um Tempo\'; top voice do LinkedIn'),
                    9 => array('name' => 'Lucas Puppo', 'title' => 'Fotógrafo, cinematógrafo, produtor e mergulhador; portfólio de centenas de projetos; dona da LiquidoPhoto Underwater; planeja e executa filmagens na água'),
                    10 => array('name' => 'Max Lima', 'title' => 'Produtor de locações especializado em organizar e coordenar estruturas de produção; experiência em longas, séries e publicidade; atua desde o planejamento logístico até a execução'),
                    11 => array('name' => 'Polyana Brandão', 'title' => 'Profissional do audiovisual desde 2005; fundadora da A Cores Locações em 2013; atua em conteúdo e locações para longas e séries de grandes plataformas'),
                    12 => array('name' => 'Raquel Lemos', 'title' => 'Advogada e consultora em propriedade intelectual e entretenimento; atua em governança cultural, gestão de pessoas, desenvolvimento de projetos audiovisuais e estruturação jurídica'),
                    13 => array('name' => 'Telma Fonseca', 'title' => 'Diretora de produção; iniciou na Terracota Produções; passou a atuar na Academia de Filmes; mais de 28 anos de experiência em produção e realização audiovisual'),
                    14 => array('name' => 'Bruno Gomes', 'title' => 'Formado em Cinema pela FAAP; experiência com produções independentes e publicidade; atua há cinco anos na Spcine e na São Paulo Film Commission'),
                    15 => array('name' => 'Rósiani Evangelista', 'title' => 'Eletricista formada pelo Senai; estudou Iluminação e Câmera pelo Senac; atuou na TV Diário (Globo); atualmente trabalha em publicidade como eletricista'),
                    16 => array('name' => 'Paulo Dantas', 'title' => 'Produtor e coprodutor de longas como "Sonho Sem Fim", "Nunca Fomos Tão Felizes", "Terra Estrangeira", "Noel, O Poeta da Vila", "Última Parada 174" e outros; sócio das produtoras LANDIA, Fauna, Immigrant e Soma'),
                    17 => array('name' => 'Segurança Elétrica', 'title' => 'Especialidade mencionada'),
                    18 => array('name' => 'Epidemiologia Ocupacional', 'title' => 'Especialidade mencionada'),
                    19 => array('name' => 'Acústica e Ruído', 'title' => 'Especialidade mencionada'),
                    20 => array('name' => 'Oftalmologia Ocupacional', 'title' => 'Especialidade mencionada'),
                    21 => array('name' => 'Dr. Ricardo Santos', 'title' => 'Médico do Trabalho especializado em saúde ocupacional no audiovisual'),
                    22 => array('name' => 'Dra. Marina Costa', 'title' => 'Psicóloga especialista em síndrome de burnout e estresse ocupacional'),
                    23 => array('name' => 'Eng. Felipe Rocha', 'title' => 'Engenheiro de Segurança especializado em estruturas temporárias para sets'),
                    24 => array('name' => 'Dra. Carla Mendes', 'title' => 'Fisioterapeuta do Trabalho com foco em lesões por movimentos repetitivos'),
                    25 => array('name' => 'Prof. André Silva', 'title' => 'Professor especialista em ergonomia aplicada ao audiovisual'),
                    26 => array('name' => 'Dra. Beatriz Lima', 'title' => 'Dermatologista ocupacional especializada em exposição solar em sets externos'),
                    27 => array('name' => 'Eng. Carlos Pereira', 'title' => 'Especialista em segurança contra incêndio em estúdios e sets'),
                    28 => array('name' => 'Dra. Juliana Alves', 'title' => 'Nutricionista ocupacional focada em alimentação em longas jornadas'),
                    29 => array('name' => 'Prof. Roberto Dias', 'title' => 'Especialista em treinamentos de segurança para equipes técnicas'),
                    30 => array('name' => 'Dra. Patricia Nunes', 'title' => 'Oftalmologista especializada em fadiga visual e iluminação artificial'),
                    31 => array('name' => 'Eng. Lucas Barros', 'title' => 'Engenheiro especialista em segurança de equipamentos de filmagem'),
                    32 => array('name' => 'Dra. Fernanda Cruz', 'title' => 'Pneumologista ocupacional focada em exposição a fumaças e efeitos especiais')
                );
                
                for ($i = 1; $i <= 32; $i++): 
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
                            <label for="empresa">Empresa / Instituição *</label>
                            <input type="text" id="empresa" name="empresa" required>
                        </div>
                        <div class="form-group">
                            <label for="cargo">Cargo *</label>
                            <input type="text" id="cargo" name="cargo" required>
                        </div>
                        <div class="form-group">
                            <label for="areaAtuacao">Área de Atuação *</label>
                            <select id="areaAtuacao" name="areaAtuacao" required>
                                <option value="">Selecione...</option>
                                <option value="audiovisual">Audiovisual</option>
                                <option value="seguranca_trabalho">Segurança do Trabalho</option>
                                <option value="saude_ocupacional">Saúde Ocupacional</option>
                                <option value="gestao_administracao">Gestão / Administração</option>
                                <option value="estudante">Estudante</option>
                                <option value="outro">Outro</option>
                            </select>
                        </div>
                        <div class="form-group" id="outro_atuacao_group" style="display: none;">
                            <label for="outroAtuacao">Qual é sua área de atuação?</label>
                            <input type="text" id="outroAtuacao" name="outroAtuacao" placeholder="Especifique sua área">
                        </div>

                        <!-- Campos para Profissionais Audiovisual (aparecem apenas se Audiovisual selecionado) -->
                        <div id="audiovisual_section" style="display: none;">
                            <div class="form-group">
                                <label>Tem DRT? *</label>
                                <div class="radio-group">
                                    <label class="radio-label">
                                        <input type="radio" name="temDRT" value="sim">
                                        <span class="radio-checkmark"></span>
                                        Sim
                                    </label>
                                    <label class="radio-label">
                                        <input type="radio" name="temDRT" value="nao">
                                        <span class="radio-checkmark"></span>
                                        Não
                                    </label>
                                </div>
                            </div>

                            <div class="form-group" id="drt_numero_group" style="display: none;">
                                <label for="drt_numero">Número do DRT</label>
                                <input type="text" id="drt_numero" name="drt_numero" placeholder="Ex: 12345/SP">
                            </div>

                            <div class="form-group">
                                <label for="funcao_audiovisual">Qual sua função no audiovisual? *</label>
                                <select id="funcao_audiovisual" name="funcao_audiovisual">
                                    <option value="">Selecione...</option>
                                    <option value="assistencia_set">Assistência de Set</option>
                                    <option value="assistencia_arte">Assistência de Arte</option>
                                    <option value="assistencia_camera">Assistência de Câmera</option>
                                    <option value="assistencia_direcao">Assistência de Direção</option>
                                    <option value="assistencia_eletrica">Assistência de Elétrica</option>
                                    <option value="assistencia_figurino">Assistência de Figurino</option>
                                    <option value="assistencia_producao">Assistência de Produção</option>
                                    <option value="camera">Câmera</option>
                                    <option value="contrarregra">Contrarregra</option>
                                    <option value="direcao">Direção</option>
                                    <option value="direcao_arte">Direção de Arte</option>
                                    <option value="direcao_elenco">Direção de Elenco</option>
                                    <option value="direcao_fotografia">Direção de Fotografia</option>
                                    <option value="direcao_producao">Direção de Produção</option>
                                    <option value="dit">DIT</option>
                                    <option value="efeitos_especiais">Efeitos Especiais</option>
                                    <option value="eletrica">Elétrica</option>
                                    <option value="figurino">Figurino</option>
                                    <option value="gma">GMA</option>
                                    <option value="making_of">Making-of</option>
                                    <option value="maquiagem">Maquiagem</option>
                                    <option value="maquinaria">Maquinária</option>
                                    <option value="montagem">Montagem</option>
                                    <option value="pos_producao">Pós-produção</option>
                                    <option value="producao">Produção</option>
                                    <option value="producao_arte">Produção de Arte</option>
                                    <option value="producao_executiva">Produção Executiva</option>
                                    <option value="producao_objetos">Produção de Objetos</option>
                                    <option value="roteiro">Roteiro</option>
                                    <option value="still">Still</option>
                                    <option value="som">Som</option>
                                    <option value="vfx">VFX</option>
                                    <option value="outro_audiovisual">Outro</option>
                                </select>
                            </div>

                            <div class="form-group" id="outro_funcao_group" style="display: none;">
                                <label for="outra_funcao">Qual é sua função?</label>
                                <input type="text" id="outra_funcao" name="outra_funcao" placeholder="Especifique sua função">
                            </div>
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

                                    <label class="palestra-checkbox-item">
                                        <input type="checkbox" class="palestra-checkbox" value="selo_dia2">
                                        <span class="palestra-option-text">
                                            <strong>Entrega do Selo - 26/11 (18h00)</strong>
                                            <span class="palestra-title">Entrega do Selo Sindcine de Conformidade</span>
                                        </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group checkbox-group">
                            <label class="checkbox-inline-label">
                                <input type="checkbox" id="newsletter" name="newsletter">
                                <span class="checkbox-inline-mark"></span>
                                Quero receber informações sobre futuros eventos
                            </label>
                        </div>
                        <div class="form-group checkbox-group">
                            <label class="checkbox-inline-label">
                                <input type="checkbox" id="termos" name="termos" required>
                                <span class="checkbox-inline-mark"></span>
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
        </div>
    </section>

    <!-- Pop-up SINDCINE -->
    <div id="seloPopup" class="selo-popup">
        <div class="selo-popup-content">
            <button class="selo-popup-close" onclick="fecharSeloPopup()">✕</button>
            <div class="selo-popup-body">
                <div class="selo-popup-icon">🏆</div>
                <h3 class="selo-popup-title">Certificação SINDCINE</h3>
                <p class="selo-popup-text">Conheça as normas de conformidade e segurança</p>
                <a href="./selo-sindcine.html" class="selo-popup-btn">
                    Saiba Mais →
                </a>
            </div>
        </div>
    </div>

    <style>
        .selo-popup {
            position: fixed;
            top: 20px;
            right: 20px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 15px 50px rgba(0, 0, 0, 0.2);
            max-width: 350px;
            width: 90%;
            padding: 1.5rem;
            z-index: 9998;
            animation: slideInRight 0.5s ease-out;
            border: 2px solid var(--primary-yellow);
        }

        .selo-popup-close {
            position: absolute;
            top: 10px;
            right: 10px;
            background: none;
            border: none;
            font-size: 1.5rem;
            color: #999;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .selo-popup-close:hover {
            color: var(--primary-black);
        }

        .selo-popup-body {
            text-align: center;
        }

        .selo-popup-icon {
            font-size: 3rem;
            color: var(--primary-yellow);
            margin-bottom: 1rem;
        }

        .selo-popup-title {
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--primary-black);
            margin-bottom: 0.5rem;
        }

        .selo-popup-text {
            color: #666;
            margin-bottom: 1.5rem;
            font-size: 0.95rem;
        }

        .selo-popup-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: var(--gradient-yellow);
            color: var(--primary-black);
            padding: 0.8rem 1.5rem;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .selo-popup-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(255, 215, 0, 0.3);
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(400px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideOutRight {
            from {
                opacity: 1;
                transform: translateX(0);
            }
            to {
                opacity: 0;
                transform: translateX(400px);
            }
        }

        @media (max-width: 480px) {
            .selo-popup {
                top: 10px;
                right: 10px;
                left: 10px;
                max-width: none;
            }
        }
    </style>

    <script>
        // Pop-up SINDCINE - desaparece em 10 segundos
        document.addEventListener('DOMContentLoaded', function() {
            const popup = document.getElementById('seloPopup');
            let popupTimeout;

            function fecharSeloPopupAuto() {
                if (popup) {
                    popup.style.animation = 'slideOutRight 0.5s ease-out forwards';
                    setTimeout(function() {
                        popup.style.display = 'none';
                    }, 500);
                }
            }

            // Fechar automaticamente após 10 segundos
            popupTimeout = setTimeout(fecharSeloPopupAuto, 10000);

            // Limpar timeout se o usuário fechar manualmente
            window.fecharSeloPopup = function() {
                clearTimeout(popupTimeout);
                fecharSeloPopupAuto();
            };

            // Limpar timeout se o usuário clicar no botão
            const botao = document.querySelector('.selo-popup-btn');
            if (botao) {
                botao.addEventListener('click', function() {
                    clearTimeout(popupTimeout);
                });
            }
        });
    </script>
</main>

<?php get_footer(); ?>