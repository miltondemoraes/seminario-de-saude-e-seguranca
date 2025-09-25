# 🚀 Guia Completo de Inicialização - Tema WordPress Seminário AV

## 📋 Pré-requisitos

Antes de começar, você precisa ter:

### ✅ **Ambiente WordPress**
- **WordPress instalado** (versão 5.0 ou superior)
- **Acesso ao painel admin** WordPress
- **Permissões de administrador** no site

### ✅ **Acesso aos Arquivos**
Escolha um dos métodos:
- **FTP/SFTP** (FileZilla, WinSCP, etc.)
- **cPanel File Manager**
- **WordPress Admin** (upload de tema)

---

## 🎯 **MÉTODO 1: Instalação via Admin WordPress (Recomendado)**

### **Passo 1: Preparar o Arquivo ZIP**
```bash
1. Comprima a pasta 'wordpress-theme' em um arquivo ZIP
2. Certifique-se que os arquivos estão na raiz do ZIP:
   - style.css
   - functions.php
   - index.php
   - header.php
   - footer.php
   - etc.
```

### **Passo 2: Upload do Tema**
```bash
1. Acesse seu painel WordPress (seu-site.com/wp-admin)
2. Vá em "Aparência" → "Temas"
3. Clique em "Adicionar novo"
4. Clique em "Enviar tema"
5. Selecione o arquivo ZIP
6. Clique em "Instalar agora"
7. Depois clique em "Ativar"
```

---

## 🎯 **MÉTODO 2: Instalação via FTP/cPanel**

### **Passo 1: Localizar a Pasta de Temas**
```bash
Caminho: /public_html/wp-content/themes/
```

### **Passo 2: Upload dos Arquivos**
```bash
1. Conecte-se via FTP ou acesse cPanel File Manager
2. Navegue até: wp-content/themes/
3. Crie uma nova pasta: seminario-av
4. Upload todos os arquivos da pasta 'wordpress-theme' para dentro de 'seminario-av'
5. Estrutura final deve ficar:
   /wp-content/themes/seminario-av/
   ├── style.css
   ├── functions.php
   ├── index.php
   ├── header.php
   ├── footer.php
   ├── page-seminario.php
   └── js/script.js
```

### **Passo 3: Ativar o Tema**
```bash
1. Acesse WordPress Admin
2. Vá em "Aparência" → "Temas"  
3. Encontre "Seminário de Saúde e Segurança no Audiovisual"
4. Clique em "Ativar"
```

---

## ⚙️ **CONFIGURAÇÃO INICIAL (Obrigatória)**

### **1. Criar a Página Principal**
```bash
1. Vá em "Páginas" → "Adicionar nova"
2. Título: "Seminário AV" (ou qualquer nome)
3. No lado direito, em "Atributos da Página"
4. Selecione Template: "Seminário Landing Page"
5. Publique a página
```

### **2. Definir como Página Inicial**
```bash
1. Vá em "Configurações" → "Leitura"
2. Marque "Uma página estática"
3. Página inicial: Selecione a página que você criou
4. Salve as alterações
```

### **3. Configurar Menu de Navegação**
```bash
1. Vá em "Aparência" → "Menus"
2. Clique em "criar um novo menu"
3. Nome do menu: "Menu Principal"
4. Adicione os links personalizados:
   - URL: #evento | Texto: Evento
   - URL: #programacao | Texto: Programação  
   - URL: #palestrantes | Texto: Palestrantes
   - URL: #cadastro | Texto: Cadastre-se
5. Marque "Menu Principal" em "Localizações do tema"
6. Salve o menu
```

---

## 🎨 **PERSONALIZAÇÃO DO EVENTO**

### **1. Via WordPress Customizer**
```bash
1. Vá em "Aparência" → "Personalizar"
2. Clique em "Configurações do Seminário"
3. Altere:
   - Data do Evento
   - Horário do Evento
   - Local do Evento
4. Clique em "Publicar"
```

### **2. Configurar Widgets do Footer**
```bash
1. Vá em "Aparência" → "Widgets"
2. Adicione widgets nas áreas:
   - Footer 1: Texto personalizado
   - Footer 2: Informações de contato
   - Footer 3: Links de redes sociais
```

---

## 📊 **TESTANDO O SISTEMA DE CADASTRO**

