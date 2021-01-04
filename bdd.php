<?php
$host = 'localhost';
$dbname = 'bddtest';
$username = 'root';
$password = '';

$bddinfo = $host . ':' . $dbname;
$table = "users";

echo ' la table ' . $table . ' (' . $bddinfo . ')';

?>