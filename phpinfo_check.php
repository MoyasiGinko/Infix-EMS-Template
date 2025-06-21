<?php
echo "PHP Version: " . PHP_VERSION . "\n";
echo "PHP CLI: " . PHP_BINARY . "\n";
echo "Server Software: " . $_SERVER['SERVER_SOFTWARE'] ?? 'CLI' . "\n";
echo "Document Root: " . $_SERVER['DOCUMENT_ROOT'] ?? 'N/A' . "\n";
phpinfo();
?>
