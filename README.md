<h1> DESAFIO PHP </h1>

<hr>
<h2> Requisitos </h2>

O projeto foi feito com backend em Laravel como framework, consequentemente, será necessário ter PHP7.+, Composer, Laravel, NPM instalados em sua máqina para executar esse projeto. Para o Banco de Dados, Docker e Docker-Compose são utilizados para a interação. Caso opte por utilizar por utilizar o SO Windows, é necessário ter WSL para rodar o Docker.Caso não tenha PostgreeSql para o PHP 7.3, utilize o comando `sudo apt-get install php7.3-pgsql`. Observação: o .env.example tem as informações para a criação do .env.

<h2> Como Instalar </h2>

Para que as rotinas funcionem, será necessário que use o Cron, no caso do Linux, no terminal dentro da página do projeto, executar o seguinte o comando `crontab -e` (o editor utilizado foi o vim, caso não possua e não consigar acessar, use o comando `sudo apt install vim`) após entrar no editor, em seguida, na ultima linha coloque o seguinte : `* * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1` (o `path-to-your-project` seria o endereço que o seu projeto está. os asteristicos `* * * * *`, são a configuração de quanto em quanto tempo deve rodar o Cron, no caso, está de minuto em minuto). Após adicionar, salve as alterações.

Agora será necessario executar os seguintes comandos: 

* `composer install`

* `composer update`

* `sudo apt install vim `

* `docker-compose up -d` (script para inicializar a base de dados)

* `php artisan migrate`

* `php artisan key:generate`

* `php artisan countries:cron`

* `php artisan serve`

<h2> Interação e Funcionamento </h2>

O projeto foi composto por 2 Rotas principais, `GET` /api/consumeapi (Esta rota no caso é responsável por fazer uma busca no banco de dados que tem suas tabelas criadas pelas migrates, o banco de dados é alimentado por um `GET` na API REST COUNTRIES, https://restcountries.com/v3.1/all, trazendo assim os países disponibilizados pela API, o Cron é uma rotina que neste projeto realiza um comando para constantemente alimentar o Banco de Dados, para verificar seu status após rodar, pode utilizar o `service cron status`, caso ele não execute, utilize o `service cron start` e execute o `service cron status` novamente). 

E pelo `POST` /api/countries/add (Neste caso essa rota realiza a transmissão da informação por JSON, recebendo os seguintes campos:

{
	
    "name" : "",
    
	"officialName" : "",
    
	"nativeName" : "",
    
	"nativeOfficialName" : ""	
    
}

Onde podem ser passadas strings de até 256 caracteres, essas Strings são requisitadas para serem encaminhadas a um novo objeto no Banco de Dados).

Qualquer dica de melhoria ou ideias são muito bem vindas ao projeto :3.
