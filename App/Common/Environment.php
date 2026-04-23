<?php

namespace App\Common;

class Environment{
    
    /**Esta função serve para carregar as variáveis de ambiente do arquivo .env para o sistema
    * @param string $directory
    * @return void
    */
    public static function loadEnv(string $direnv): bool{
        if (!file_exists($direnv . '/.env')){
            return false;
        }

        $lines = file($direnv . '/.env');

        foreach ($lines as $line){

            putenv(trim($line));
        }
        return true;
    }
}

