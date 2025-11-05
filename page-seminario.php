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
                    <span class="highlight">2º Seminário de</span><br>
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
                            <img src="<?php echo get_template_directory_uri(); ?>/cinemateca.jpg" alt="Cinemateca" style="width:100%;max-width:800px;height:auto;margin-bottom:2rem;border-radius:10px;box-shadow:0 4px 12px rgba(0,0,0,0.1);">
                            <p>
                                O 2º Seminário de Saúde e Segurança no Audiovisual é um evento único que reúne
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
            <div class="program-container">
                <!-- Dia 1 - 25/11 -->
                <div class="program-day">
                    <h3 class="day-title">Dia 1 - 25/11</h3>
                    <div class="program-timeline">
                        <div class="timeline-item">
                            <div class="timeline-time">09:00 - 09:50</div>
                            <div class="timeline-content">
                                <h3>Credenciamento</h3>
                                <p>Recepção dos participantes</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-time">09:50 - 10:00</div>
                            <div class="timeline-content">
                                <h3>Abertura do Seminário</h3>
                                <p>Presidente do Sindcine - Sonia Santana</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-time">10:00 - 10:30</div>
                            <div class="timeline-content">
                                <h3>Mesa 1 - Conceituação de Risco / Condutas de Risco</h3>
                                <p>Conceituação de risco, boas práticas e legislação</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-time">10:30 - 11:00</div>
                            <div class="timeline-content">
                                <h3>Coffee Break</h3>
                                <p>Intervalo para networking</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-time">11:00 - 13:00</div>
                            <div class="timeline-content">
                                <h3>Continuação Mesa 1</h3>
                                <p>Conceituação de risco, boas práticas e legislação</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-time">13:00 - 14:30</div>
                            <div class="timeline-content">
                                <h3>Almoço</h3>
                                <p>Intervalo para refeição</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-time">14:30 - 16:00</div>
                            <div class="timeline-content">
                                <h3>Mesa 2 - Riscos Específicos e Riscos Iminentes em Sets de Filmagens</h3>
                                <p>Riscos específicos na produção, jornadas excessivas, filmagens em vias públicas</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-time">16:00 - 16:30</div>
                            <div class="timeline-content">
                                <h3>Coffee Break</h3>
                                <p>Intervalo para networking</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-time">16:30 - 19:30</div>
                            <div class="timeline-content">
                                <h3>Continuação Mesa 2</h3>
                                <p>Riscos específicos na produção, jornadas excessivas, filmagens em vias públicas</p>
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
                
                <!-- Dia 2 - 26/11 -->
                <div class="program-day">
                    <h3 class="day-title">Dia 2 - 26/11</h3>
                    <div class="program-timeline">
                        <div class="timeline-item">
                            <div class="timeline-time">09:00 - 09:50</div>
                            <div class="timeline-content">
                                <h3>Credenciamento</h3>
                                <p>Recepção dos participantes</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-time">09:50 - 10:00</div>
                            <div class="timeline-content">
                                <h3>Abertura do Seminário</h3>
                                <p>1º Secretário do Sindcine - Claudio Leone (Diretor de Fotografia)</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-time">10:00 - 10:30</div>
                            <div class="timeline-content">
                                <h3>Mesa 1 - Cultura de Segurança no Mercado</h3>
                                <p>Processo de produção deve levar em conta, em todos os momentos, a questão da segurança</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-time">10:30 - 11:00</div>
                            <div class="timeline-content">
                                <h3>Coffee Break</h3>
                                <p>Intervalo para networking</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-time">11:00 - 13:00</div>
                            <div class="timeline-content">
                                <h3>Continuação Mesa 1</h3>
                                <p>Cultura de Segurança no Mercado</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-time">13:00 - 14:30</div>
                            <div class="timeline-content">
                                <h3>Almoço</h3>
                                <p>Intervalo para refeição</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-time">14:30 - 16:00</div>
                            <div class="timeline-content">
                                <h3>Mesa 2 - Responsabilidade Civil e Criminal/Contratação</h3>
                                <p>Dano, responsabilidade subjetiva, dolo e culpa, culpa concorrente, responsabilidade objetiva</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-time">16:00 - 16:30</div>
                            <div class="timeline-content">
                                <h3>Coffee Break</h3>
                                <p>Intervalo para networking</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-time">16:30 - 18:00</div>
                            <div class="timeline-content">
                                <h3>Mesa 3 - Saúde (Mental e Física), Assédio e Violência</h3>
                                <p>Palestrante: Izabella Camargo</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-time">18:00 - 18:30</div>
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
                        
                        <!-- Informações Básicas -->
                        <fieldset class="form-fieldset">
                            <legend class="fieldset-title">Informações Básicas</legend>
                            
                            <div class="form-group">
                                <label for="nome">Nome Completo *</label>
                                <input type="text" id="nome" name="nome" required placeholder="Digite seu nome completo">
                            </div>
                            
                            <div class="form-group">
                                <label for="email">E-mail *</label>
                                <input type="email" id="email" name="email" required placeholder="seu.email@exemplo.com">
                            </div>
                            
                            <div class="form-group">
                                <label for="telefone">Telefone *</label>
                                <input type="tel" id="telefone" name="telefone" required placeholder="(11) 98765-4321">
                            </div>
                        </fieldset>

                        <!-- Dados Profissionais -->
                        <fieldset class="form-fieldset">
                            <legend class="fieldset-title">Dados Profissionais</legend>
                            
                            <div class="form-group">
                                <label for="empresa">Empresa / Instituição *</label>
                                <input type="text" id="empresa" name="empresa" required placeholder="Nome da sua empresa ou instituição">
                            </div>
                            
                            <div class="form-group">
                                <label for="cargo">Cargo / Função *</label>
                                <input type="text" id="cargo" name="cargo" required placeholder="Seu cargo ou função">
                            </div>
                            
                            <div class="form-group">
                                <label for="areaAtuacao">Área de Atuação *</label>
                                <select id="areaAtuacao" name="areaAtuacao" required>
                                    <option value="">Selecione uma área...</option>
                                    <option value="audiovisual">Audiovisual</option>
                                    <option value="seguranca">Segurança do Trabalho</option>
                                    <option value="saude">Saúde Ocupacional</option>
                                    <option value="gestao">Gestão / Administração</option>
                                    <option value="estudante">Estudante</option>
                                    <option value="outro">Outro</option>
                                </select>
                            </div>
                            
                            <div class="form-group" id="outroAreaGroup" style="display: none;">
                                <label for="outroArea">Qual a sua área de atuação?</label>
                                <input type="text" id="outroArea" name="outroArea" placeholder="Especifique sua área de atuação">
                            </div>
                        </fieldset>

                        <!-- Seção para Profissionais do Audiovisual -->
                        <fieldset class="form-fieldset" id="audiovisualSection" style="display: none;">
                            <legend class="fieldset-title">Informações Audiovisual</legend>
                            
                            <div class="form-group">
                                <label for="temDRT">Tem DRT? *</label>
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

                            <div class="form-group">
                                <label for="funcaoAudiovisual">Qual sua função no audiovisual? *</label>
                                <select id="funcaoAudiovisual" name="funcaoAudiovisual">
                                    <option value="">Selecione uma função...</option>
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

                            <div class="form-group" id="outroAudiovisualGroup" style="display: none;">
                                <label for="outroAudiovisual">Qual sua função?</label>
                                <input type="text" id="outroAudiovisual" name="outroAudiovisual" placeholder="Especifique sua função no audiovisual">
                            </div>
                        </fieldset>

                        <!-- Preferências e Consentimento -->
                        <fieldset class="form-fieldset">
                            <legend class="fieldset-title">Preferências e Consentimento</legend>
                            
                            <div class="form-group checkbox-group">
                                <label class="checkbox-label">
                                    <input type="checkbox" id="newsletter" name="newsletter">
                                    <span class="checkmark"></span>
                                    Desejo receber informações sobre futuros eventos e newsletters
                                </label>
                            </div>
                            
                            <div class="form-group checkbox-group">
                                <label class="checkbox-label">
                                    <input type="checkbox" id="termos" name="termos" required>
                                    <span class="checkmark"></span>
                                    Concordo com os <a href="#" id="openTermsModal" class="terms-link">termos de uso</a> e <a href="#" class="terms-link">política de privacidade</a> *
                                </label>
                            </div>
                        </fieldset>

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