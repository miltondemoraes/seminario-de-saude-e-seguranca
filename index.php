<?php get_header(); ?>

<main>
    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-background"></div>
        <div class="container">
            <div class="hero-content">
                <h1 class="hero-title">
                    <span class="highlight"><?php echo get_theme_mod('seminario_hero_title_line1', 'Seminário de'); ?></span><br>
                    <?php echo get_theme_mod('seminario_hero_title_line2', 'Saúde e Segurança'); ?><br>
                    <span class="highlight"><?php echo get_theme_mod('seminario_hero_title_line3', 'no Audiovisual'); ?></span>
                </h1>
                <p class="hero-description">
                    <?php echo get_theme_mod('seminario_hero_description', 'Um evento essencial para profissionais que buscam conhecimento em práticas seguras e saudáveis na indústria audiovisual.'); ?>
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
                    <p>
                        <?php echo get_theme_mod('seminario_about_text1', 'O Seminário de Saúde e Segurança no Audiovisual é um evento único que reúne especialistas, profissionais e estudantes da área para discutir as melhores práticas em segurança ocupacional e bem-estar no setor audiovisual.'); ?>
                    </p>
                    <p>
                        <?php echo get_theme_mod('seminario_about_text2', 'Durante um dia completo de palestras, workshops e networking, você terá acesso a conteúdos exclusivos sobre ergonomia, segurança em sets de filmagem, prevenção de acidentes e muito mais.'); ?>
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
            <div class="program-timeline">
                <div class="timeline-item">
                    <div class="timeline-time">08:00 - 09:00</div>
                    <div class="timeline-content">
                        <h3>Credenciamento e Coffee Break</h3>
                        <p>Recepção dos participantes e networking inicial</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-time">09:00 - 10:30</div>
                    <div class="timeline-content">
                        <h3>Abertura: Panorama da Segurança no Audiovisual</h3>
                        <p>Visão geral dos principais desafios e oportunidades do setor</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-time">10:45 - 12:00</div>
                    <div class="timeline-content">
                        <h3>Ergonomia em Estúdios de Gravação</h3>
                        <p>Práticas para prevenção de lesões ocupacionais</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-time">12:00 - 13:30</div>
                    <div class="timeline-content">
                        <h3>Almoço e Networking</h3>
                        <p>Oportunidade para conexões profissionais</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-time">13:30 - 15:00</div>
                    <div class="timeline-content">
                        <h3>Segurança em Sets de Filmagem</h3>
                        <p>Protocolos e equipamentos de proteção essenciais</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-time">15:15 - 16:30</div>
                    <div class="timeline-content">
                        <h3>Saúde Mental na Indústria Audiovisual</h3>
                        <p>Estratégias para bem-estar psicológico no trabalho</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-time">16:45 - 18:00</div>
                    <div class="timeline-content">
                        <h3>Mesa Redonda e Encerramento</h3>
                        <p>Discussão aberta e considerações finais</p>
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
                <div class="speaker-card">
                    <div class="speaker-photo">
                        <i class="fas fa-user-circle"></i>
                    </div>
                    <h3 class="speaker-name">Dr. Carlos Silva</h3>
                    <p class="speaker-title">Especialista em Ergonomia</p>
                    <p class="speaker-bio">
                        20 anos de experiência em ergonomia ocupacional
                    </p>
                </div>
                <div class="speaker-card">
                    <div class="speaker-photo">
                        <i class="fas fa-user-circle"></i>
                    </div>
                    <h3 class="speaker-name">Dra. Maria Santos</h3>
                    <p class="speaker-title">Psicóloga Ocupacional</p>
                    <p class="speaker-bio">
                        Especialista em saúde mental no trabalho
                    </p>
                </div>
                <div class="speaker-card">
                    <div class="speaker-photo">
                        <i class="fas fa-user-circle"></i>
                    </div>
                    <h3 class="speaker-name">Eng. João Costa</h3>
                    <p class="speaker-title">Engenheiro de Segurança</p>
                    <p class="speaker-bio">
                        Consultor em segurança para a indústria audiovisual
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Exhibition Section -->
    <section id="exposicao" class="exhibition">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title"><?php echo get_theme_mod('seminario_exhibition_title', 'Exposição'); ?></h2>
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
                    <div class="exhibitor-card">
                        <div class="exhibitor-logo">
                            <i class="fas fa-building"></i>
                        </div>
                        <h3 class="exhibitor-name">TechSafety Pro</h3>
                        <p class="exhibitor-description">
                            Equipamentos de proteção individual especializados para audiovisual
                        </p>
                        <div class="exhibitor-booth">Estande A1</div>
                    </div>
                    <div class="exhibitor-card">
                        <div class="exhibitor-logo">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h3 class="exhibitor-name">ErgoMedia Solutions</h3>
                        <p class="exhibitor-description">
                            Móveis ergonômicos e soluções para estúdios
                        </p>
                        <div class="exhibitor-booth">Estande A2</div>
                    </div>
                    <div class="exhibitor-card">
                        <div class="exhibitor-logo">
                            <i class="fas fa-heartbeat"></i>
                        </div>
                        <h3 class="exhibitor-name">WellBeing Media</h3>
                        <p class="exhibitor-description">
                            Programas de bem-estar e saúde ocupacional
                        </p>
                        <div class="exhibitor-booth">Estande A3</div>
                    </div>
                    <div class="exhibitor-card">
                        <div class="exhibitor-logo">
                            <i class="fas fa-tools"></i>
                        </div>
                        <h3 class="exhibitor-name">AudioSafe Tech</h3>
                        <p class="exhibitor-description">
                            Tecnologia em monitoramento de segurança em sets
                        </p>
                        <div class="exhibitor-booth">Estande B1</div>
                    </div>
                    <div class="exhibitor-card">
                        <div class="exhibitor-logo">
                            <i class="fas fa-first-aid"></i>
                        </div>
                        <h3 class="exhibitor-name">Emergency AV</h3>
                        <p class="exhibitor-description">
                            Kits de primeiros socorros e treinamentos de emergência
                        </p>
                        <div class="exhibitor-booth">Estande B2</div>
                    </div>
                    <div class="exhibitor-card">
                        <div class="exhibitor-logo">
                            <i class="fas fa-certificate"></i>
                        </div>
                        <h3 class="exhibitor-name">CertifiAV</h3>
                        <p class="exhibitor-description">
                            Certificações e auditorias em segurança audiovisual
                        </p>
                        <div class="exhibitor-booth">Estande B3</div>
                    </div>
                </div>
                <div class="exhibition-cta">
                    <h3>Interessado em expor?</h3>
                    <p>Entre em contato conosco para conhecer nossas oportunidades de patrocínio</p>
                    <a href="#contato" class="cta-button-secondary">
                        <i class="fas fa-handshake"></i>
                        Seja um Expositor
                    </a>
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
                                Concordo com os <a href="#" class="terms-link">termos de uso</a> e política de privacidade *
                            </label>
                        </div>
                        <button type="submit" class="submit-button">
                            <i class="fas fa-user-plus"></i>
                            Confirmar Cadastro
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

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
                                <?php echo nl2br(get_theme_mod('seminario_location_address', 'Rua das Convenções, 1000\nVila Olímpia - São Paulo/SP\nCEP: 04551-000')); ?>
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
                                    <p>Estação Vila Olímpia (Linha 9-Esmeralda)<br>10 minutos caminhando</p>
                                </div>
                            </div>
                            <div class="transport-item">
                                <i class="fas fa-bus"></i>
                                <div>
                                    <h4>Ônibus</h4>
                                    <p>Linhas 5011-10, 6272-10<br>Ponto em frente ao centro</p>
                                </div>
                            </div>
                            <div class="transport-item">
                                <i class="fas fa-car"></i>
                                <div>
                                    <h4>Carro</h4>
                                    <p>Estacionamento próprio disponível<br>R$ 15,00 por período</p>
                                </div>
                            </div>
                            <div class="transport-item">
                                <i class="fas fa-taxi"></i>
                                <div>
                                    <h4>Táxi/Uber</h4>
                                    <p>Ponto de embarque e desembarque<br>na entrada principal</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="map-container">
                    <div class="map-placeholder">
                        <i class="fas fa-map"></i>
                        <p>Mapa interativo será carregado aqui</p>
                        <small>
                            Para integrar com Google Maps, adicione sua API key<br>
                            em: Aparência → Personalizar → Configurações do Seminário
                        </small>
                    </div>
                    <div class="map-actions">
                        <a href="https://maps.google.com/?q=Centro+de+Convenções+Vila+Olímpia+São+Paulo" 
                           target="_blank" class="map-link">
                            <i class="fas fa-external-link-alt"></i>
                            Ver no Google Maps
                        </a>
                        <a href="https://www.waze.com/ul?q=Centro+de+Convenções+Vila+Olímpia+São+Paulo" 
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
                <h2 class="section-title"><?php echo get_theme_mod('seminario_sindcine_title', 'Sobre o Sindcine'); ?></h2>
                <p class="section-subtitle">
                    <?php echo get_theme_mod('seminario_sindcine_subtitle', 'Conheça o Sindicato dos Trabalhadores nas Indústrias Cinematográficas e do Audiovisual'); ?>
                </p>
            </div>
            <div class="sindcine-content">
                <div class="sindcine-info">
                    <div class="sindcine-text">
                        <p>
                            <?php echo get_theme_mod('seminario_sindcine_text1', 'O Sindcine é o sindicato que representa os trabalhadores da indústria cinematográfica e audiovisual, lutando por melhores condições de trabalho, segurança e bem-estar de todos os profissionais do setor.'); ?>
                        </p>
                        <p>
                            <?php echo get_theme_mod('seminario_sindcine_text2', 'Fundado com o objetivo de promover os direitos trabalhistas e a segurança ocupacional, o Sindcine tem sido um pilar fundamental na organização de eventos como este seminário, sempre focado na educação e capacitação dos profissionais.'); ?>
                        </p>
                    </div>
                    <div class="sindcine-stats">
                        <div class="stat-item">
                            <div class="stat-number">2.500+</div>
                            <div class="stat-label">Associados Ativos</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number">15</div>
                            <div class="stat-label">Anos de Atuação</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number">50+</div>
                            <div class="stat-label">Eventos Realizados</div>
                        </div>
                    </div>
                </div>
                
                <div class="sindcine-mission">
                    <h3>Nossa Missão</h3>
                    <div class="mission-grid">
                        <div class="mission-item">
                            <i class="fas fa-shield-alt"></i>
                            <div>
                                <h4>Segurança</h4>
                                <p>Promover práticas seguras em todos os ambientes de trabalho audiovisual</p>
                            </div>
                        </div>
                        <div class="mission-item">
                            <i class="fas fa-graduation-cap"></i>
                            <div>
                                <h4>Educação</h4>
                                <p>Capacitar profissionais com conhecimento especializado e atualizado</p>
                            </div>
                        </div>
                        <div class="mission-item">
                            <i class="fas fa-handshake"></i>
                            <div>
                                <h4>Representação</h4>
                                <p>Defender os direitos e interesses dos trabalhadores do audiovisual</p>
                            </div>
                        </div>
                        <div class="mission-item">
                            <i class="fas fa-network-wired"></i>
                            <div>
                                <h4>Networking</h4>
                                <p>Conectar profissionais e promover o crescimento do setor</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="sindcine-cta">
                    <h3>Faça Parte do Sindcine</h3>
                    <p>Junte-se a nós e contribua para um audiovisual mais seguro e profissional</p>
                    <div class="cta-buttons">
                        <a href="#" class="cta-button">
                            <i class="fas fa-user-plus"></i>
                            Torne-se Associado
                        </a>
                        <a href="#contato" class="cta-button-secondary">
                            <i class="fas fa-info-circle"></i>
                            Saiba Mais
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>