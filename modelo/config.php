<?php
$env = parse_ini_file(trim("../access.env"));  
return [
    'host' => $env['DB_HOST'] ?? 'localhost',
    'dbname' => $env['DB_NAME'] ?? '',
    'user' => $env['DB_USER'] ?? '',
    'password' => $env['DB_PASSWORD'] ?? '',
    'charset' => $env['DB_CHARSET'] ?? 'utf8'
];
?>