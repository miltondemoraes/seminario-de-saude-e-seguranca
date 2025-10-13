<!DOCTYPE html>
<html>
<head>
    <title>Teste Imagens Expositores</title>
    <style>
        .test-image {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 50%;
            border: 2px solid #ccc;
            margin: 10px;
        }
    </style>
</head>
<body>
    <h1>Teste de Imagens dos Expositores</h1>
    
    <h2>Teste direto das imagens:</h2>
    <img src="images/expositor_1.png" class="test-image" alt="Expositor 1">
    <img src="images/expositor_2.png" class="test-image" alt="Expositor 2">
    <img src="images/expositor_3.png" class="test-image" alt="Expositor 3">
    
    <h2>Como deveria aparecer no site:</h2>
    <?php
    $expositores_file = __DIR__ . '/data/expositores.json';
    if (file_exists($expositores_file)) {
        $expositores = json_decode(file_get_contents($expositores_file), true);
        
        foreach ($expositores as $expositor) {
            if (!empty($expositor['imagem'])) {
                echo "<div style='margin: 20px; padding: 10px; border: 1px solid #ddd;'>";
                echo "<h3>{$expositor['nome']}</h3>";
                echo "<div style='width: 80px; height: 80px; background: linear-gradient(135deg, #FFD700 0%, #FFA500 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; overflow: hidden;'>";
                echo "<img src='images/{$expositor['imagem']}' style='width: 100%; height: 100%; object-fit: cover; border-radius: 50%;'>";
                echo "</div>";
                echo "</div>";
            }
        }
    }
    ?>
</body>
</html>