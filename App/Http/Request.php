<?php
declare(strict_types=1);

namespace App\Http;

class Request {

    //==============================ATRIBUTOS====================================

    /**
     * Responsável por captar o método HTTP utilizado (GET, POST, PUT, DELETE)
     * @var string
     */
    private string $httpMethod;

    /**
     * Responsável por armazenar a URI da página :
     * EX: /pagina/pagina
     * @var string
     */
    private string $uri;

    /**
     * Responsável por armazenar os parametros da query string:
     * EX: /pagina/perfil?nome=paulo&idade=19
     * os parametros nome e idade foram passados como endereçamento para um modelo, tipo perfil, de forma que a variável "idade" não será enviada para o modelo "perfil"
     * @var array
     */
    private array $queryParams = [];

    /**
     * Responsável por armazenar os parâmetros do corpo da requisição:
     * EX: JSON, Form Data
     * @var array
     */
    private array $postVars = [];

    /**
     * Responsável por armazenar os Headers da requisição
     * EX: endereços, informações do cabeçalho e etc.
     * @var array
     */
    private array $headers = [];

    //=========================CONSTRUTOR===========================
    public function __construct(){
        $this->queryParams = $_GET ?? [];                                   //Representa um array de variáveis passadas pela URL
        $this->postVars = $_POST ?? [];                                     //Representa um array de variáveis passadas pelo corpo da requisição
        $this->headers = getallheaders() ?? [];                             //Representa um array de variáveis passadas pelo cabeçalho da requisição
        $this->httpMethod = $_SERVER['REQUEST_METHOD'] ?? '';               //Representa o método HTTP utilizado
        $this->uri = $_SERVER['REQUEST_URI'] ?? '';                         //Representa a URI da página
    }


    //============================GETTERS==============================


    public function getHttpMethod():string {
        return $this->httpMethod;
    }

    public function getUri():string {
        return $this->uri;
    }

    public function getQueryParams():array {
        return $this->queryParams;
    }

    public function getPostVars():array {
        return $this->postVars;
    }

    public function getHeaders():array {
        return $this->headers;
    }
    

}