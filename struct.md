========================ESTRUTURA DO PROJETO========================

/App/
    /common/
        Environtment.php                            // Classe para carregar variáveis de ambiente
        Session.php                                 // Classe para gerenciar sessões
    /Controller/
        /Pages/                                     // Arquivos de visualização de páginas
    /Http/
        /Router.php                                 // Classe para gerenciar rotas
        /Request.php                                // Classe para capturar e validar requisições
        /Response.php                               // Classe para retornar respostas
        /AuthControllerRouter.php                   // Classe para rotear requisições de autenticação
    /Model/
        /Entity/
            /User.php                               // Classe para gerenciar usuarios
            /Organization.php                       // Classe para gerenciar organizações
    /Config/
        /Database.php                               // Classe para gerenciar conexão com o banco de dados
    /Repository/
        /AuthRepository.php                         // Classe para gerenciar requisições ao banco de dados
    /resources/
        /view/
        /assets/
            /css/
            /js/
            /images/
    /public/
        index.php                                   // Arquivo de entrada para requisições
        .htaccess                                   // Arquivo para configurar o servidor web

/vendor/
    /vendor/autoload.php
    /composer/


/composer.json
/composer.lock
/.htaccess
.env                                            // Arquivo para configurar variáveis de ambiente
.env.example                                    // Arquivo de exemplo para variáveis de ambiente
.gitignore                                      // Arquivo para configurar o git
struct.md                                       // Arquivo para estruturar o projeto -- Este arquivo que esta lendo agora!





====================================================================