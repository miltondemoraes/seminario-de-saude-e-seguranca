<?php
/**
 * Template: Página do Selo SINDCINE
 * Descrição: Exibe o regulamento de conformidade SINDCINE
 */

// Chamar header do tema
get_header();
?>

<style>
    .selo-container {
        max-width: 900px;
        margin: 3rem auto;
        padding: 2rem;
        background: white;
    }

    .selo-header {
        text-align: center;
        margin-bottom: 3rem;
        border-bottom: 3px solid var(--primary-yellow);
        padding-bottom: 2rem;
    }

    .selo-logo {
        max-width: 200px;
        margin: 0 auto 1.5rem;
    }

    .selo-logo img {
        max-width: 100%;
        height: auto;
    }

    .selo-title {
        font-size: 2.5rem;
        font-weight: 800;
        color: var(--primary-black);
        margin: 1rem 0;
        text-transform: uppercase;
        letter-spacing: 2px;
    }

    .selo-subtitle {
        font-size: 1.3rem;
        color: #666;
        font-weight: 600;
        margin-bottom: 1rem;
    }

    .regulamento-content {
        line-height: 1.8;
        color: var(--text-dark);
    }

    .regulamento-content article {
        margin-bottom: 2rem;
    }

    .article-title {
        font-size: 1.4rem;
        font-weight: 700;
        color: var(--primary-black);
        margin: 2rem 0 1rem 0;
        padding-bottom: 0.5rem;
        border-bottom: 2px solid #f0f0f0;
    }

    .article-subtitle {
        font-size: 1.2rem;
        font-weight: 600;
        color: var(--light-black);
        margin: 1.5rem 0 0.8rem 0;
    }

    .regulamento-content p {
        margin-bottom: 1rem;
        text-align: justify;
    }

    .regulamento-content ul {
        margin-left: 2rem;
        margin-bottom: 1rem;
    }

    .regulamento-content li {
        margin-bottom: 0.8rem;
        list-style-type: disc;
    }

    .regulamento-content ol {
        margin-left: 2rem;
        margin-bottom: 1rem;
    }

    .regulamento-content ol li {
        margin-bottom: 0.8rem;
        list-style-type: decimal;
    }

    .nested-list {
        margin-left: 2rem;
        margin-top: 0.5rem;
    }

    .nested-list li {
        list-style-type: circle;
        margin-bottom: 0.5rem;
    }

    .back-button {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        margin-top: 3rem;
        padding: 1rem 2rem;
        background: var(--gradient-yellow);
        color: var(--primary-black);
        text-decoration: none;
        border-radius: 50px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .back-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(255, 215, 0, 0.3);
    }

    @media (max-width: 768px) {
        .selo-container {
            margin: 1rem;
            padding: 1.5rem;
        }

        .selo-title {
            font-size: 1.8rem;
        }

        .article-title {
            font-size: 1.2rem;
        }

        .regulamento-content {
            font-size: 0.95rem;
        }
    }
</style>

