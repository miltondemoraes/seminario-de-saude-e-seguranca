# Guia: Resolver Problema de Upload de Arquivos

## ❌ Erro Comum
```
The uploaded file could not be moved to wp-content/uploads/2025/09.
```

## 🔧 Soluções

### 1. **Verificar Permissões (Windows - XAMPP/WAMP)**
```
- Navegue até a pasta do seu WordPress
- Localize a pasta wp-content/uploads/
- Clique com botão direito → Propriedades → Segurança
- Certifique-se que "Usuários" tem "Controle Total" ou pelo menos "Modificar"
```

### 2. **Criar Pasta Manualmente**
```
- Vá até wp-content/uploads/
- Crie a pasta "2025" (se não existir)
- Dentro de 2025, crie a pasta "09"
- Caminho final: wp-content/uploads/2025/09/
```

### 3. **Verificar Status via Script**
```
- Acesse: http://seu-site.local/wp-content/themes/seminario-av/check-uploads.php
- Veja o diagnóstico completo
- Siga as instruções mostradas
```

### 4. **Configurações do Apache (XAMPP)**
```
1. Abra o painel do XAMPP
2. Config → Apache (httpd.conf)
3. Procure por "Directory" e certifique-se que tem:
   <Directory "C:/xampp/htdocs">
       AllowOverride All
       Require all granted
   </Directory>
4. Reinicie o Apache
```

### 5. **Configurações Alternativas**
Adicione no wp-config.php (antes de "require_once"):
```php
// Forçar permissões de upload
define('FS_CHMOD_DIR', (0755 & ~ umask()));
define('FS_CHMOD_FILE', (0644 & ~ umask()));
```

## ✅ Teste Final
1. Vá em WordPress Admin → Aparência → Personalizar
2. Vá em "Seção Palestrantes"
3. Tente fazer upload de uma imagem para "Palestrante 1 - Foto"
4. Se funcionar, delete o arquivo check-uploads.php

## 🚀 Campos Disponíveis Agora
Com o sistema expandido, você pode editar:

### Programação
- ✏️ 7 itens da timeline (horário, título, descrição)

### Palestrantes  
- ✏️ 3 palestrantes (nome, especialidade, bio, foto)

### Exposição
- ✏️ 6 expositores (nome, descrição, estande)
- ✏️ Textos do CTA ("Seja um Expositor")

### Sobre o Evento
- ✏️ Estatísticas (participantes, palestrantes, horas)
- ✏️ Todos os textos da seção

---
**Localização:** WordPress Admin → Aparência → Personalizar → [Seção desejada]