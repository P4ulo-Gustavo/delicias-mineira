<?php

namespace App\Model;

class Envronment{
    
    /**Esta função serve para carregar as variáveis de ambiente do arquivo .env para o sistema
    * @param string $directory
    * @return void
    */
    public static function loadEnv(string $direcryenv): bool{
        if (!file_exists($direcryenv . '/.env')){
            return false;
        }

        $lines = file($direcryenv . '/.env');

        foreach ($lines as $line){

            putenv(trim($line));
        }
        return true;
    }
}

