<?php
echo "<h1>✅ Port 8080 - Laravel Oxmosys</h1>";
echo "<p>✅ PHP fonctionne : " . phpversion() . "</p>";
echo "<p>✅ Serveur : " . ($_SERVER['SERVER_SOFTWARE'] ?? 'Unknown') . "</p>";
echo "<p>✅ IP WSL : " . ($_SERVER['SERVER_ADDR'] ?? 'Unknown') . "</p>";
echo "<p>✅ Accès depuis : " . ($_SERVER['REMOTE_ADDR'] ?? 'Unknown') . "</p>";
echo "<hr>";
echo "<p><a href='http://localhost:8081/test-port.php'>🗄️ Tester phpMyAdmin (Port 8081)</a></p>";
?>