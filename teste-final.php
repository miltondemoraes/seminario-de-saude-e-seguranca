<!DOCTYPE html>
<html>
<head>
    <title>TESTE FINAL - Expositores</title>
    <style>
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
        .test-card {
            display: inline-block;
            margin: 20px;
            text-align: center;
            border: 1px solid #ddd;
            padding: 20px;
        }
    </style>
</head>
<body>
    <h1>TESTE FINAL - Como deveria aparecer no site</h1>

    <?php
    $expositores_file = __DIR__ . '/data/expositores.json';
    if (file_exists($expositores_file)) {
        $expositores = json_decode(file_get_contents($expositores_file), true);
        
        foreach ($expositores as $expositor) {
            echo '<div class="test-card">';
            echo '<h3>' . $expositor['nome'] . '</h3>';
            echo '<div class="exhibitor-logo">';
            
            if (!empty($expositor['imagem'])) {
                echo '<img src="images/' . $expositor['imagem'] . '" ';
                echo 'alt="' . $expositor['nome'] . '" ';
                echo 'style="width: 100%; height: 100%; object-fit: cover; border-radius: 50%;">';
            } else {
                echo '<i class="' . ($expositor['icone'] ?? 'fas fa-building') . '"></i>';
            }
            
            echo '</div>';
            echo '<p>' . $expositor['descricao'] . '</p>';
            echo '<div style="background: #FFD700; color: #0d0d0d; padding: 5px 15px; border-radius: 20px; font-size: 0.875rem; font-weight: 600; text-align: center; width: fit-content; margin: 0 auto;">';
            echo $expositor['stand'];
            echo '</div>';
            echo '</div>';
        }
    }
    ?>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <hr>
    <h2>Debug Info:</h2>
    <p><strong>Arquivo JSON existe:</strong> <?php echo file_exists($expositores_file) ? 'SIM' : 'NÃO'; ?></p>
    <p><strong>Imagens:</strong></p>
    <ul>
        <li>expositor_1.png existe: <?php echo file_exists(__DIR__ . '/images/expositor_1.png') ? 'SIM' : 'NÃO'; ?></li>
        <li>expositor_2.png existe: <?php echo file_exists(__DIR__ . '/images/expositor_2.png') ? 'SIM' : 'NÃO'; ?></li>
        <li>expositor_3.png existe: <?php echo file_exists(__DIR__ . '/images/expositor_3.png') ? 'SIM' : 'NÃO'; ?></li>
    </ul>
</body>
</html>