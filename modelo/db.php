<?php
function connection(){
	$config = include('config.php');
	try {
		
	    // Configuración del data source name || Datos beta:: localhost :: ucm_visor_database :: utf8
	    $dsn = "mysql:host={$config['host']};dbname={$config['dbname']};charset={$config['charset']}";
	    // configuracion options para phpdataobjects
	    $options = [
	        // modo de excepciones para phpdataobjects
	        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
	        // los resultados de las consultas son devueltas en arrays
	        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
	        // sentencias enviadas para procesamiento por bbdd de manera nativa (seguridad)
	        PDO::ATTR_EMULATE_PREPARES => false,
	    ];
	    // instancia pdo
	    $pdo = new PDO($dsn, $config['user'], $config['password'], $options);
	    return $pdo;
	} catch (PDOException $e) {
	    error_log($e->getMessage(), 3, 'errors_connection.log');
	    die('Error al conectar con la base de datos');
	}
}
?>