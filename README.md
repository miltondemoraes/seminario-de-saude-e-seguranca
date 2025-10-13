# Tema WordPress - Seminário de Saúde e Segurança no Audiovisual

🚀 **Tema WordPress completo e profissional para eventos corporativos**

Este é um tema WordPress personalizado desenvolvido especificamente para o "Seminário de Saúde e Segurança no Audiovisual", com sistema de cadastro integrado, painel administrativo e design responsivo usando as cores amarelo e preto.

## ⚡ Início Rápido

### 📦 Instalação
1. **Via WordPress Admin**: Compacte esta pasta em ZIP → Aparência → Temas → Enviar tema
2. **Via FTP**: Upload desta pasta para `/wp-content/themes/seminario-av/` → Ativar tema

### ⚙️ Configuração (3 minutos)
1. **Página**: Criar página → Template "Seminário Landing Page" → Definir como inicial
2. **Menu**: Aparência → Menus → Criar menu com links (#evento, #programacao, #palestrantes, #cadastro)
3. **Personalizar**: Aparência → Personalizar → Configurações do Seminário

### ✅ Pronto!
- Formulário de cadastro funcional com AJAX
- Painel admin para gerenciar inscrições
- E-mails automáticos de confirmação
- Design totalmente responsivo

📖 **Guia completo**: `GUIA-INICIALIZACAO-WORDPRESS.md`

---

## 📋 Características do Tema

### ✅ Funcionalidades WordPress
- **Tema responsivo** totalmente compatível com WordPress
- **Sistema de cadastro** com AJAX e banco de dados
- **Painel administrativo** para visualizar inscrições
- **E-mails automáticos** de confirmação
- **Personalização via Customizer** WordPress
- **Sistema de menus** WordPress integrado
- **Widgets** para footer personalizáveis

### 🎨 Design e Layout
- **Cores principais**: Amarelo (#FFD700) e Preto (#1a1a1a)
- **Design responsivo** para todos os dispositivos
- **Animações CSS** suaves e profissionais
- **Tipografia otimizada** com Google Fonts (Inter)
- **Ícones Font Awesome** 6.0

### 📱 Seções da Landing Page
1. **Hero Section** - Chamada principal com informações do evento
2. **Sobre o Evento** - Descrição detalhada e estatísticas  
3. **Programação** - Timeline interativo com horários das atividades
4. **Palestrantes** - Cards dos especialistas com informações
5. **Expositores** - Área de exibidores e estandes de parceiros
6. **Inscrição** - Formulário funcional com validação AJAX
7. **Como Chegar** - Mapa interativo e opções de transporte
8. **Sobre o Sindcine** - Informações institucionais
9. **Footer** - Informações de contato e redes sociais

### 📄 Páginas Especiais
- **Página de Patrocínio** (`page-patrocinio.php`) - Níveis Ouro, Prata e Bronze
- **Formulário de Interesse** - Para potenciais patrocinadores
- **Área Administrativa** - Gestão completa de inscrições

## 🚀 Instalação

### Método 1: Upload via Admin WordPress
1. Acesse **Aparência > Temas** no seu WordPress
2. Clique em **Adicionar novo > Enviar tema**
3. Faça upload do arquivo ZIP da pasta `wordpress-theme`
4. Ative o tema

### Método 2: FTP/cPanel
1. Faça upload da pasta `wordpress-theme` para `/wp-content/themes/`
2. Renomeie para `seminario-av` (opcional)
3. Ative o tema no admin WordPress

## ⚙️ Configuração

### 1. Após Ativação
O tema automaticamente:
- Cria a tabela no banco de dados para inscrições
- Registra os menus necessários
- Configura as áreas de widgets

### 2. Configurar Menu
1. Vá em **Aparência > Menus**
2. Crie um novo menu com os links:
   - Evento (`#evento`)
   - Programação (`#programacao`) 
   - Palestrantes (`#palestrantes`)
   - Expositores (`#exposicao`)
   - Contato (`#contato`)
   - Patrocínio (link para página de patrocínio)
   - Como Chegar (`#como-chegar`)
   - Inscreva-se (`#cadastro`)
3. Defina como "Menu Principal"

### 3. Configurar Página de Patrocínio
1. Crie uma nova página no WordPress
2. Defina o template como "Página de Patrocínio"
3. Publique e adicione ao menu principal
   - Cadastre-se (`#cadastro`)
3. Atribua ao local "Menu Principal"

### 3. Personalizar via Customizer
1. Acesse **Aparência > Personalizar**
2. Na seção "Configurações do Seminário":
   - Data do Evento
   - Horário do Evento  
   - Local do Evento

### 4. Criar Página Principal
1. Crie uma nova página
2. Selecione o template "Seminário Landing Page"
3. Defina como página inicial em **Configurações > Leitura**

## 📊 Gerenciamento de Inscrições

### Visualizar Inscrições
- Acesse **Seminário AV** no menu admin
- Visualize todas as inscrições em formato de tabela
- Informações incluem: nome, email, telefone, empresa, etc.

### Exportar Dados
- Na página de inscrições, adicione `?export_seminario=csv` na URL
- Exemplo: `seu-site.com/wp-admin/admin.php?page=seminario-inscricoes&export_seminario=csv`
- Baixe arquivo CSV com todos os dados

### E-mails Automáticos
O tema envia automaticamente:
- **E-mail de confirmação** para o participante
- **Notificação** para o administrador do site

## 🔧 Personalização

### Alterar Informações do Evento
Edite o arquivo `functions.php` ou use o Customizer para:
- Data e horário do evento
- Local do evento
- Informações de contato

### Modificar Palestrantes
Edite os arquivos:
- `index.php` (linha ~150)
- `page-seminario.php` (linha ~150)

### Personalizar Programação  
Edite a seção "Program Section" nos templates principais.

### Widgets no Footer
1. Vá em **Aparência > Widgets**
2. Adicione widgets nas áreas:
   - Footer 1
   - Footer 2  
   - Footer 3

## 📁 Estrutura de Arquivos

```
wordpress-theme/
├── style.css              # Estilos CSS principais + info do tema
├── functions.php          # Funcionalidades PHP do tema
├── index.php             # Template principal
├── header.php            # Cabeçalho do tema
├── footer.php            # Rodapé do tema
├── page-seminario.php    # Template personalizado
├── js/
│   └── script.js         # JavaScript com jQuery/AJAX
└── README.md             # Esta documentação
```

## 🗃️ Banco de Dados

### Tabela: `wp_seminario_registrations`
Campos criados automaticamente:
- `id` - ID único
- `nome` - Nome completo
- `email` - E-mail  
- `telefone` - Telefone
- `empresa` - Empresa/Instituição
- `cargo` - Cargo/Função
- `experiencia` - Área de experiência
- `newsletter` - Aceita newsletter (0/1)
- `data_cadastro` - Data/hora do cadastro

## 🎯 Funcionalidades Técnicas

### JavaScript/jQuery
- Validação de formulário em tempo real
- Formatação automática de telefone
- Smooth scrolling entre seções
- Menu mobile responsivo
- Modal de sucesso após cadastro
- Sistema de notificações

### PHP/WordPress
- Hooks e actions WordPress
- Sistema AJAX nativo
- Validação e sanitização de dados
- Envio de e-mails automático
- Integração com Customizer
- Suporte a widgets e menus

### Segurança
- Nonces WordPress para AJAX
- Sanitização de todos os dados
- Validação server-side
- Proteção contra SQL injection

## 🔒 Requisitos

- **WordPress**: 5.0 ou superior
- **PHP**: 7.4 ou superior  
- **MySQL**: 5.6 ou superior
- **Permissões**: Criação de tabelas no banco

## 📞 Suporte

### Problemas Comuns

**Formulário não envia:**
- Verifique se o jQuery está carregado
- Confirme se as permissões de AJAX estão corretas

**E-mails não chegam:**
- Configure SMTP no WordPress
- Verifique spam/lixo eletrônico

**Tema não ativa:**
- Verifique se todos os arquivos foram enviados
- Confirme permissões de arquivo (644/755)

### Personalização Avançada
Para modificações específicas, edite:
- `functions.php` - Funcionalidades PHP
- `style.css` - Estilos visuais  
- `js/script.js` - Comportamentos JavaScript

---

**Tema desenvolvido especificamente para promover saúde e segurança na indústria audiovisual.**

*Versão: 1.0 | Compatível com WordPress 5.0+*