### **1. Verificar se o Banco de Dados foi Criado**
```bash
1. Acesse phpMyAdmin ou seu gerenciador de BD
2. Procure pela tabela: wp_seminario_registrations
3. Se não existir, desative e reative o tema
```

### **2. Testar Formulário de Cadastro**
```bash
1. Acesse sua página inicial
2. Role até a seção "Cadastro"
3. Preencha o formulário de teste
4. Clique em "Confirmar Cadastro"
5. Deve aparecer um modal de sucesso
```

### **3. Verificar Painel Admin**
```bash
1. Vá no menu admin: "Seminário AV"
2. Deve listar as inscrições recebidas
3. Teste a exportação CSV adicionando: ?export_seminario=csv na URL
```

---

## 📧 **CONFIGURAÇÃO DE E-MAILS**

### **Problema Comum: E-mails não chegam**
```bash
SOLUÇÃO: Instale um plugin SMTP
1. Instale: "WP Mail SMTP" ou "Easy WP SMTP"
2. Configure com suas credenciais de e-mail
3. Teste o envio
```

### **E-mails que são Enviados:**
- ✅ **Confirmação** para o participante
- ✅ **Notificação** para o admin do site

---

## 🔧 **SOLUÇÃO DE PROBLEMAS**

### **❌ Tema não aparece na lista**
```bash
CAUSA: Arquivos não estão no local correto
SOLUÇÃO: 
- Verifique se style.css está na raiz da pasta do tema
- Confirme que o cabeçalho do style.css tem as informações do tema
```

### **❌ Formulário não funciona**
```bash
CAUSA: JavaScript não carregou ou conflito
SOLUÇÃO:
1. Verifique se jQuery está ativo
2. Desative outros plugins temporariamente
3. Verifique console do navegador (F12)
```

### **❌ Página em branco**
```bash
CAUSA: Erro PHP
SOLUÇÃO:
1. Ative debug: adicione no wp-config.php:
   define('WP_DEBUG', true);
2. Verifique logs de erro
3. Corrija erros PHP mostrados
```

### **❌ CSS não carrega**
```bash
CAUSA: Cache ou caminho incorreto
SOLUÇÃO:
1. Limpe cache do navegador (Ctrl+F5)
2. Se usar plugin de cache, limpe-o
3. Verifique se arquivo CSS existe no servidor
```

---

## 🎯 **CHECKLIST FINAL**

### **✅ Tema Instalado e Ativo**
- [ ] Tema aparece em Aparência > Temas
- [ ] Tema está ativado
- [ ] Não há erros PHP

### **✅ Página Configurada** 
- [ ] Página criada com template "Seminário Landing Page"
- [ ] Definida como página inicial
- [ ] Página carrega sem erros

### **✅ Menu Funcionando**
- [ ] Menu criado e configurado
- [ ] Links âncora funcionam (#evento, #programacao, etc.)
- [ ] Menu mobile responsivo

### **✅ Formulário Operacional**
- [ ] Tabela do banco criada
- [ ] Formulário envia dados
- [ ] Modal de sucesso aparece
- [ ] E-mails sendo enviados

### **✅ Painel Admin**
- [ ] Menu "Seminário AV" aparece
- [ ] Inscrições são listadas
- [ ] Exportação CSV funciona

---

## 🚀 **PRÓXIMOS PASSOS**

### **1. Personalização Avançada**
```bash
- Edite palestrantes em page-seminario.php
- Modifique programação conforme necessário
- Ajuste cores no style.css se needed
```

### **2. SEO e Performance**
```bash
- Instale Yoast SEO ou RankMath
- Configure meta descriptions
- Otimize imagens se adicionar
```

### **3. Backup e Manutenção**
```bash
- Configure backup automático
- Mantenha WordPress atualizado
- Monitore inscrições regularmente
```

---

## 📞 **Suporte Adicional**

Se encontrar problemas:

1. **Verifique os logs de erro** WordPress
2. **Teste em ambiente local** primeiro
3. **Desative plugins** para identificar conflitos
4. **Verifique permissões** de arquivo (644/755)

**O tema está completo e pronto para produção!** 🎉

*Qualquer dúvida específica, me informe qual erro está ocorrendo para eu ajudar pontualmente.*