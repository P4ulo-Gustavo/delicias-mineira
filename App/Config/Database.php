<?php

declare(strict_types=1);

namespace App\Config;

//Chamando as classes necessárias para o funcionamento do código
use PDO;
use PDOException;
use RuntimeException;

class Database {
    private string $db_host;
    private string $db_user;
    private string $db_pass;
    private string $db_name;
    private string $db_port;
    private ?PDO $connection = null;


    public function __construct(string $db_host,string $db_user,string $db_pass,string $db_name,string $db_port = '3306') {
        //Declaração de atributos
        $this->db_host = $db_host;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_name = $db_name;
        $this->db_port = $db_port;
    }

    public function getConnection(): PDO{

        //Verificando se já existe uma conexão estabelecida
        if ($this->connection === null) {
            $this->connection = $this->createConnection();
        }
        return $this->connection;
    }

    private function createConnection(): PDO {

        $dsn = "mysql:host=$this->db_host;dbname=$this->db_name;charset=utf8mb4;port=$this->db_port";

        $options_pdo = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,            //Lança as exceções de Erro, ao invés de suprimir
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,      //Retorna as colunas das tabelas em formato de array associativo
            PDO::ATTR_EMULATE_PREPARES => false,                    //Faz com que o PDO não emule prepared statements, utilizando o prepared statement nativo do banco de dados
        ];

        try{
            return new PDO($dsn, $this->db_user, $this->db_pass, $options_pdo);       //Retorna a conexão com o banco de dados
        } catch(PDOException $erro){
            throw new RuntimeException($erro->getMessage());;      //Retorna a mensagem de erro e o stack trace
        }
    }

    public function disconnect() {
        $this->connection = null;
    }


}
