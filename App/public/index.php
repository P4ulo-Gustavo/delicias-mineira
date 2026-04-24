<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Config\Database;
use App\Common\Environment;

//invocando as envs no projeto
Environment::loadEnv(__DIR__ . '/../../');


//Carregando as credenciais
$env = getenv();

if (!empty($env)) {
    $database = new Database(
        $env['DB_HOST'],
        $env['DB_USERNAME'],
        $env['DB_PASSWORD'],
        $env['DB_DATABASE']
    );

    try {
        $pdo_connection = $database->getConnection();

        if ($pdo_connection instanceof PDO) {
            echo "Conexão estabelecida com sucesso!";
        }
    } catch (PDOException $exception) {
        echo "Error: " . $exception->getMessage();
    }
} else {
    echo "As variáveis de ambiente não foram carregadas!";
}

