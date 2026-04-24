<?php

declare(strict_types=1);

namespace App\Http;

class Router
{

      //url completa do projeto (a raiz)
      private string $url = '';

      //Atributo responsável por armazenar o prefixo das rotas (auth, admin, etc)
      private string $prefix = '';

      //Indice das rotas
      private array $routes = [];

      //Instancecia de Request
      private Request $request;

      //===============================METODOS==================================

      public function __construct(string $url)
      {
            $this->url = $url;
            $this->request = new Request();
            $this->setPrefix();
      }
}