<div class="selo-container">
    <div class="selo-header">
        <div class="selo-logo">
            <?php
            // Tentar encontrar a logo do SINDCINE
            $logo_path = get_template_directory() . '/images/logo-sindcine.png';
            if (file_exists($logo_path)) {
                echo '<img src="' . get_template_directory_uri() . '/images/logo-sindcine.png" alt="SINDCINE">';
            } else {
                echo '<div style="font-size: 5rem; color: var(--primary-yellow);">🏢</div>';
            }
            ?>
        </div>
        <h1 class="selo-title">Selo SINDCINE</h1>
        <p class="selo-subtitle">Certificação de Conformidade com a CCT SINDCINE</p>
    </div>

    <div class="regulamento-content">
        <article>
            <h2 class="article-title">REGULAMENTO PARA CONCESSÃO DO DOCUMENTO DE CONFORMIDADE SINDCINE</h2>

            <section>
                <h3 class="article-subtitle">Art. 1º - Finalidade</h3>
                <p>Este regulamento estabelece os critérios, procedimentos e requisitos para a concessão de certificação de conformidade com a CCT SINDCINE, destinado a reconhecer produtoras de filmes de longa-metragem e publicitários que comprovem o cumprimento integral das normas da convenção coletiva de trabalho, sindicais e de saúde e segurança aplicáveis para todas as fases da obra.</p>
                <ul>
                    <li>O selo será deferido por projeto.</li>
                </ul>
            </section>

            <section>
                <h3 class="article-subtitle">Art. 2º - Requisitos para a Concessão</h3>
                <p>O Documento de Conformidade será concedido às produtoras que comprovarem o atendimento aos seguintes critérios:</p>

                <h4 style="font-weight: 600; margin-top: 1.2rem; margin-bottom: 0.5rem;">I. Pagamento de Direitos Trabalhistas</h4>
                <ul class="nested-list">
                    <li>O pagamento dos cachês de todos os profissionais técnicos contratados foi realizado dentro do prazo estipulado em contrato.</li>
                    <li>Horas extras foram devidamente registradas e remuneradas conforme a legislação vigente.</li>
                    <li>Pagamento correto dos valores de vale-refeição (VR), conforme disposto na Convenção Coletiva de Trabalho (CCT).</li>
                </ul>

                <h4 style="font-weight: 600; margin-top: 1.2rem; margin-bottom: 0.5rem;">II. Cumprimento da Jornada de Trabalho</h4>
                <ul class="nested-list">
                    <li>A jornada de trabalho não excedeu a jornada diária, observando o regime de 5x2 (cinco dias de trabalho e dois de descanso).</li>
                </ul>

                <h4 style="font-weight: 600; margin-top: 1.2rem; margin-bottom: 0.5rem;">III. Registro Contratual</h4>
                <ul class="nested-list">
                    <li>Todos os contratos de trabalho e prestação de serviços foram devidamente registrados e depositados no SINDCINE</li>
                    <li>Foram feitos e comprovados junto ao SINDCINE os seguros de todos os técnicos que participaram da obra.</li>
                </ul>

                <h4 style="font-weight: 600; margin-top: 1.2rem; margin-bottom: 0.5rem;">IV. Cumprimento das Cláusulas de Inclusão e Diversidade</h4>
                <ul class="nested-list">
                    <li>As cláusulas da CCT relativas ao etarismo, igualdade de gênero e diversidade foram integralmente cumpridas, promovendo um ambiente de trabalho inclusivo.</li>
                </ul>

                <h4 style="font-weight: 600; margin-top: 1.2rem; margin-bottom: 0.5rem;">V. Registro Profissional</h4>
                <ul class="nested-list">
                    <li>Todos os profissionais contratados possuem registro profissional válido, em conformidade com a legislação aplicável à categoria.</li>
                </ul>

                <h4 style="font-weight: 600; margin-top: 1.2rem; margin-bottom: 0.5rem;">VI. Normas de Saúde e Segurança no Trabalho</h4>
                <p style="margin-bottom: 0.5rem;">Foram cumpridas todas as normas de saúde e segurança no trabalho, incluindo:</p>
                <ul class="nested-list">
                    <li>a) Disponibilização de equipamentos de proteção individual (EPIs) adequados;</li>
                    <li>b) Garantia de condições seguras no ambiente de trabalho;</li>
                    <li>c) Adoção de medidas preventivas para evitar acidentes e doenças ocupacionais.</li>
                </ul>
            </section>

            <section>
                <h3 class="article-subtitle">Art. 3º - Procedimentos de Solicitação</h3>

                <h4 style="font-weight: 600; margin-top: 1.2rem; margin-bottom: 0.5rem;">I. Documentação Necessária</h4>
                <p>A produtora interessada deve protocolar o pedido de concessão junto ao SINDCINE, apresentando os seguintes documentos:</p>
                <ul class="nested-list">
                    <li>Contratos de trabalho e prestação de serviços assinados e registrados;</li>
                    <li>Comprovantes de pagamento dos cachês, horas extras e benefícios;</li>
                    <li>Relatórios que atestem o cumprimento das cláusulas da CCT de inclusão e diversidade;</li>
                    <li>Relatórios de saúde e segurança no trabalho.</li>
                </ul>

                <h4 style="font-weight: 600; margin-top: 1.2rem; margin-bottom: 0.5rem;">II. Análise e Avaliação</h4>
                <p>O pedido será avaliado por uma comissão designada pelo SINDCINE, que verificará o cumprimento integral dos critérios estabelecidos neste regulamento.</p>

                <h4 style="font-weight: 600; margin-top: 1.2rem; margin-bottom: 0.5rem;">III. Regularização de Pendências</h4>
                <p>Caso sejam identificadas pendências ou descumprimentos, a produtora será notificada e terá um prazo de 30 dias para regularização.</p>
            </section>

            <section>
                <h3 class="article-subtitle">Art. 4º - Penalidades e Sanções</h3>
                <ol>
                    <li>O SINDCINE reserva-se o direito de revogar o Documento de Conformidade caso sejam constatadas irregularidades após a sua emissão.</li>
                    <li>A produtora que apresentar informações falsas ou incompletas estará sujeita às penalidades previstas em lei e poderá ser impedida de solicitar o documento novamente por até 2 anos.</li>
                </ol>
            </section>

            <section>
                <h3 class="article-subtitle">Art. 5º - Disposições Gerais</h3>
                <ol>
                    <li>Este regulamento entra em vigor na data de sua publicação.</li>
                    <li>Casos omissos ou dúvidas na interpretação deste regulamento serão analisados pela diretoria do SINDCINE.</li>
                </ol>
            </section>
        </article>
    </div>

    <a href="javascript:history.back()" class="back-button">
        ← Voltar
    </a>
</div>

<?php get_footer(); ?>
