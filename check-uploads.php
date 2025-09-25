<?php
/**
 * Script temporário para verificar permissões de upload
 * REMOVER APÓS RESOLVER O PROBLEMA DE UPLOAD
 */

// Incluir WordPress
$wp_root = dirname(__FILE__) . '/../../..'; // Ajustar conforme estrutura
if (file_exists($wp_root . '/wp-load.php')) {
    require_once($wp_root . '/wp-load.php');
}

echo "<h2>Diagnóstico de Upload - Seminário AV</h2>";

// Verificar diretório de uploads
$upload_dir = wp_upload_dir();

echo "<h3>Informações do Diretório de Upload:</h3>";
echo "<pre>";
print_r($upload_dir);
echo "</pre>";

// Verificar permissões
echo "<h3>Status das Permissões:</h3>";
echo "<ul>";
echo "<li>Diretório base existe: " . (file_exists($upload_dir['basedir']) ? 'SIM' : 'NÃO') . "</li>";
echo "<li>Diretório base é gravável: " . (is_writable($upload_dir['basedir']) ? 'SIM' : 'NÃO') . "</li>";
echo "<li>Diretório atual existe: " . (file_exists($upload_dir['path']) ? 'SIM' : 'NÃO') . "</li>";
echo "<li>Diretório atual é gravável: " . (is_writable($upload_dir['path']) ? 'SIM' : 'NÃO') . "</li>";
echo "</ul>";

// Tentar criar arquivo de teste
$test_file = $upload_dir['path'] . '/test-upload.txt';
$test_content = 'Teste de escrita: ' . date('Y-m-d H:i:s');

echo "<h3>Teste de Escrita:</h3>";
if (file_put_contents($test_file, $test_content)) {
    echo "<p style='color: green;'>✅ Teste de escrita bem-sucedido!</p>";
    // Limpar arquivo de teste
    unlink($test_file);
} else {
    echo "<p style='color: red;'>❌ Falha no teste de escrita</p>";
    echo "<p>Erro possível: Permissões insuficientes ou diretório não existe</p>";
}

// Informações do servidor
echo "<h3>Configurações do Servidor:</h3>";
echo "<ul>";
echo "<li>upload_max_filesize: " . ini_get('upload_max_filesize') . "</li>";
echo "<li>post_max_size: " . ini_get('post_max_size') . "</li>";
echo "<li>max_execution_time: " . ini_get('max_execution_time') . "</li>";
echo "<li>memory_limit: " . ini_get('memory_limit') . "</li>";
echo "</ul>";

// Verificar se .htaccess existe
$htaccess_path = ABSPATH . '.htaccess';
echo "<h3>Arquivo .htaccess:</h3>";
echo "<p>Existe: " . (file_exists($htaccess_path) ? 'SIM' : 'NÃO') . "</p>";
if (file_exists($htaccess_path)) {
    echo "<p>É gravável: " . (is_writable($htaccess_path) ? 'SIM' : 'NÃO') . "</p>";
}

echo "<hr>";
echo "<p><strong>Instruções:</strong></p>";
echo "<ol>";
echo "<li>Se o diretório não é gravável, defina permissões 755 ou 775 para a pasta wp-content/uploads</li>";
echo "<li>No Windows XAMPP/WAMP, verifique se o Apache tem permissões de escrita</li>";
echo "<li>Após resolver, remova este arquivo (check-uploads.php)</li>";
echo "</ol>";
?>