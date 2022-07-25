<h1> POSTMETRIA DESAFIO PHP </h1>

<hr>
<h2> Requisitos </h2>

O projeto foi feito com se backend em Laravel como framework, consequentemente, será necessário ter PHP7.+, Composer, Laravel, NPM instalados em sua máqina para executar esse projeto. Para o Banco de Dados, Docker e Docker-Compose são utilizados para a interação. Caso opte por utilizar por utilizar o SO Windows, é necessário ter WSL para rodar o Docker.Caso não tenha PostgreeSql para o PHP 7.3, utilize o comando "sudo apt-get install php7.3-pgsql".

<h2> Como Instalar </h2>

Para que as rotinas funcionem, será necessário que use o Cron, no caso do Linux, no terminal dentro da página do projeto, executar o seguinte o comando "crontab -e", em seguida, na ultima linha "* * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1"

Agora será necessario baixar e instalar: 

* composer install

* composer update

* docker-composer up -d

* php artisan migrate

* php artisan key:generate

* php artisan countries:cron

* php artisan serve

<h2> Intração e Funcionamento </h2>

O projeto foi composto por 2 Rotas principais, GET /api/consumeapi (Esta rota no caso é responsável por fazer uma busca no banco de dados que tem suas tabelas criadas pelas migrates, o banco de dados é alimentado por um GET na API REST COUNTRIES, https://restcountries.com/v3.1/all, trazendo assim os países disponibilizados pela API, o Cron é uma rotina que neste projeto realiza um comando para constantemente alimentar o Banco de Dados). 

E pelo POST /api/countries/add (Neste caso essa rota realiza a transmissão da iformação por JSON, recebendo os seguintes campos:

{
	
    "name" : "",
    
	"officialName" : "",
    
	"nativeName" : "",
    
	"nativeOfficialName" : ""	
    
}

Onde podem ser passadas strings de até 256 caracteres, essas Strings são requisitadas para serem encaminhadas a um novo objeto no Banco de Dados).

Qualquer dica de melhoria ou ideias são muito bem vindas ao projeto :3.
