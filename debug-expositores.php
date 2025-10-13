<?php
echo "<h1>Debug Expositores</h1>";

$expositores_file = __DIR__ . '/data/expositores.json';

echo "<p><strong>Arquivo JSON existe:</strong> " . (file_exists($expositores_file) ? 'SIM' : 'NÃO') . "</p>";

if (file_exists($expositores_file)) {
    $content = file_get_contents($expositores_file);
    $expositores = json_decode($content, true);
    
    echo "<p><strong>JSON válido:</strong> " . ($expositores ? 'SIM' : 'NÃO') . "</p>";
    echo "<p><strong>Número de expositores:</strong> " . count($expositores) . "</p>";
    
    echo "<h2>Expositores e suas imagens:</h2>";
    
    foreach ($expositores as $expositor) {
        echo "<div style='border: 1px solid #ccc; margin: 10px; padding: 10px;'>";
        echo "<h3>{$expositor['nome']}</h3>";
        echo "<p><strong>Imagem:</strong> '{$expositor['imagem']}'</p>";
        
        if (!empty($expositor['imagem'])) {
            $image_path = __DIR__ . '/images/' . $expositor['imagem'];
            $image_exists = file_exists($image_path);
            
            echo "<p><strong>Arquivo existe:</strong> " . ($image_exists ? 'SIM' : 'NÃO') . "</p>";
            echo "<p><strong>Caminho:</strong> {$image_path}</p>";
            
            if ($image_exists) {
                echo "<p><strong>URL da imagem:</strong> <a href='images/{$expositor['imagem']}' target='_blank'>images/{$expositor['imagem']}</a></p>";
                echo "<p><strong>Preview:</strong></p>";
                echo "<img src='images/{$expositor['imagem']}' style='width: 100px; height: 100px; object-fit: cover; border-radius: 50%;'>";
            }
        } else {
            echo "<p><em>Sem imagem definida</em></p>";
        }
        
        echo "</div>";
    }
}
?>