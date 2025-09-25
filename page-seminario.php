<?php
/*
Template Name: Seminário Landing Page
*/

get_header(); ?>

<main>
    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-background"></div>
        <div class="container">
            <div class="hero-content">
                <h1 class="hero-title">
                    <span class="highlight">Seminário de</span><br>
                    Saúde e Segurança<br>
                    <span class="highlight">no Audiovisual</span>
                </h1>
                <p class="hero-description">
                    Um evento essencial para profissionais que buscam conhecimento em práticas seguras
                    e saudáveis na indústria audiovisual.
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
                    Cadastre-se Gratuitamente
                </a>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="evento" class="about">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Sobre o Evento</h2>
                <p class="section-subtitle">
                    Conectando profissionais para um audiovisual mais seguro e saudável
                </p>
            </div>
            <div class="about-content">
                <div class="about-text">
                    <?php if(have_posts()): while(have_posts()): the_post(); ?>
                        <?php if(get_the_content()): ?>
                            <?php the_content(); ?>
                        <?php else: ?>
                            <p>
                                O Seminário de Saúde e Segurança no Audiovisual é um evento único que reúne
                                especialistas, profissionais e estudantes da área para discutir as melhores
                                práticas em segurança ocupacional e bem-estar no setor audiovisual.
                            </p>
                            <p>
                                Durante um dia completo de palestras, workshops e networking, você terá acesso
                                a conteúdos exclusivos sobre ergonomia, segurança em sets de filmagem,
                                prevenção de acidentes e muito mais.
                            </p>
                        <?php endif; ?>
                    <?php endwhile; endif; ?>
                </div>
                <div class="stats">
                    <div class="stat-item">
                        <div class="stat-number">500+</div>
                        <div class="stat-label">Participantes Esperados</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">15+</div>
                        <div class="stat-label">Palestrantes Especialistas</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">8h</div>
                        <div class="stat-label">de Conteúdo Intensivo</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Program Section -->
    <section id="programacao" class="program">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Programação</h2>
                <p class="section-subtitle">
                    Agenda completa com palestras e workshops especializados
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
                <h2 class="section-title">Palestrantes</h2>
                <p class="section-subtitle">
                    Especialistas reconhecidos na área de saúde e segurança ocupacional
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

    <!-- Registration Section -->
    <section id="cadastro" class="registration">
        <div class="container">
            <div class="registration-content">
                <div class="registration-info">
                    <h2 class="section-title">Faça seu Cadastro</h2>
                    <p class="section-subtitle">
                        Garanta sua vaga neste evento imperdível!<br>
                        <strong>Inscrições totalmente gratuitas</strong>
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
</main>

<?php get_footer(); ?>