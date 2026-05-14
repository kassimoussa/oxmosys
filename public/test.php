<?php
echo "<h1>Oxmosys Laravel Project</h1>";
echo "<p>PHP Version: " . phpversion() . "</p>";
echo "<p>Current Time: " . date('Y-m-d H:i:s') . "</p>";
echo "<p>Server: " . $_SERVER['SERVER_SOFTWARE'] ?? 'Unknown' . "</p>";
?>