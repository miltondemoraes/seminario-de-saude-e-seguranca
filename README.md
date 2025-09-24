# Seminário de Saúde e Segurança no Audiovisual
## Landing Page

Esta é uma landing page completa para o evento "Seminário de Saúde e Segurança no Audiovisual", desenvolvida com HTML5, CSS3 e JavaScript vanilla.

## 🎨 Design e Cores
- **Cores principais**: Amarelo (#FFD700) e Preto (#1a1a1a)
- **Design**: Moderno e responsivo
- **Tipografia**: Inter (Google Fonts)
- **Ícones**: Font Awesome 6

## 📱 Recursos Implementados

### ✅ Layout Responsivo
- Design adaptável para desktop, tablet e mobile
- Menu mobile com hambúrguer
- Grid flexível e breakpoints otimizados

### ✅ Seções da Página
1. **Header** - Navegação fixa com logo e menu
2. **Hero Section** - Chamada principal com informações do evento
3. **Sobre o Evento** - Descrição e estatísticas
4. **Programação** - Timeline com horários das palestras
5. **Palestrantes** - Cards dos especialistas
6. **Cadastro** - Formulário de inscrição gratuita
7. **Footer** - Informações de contato e redes sociais

### ✅ Funcionalidades
- **Formulário de cadastro** completo com validação
- **Validação em tempo real** dos campos
- **Formatação automática** de telefone
- **Modal de sucesso** após cadastro
- **Smooth scrolling** entre seções
- **Animações CSS** suaves
- **Menu mobile** funcional

### ✅ Validações do Formulário
- Campos obrigatórios marcados com *
- Validação de email
- Validação de telefone brasileiro
- Validação de nome (apenas letras)
- Checkbox de termos obrigatório
- Mensagens de erro personalizadas
- Estados visuais (erro/sucesso)

## 🚀 Como Visualizar

### Método 1: Abrir diretamente no navegador
1. Navegue até a pasta do projeto
2. Clique duas vezes no arquivo `index.html`
3. O arquivo será aberto no seu navegador padrão

### Método 2: Usando um servidor local (recomendado)
```bash
# Usando Python 3
python -m http.server 8000

# Usando Node.js (se tiver npx instalado)
npx http-server
```

## 📁 Estrutura de Arquivos
```
Seminario/
├── index.html          # Página principal
├── css/
│   └── style.css       # Estilos CSS
├── js/
│   └── script.js       # JavaScript funcional
├── fonts/              # Fontes personalizadas (se necessário)
└── images/             # Imagens do projeto
```

## 🎯 Características Técnicas

### HTML
- Estrutura semântica
- Meta tags para SEO e responsividade
- Acessibilidade com labels e ARIA
- Links para fontes externas (Google Fonts, Font Awesome)

### CSS
- Variáveis CSS para consistência de cores
- Flexbox e CSS Grid para layouts
- Animações e transições suaves
- Media queries para responsividade
- Estados de hover e foco
- Gradientes nas cores principais

### JavaScript
- ES6+ (const/let, arrow functions)
- Event listeners organizados
- Validação de formulário robusta
- Formatação de dados (telefone)
- Modal dinâmico de sucesso
- Smooth scrolling
- Menu mobile funcional

## 🎨 Paleta de Cores Utilizada
- **Amarelo Principal**: #FFD700
- **Amarelo Escuro**: #FFA500
- **Amarelo Accent**: #FFED4A
- **Preto Principal**: #1a1a1a
- **Preto Claro**: #2d2d2d
- **Branco**: #ffffff
- **Cinza Claro**: #cccccc
- **Texto Escuro**: #333333

## 📱 Breakpoints Responsivos
- **Desktop**: > 768px
- **Tablet**: 768px - 480px
- **Mobile**: < 480px

## ✨ Animações e Efeitos
- Fade in up para seções
- Hover effects nos cards e botões
- Loading state no formulário
- Smooth scrolling entre seções
- Transições suaves nos elementos interativos

## 🔧 Personalização

Para personalizar o evento, edite as seguintes informações no `index.html`:

1. **Data do evento**: Linha ~65 (seção hero)
2. **Local**: Linha ~70 (seção hero)
3. **Programação**: Seção `program-timeline` (linhas ~150-200)
4. **Palestrantes**: Seção `speakers-grid` (linhas ~220-280)
5. **Informações de contato**: Footer (linhas ~380-400)

---