<?php

declare(strict_types=1);

namespace App\Http;

class Response
{

      /**
       * Atributo responsável por armazenar o HTTP code, código do status da resposta
       */
      private int $httpCode;

      /**Atributo responsável por armazenar o conteúdo da resposta
       * 
       */
      private mixed $content;

      /**Atributo responsável por armazenar o cabeçalho da resposta
       * 
       */
      private array $headers = [];

      /**
       * Atributo responsável por armazenar o tipo de conteúdo da resposta
       */
      private string $contentType = 'text/tml';


      //============================CONSTRUCT============================

      //Método responsávl por iniciar a classe e definir os valores
      //Parametros:
      // $httpCode: Código do status da resposta
      // $content: Conteúdo do response
      // $contentType: Tipo de conteúdo retornado
      public function __construct(int $httpCode, string $content, $contentType = 'text/html')
      {
            $this->httpCode = $httpCode;
            $this->content = $content;
            $this->setContentType($contentType);
      }

      //============================ MÉTODOS SETTER'S ============================

      //Método responsável por definir o tipo de contúdo
      public function setContentType($contentType)
      {
            $this->contentType = $contentType;
            $this->addHeader('Content-Type', $contentType);
      }

      //Método responsável por adicionar um novo cabeçalho
      //Parâmetros:
      // $key: Chave do cabeçalho
      // $value: Valor do cabeçalho
      public function addHeader($key, $value)
      {
            $this->headers[$key] = $value;
      }

      //============================ MÉTODOS SEND RESPONSE'S ============================
      //Método responsável por enviar a resposta ao cliente
      public function sendResponse()
      {

            //enviando os headers
            $this->sendHeaders();

            //imprimindo o conteúdo
            switch ($this->contentType) {
                  case 'text/html':
                        echo $this->content;
                        exit;
            }
      }

      //Metodo responsavel por enviar os headers
      private function sendHeaders()
      {
            //enviando o code de status
            http_response_code($this->httpCode);

            //Enviando os headers
            foreach ($this->headers as $key => $value) {
                  header($key . ': ' . $value);
            }
      }


}