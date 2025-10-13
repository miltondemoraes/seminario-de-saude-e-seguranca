<!DOCTYPE html>
<html>
<head>
    <title>Comparação Admin vs Index</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        .test-section { margin: 30px 0; padding: 20px; border: 2px solid #ccc; }
        .test-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; }
        
        /* CSS do Admin */
        .expositor-logo-admin {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #FFD700 0%, #FFA500 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: #0d0d0d;
            overflow: hidden;
            flex-shrink: 0;
        }
        .expositor-logo-admin img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
        }
        
        /* CSS do Index */
        .exhibitor-logo {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #FFD700 0%, #FFA500 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 2rem;
            color: #0d0d0d;
            overflow: hidden;
        }
        .expositor-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
            display: block;
        }
    </style>
</head>
<body>
    <h1>Teste Comparativo: Admin vs Index</h1>

    <?php
    $expositores_file = __DIR__ . '/data/expositores.json';
    $expositores = [];
    
    if (file_exists($expositores_file)) {
        $content = file_get_contents($expositores_file);
        $expositores = json_decode($content, true) ?: [];
    }
    ?>

    <div class="test-section">
        <h2>Estilo do Admin (funciona):</h2>
        <div class="test-grid">
            <?php foreach ($expositores as $expositor) : ?>
                <div>
                    <h4><?php echo $expositor['nome']; ?></h4>
                    <div class="expositor-logo-admin">
                        <?php if (!empty($expositor['imagem'])) : ?>
                            <img src="images/<?php echo $expositor['imagem']; ?>" alt="<?php echo $expositor['nome']; ?>">
                        <?php else : ?>
                            <i class="<?php echo $expositor['icone'] ?? 'fas fa-building'; ?>"></i>
                        <?php endif; ?>
                    </div>
                    <p>Imagem: <?php echo $expositor['imagem'] ?: 'Vazia'; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="test-section">
        <h2>Estilo do Index (problema):</h2>
        <div class="test-grid">
            <?php foreach ($expositores as $expositor) : ?>
                <div>
                    <h4><?php echo $expositor['nome']; ?></h4>
                    <div class="exhibitor-logo">
                        <?php if (!empty($expositor['imagem'])) : ?>
                            <img src="images/<?php echo htmlspecialchars($expositor['imagem']); ?>" 
                                 alt="<?php echo htmlspecialchars($expositor['nome']); ?>"
                                 class="expositor-image">
                        <?php else : ?>
                            <i class="<?php echo htmlspecialchars($expositor['icone'] ?? 'fas fa-building'); ?>"></i>
                        <?php endif; ?>
                    </div>
                    <p>Imagem: <?php echo $expositor['imagem'] ?: 'Vazia'; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="test-section">
        <h2>Teste direto das imagens:</h2>
        <p>Expositor 1: <img src="images/expositor_1.png" style="width: 50px; height: 50px;"></p>
        <p>Expositor 2: <img src="images/expositor_2.png" style="width: 50px; height: 50px;"></p>
        <p>Expositor 3: <img src="images/expositor_3.png" style="width: 50px; height: 50px;"></p>
    </div>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</body>
</html>