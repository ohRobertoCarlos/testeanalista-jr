# Requisitos para executar o projeto

* Git
* Docker
* Docker compose

# Passo a Passo para rodar o projeto

1. Clone o repositório.

Via SSH:

~~~shell
    git clone git@github.com:ohRobertoCarlos/testeanalista-jr.git
~~~

Via Https:

~~~shell
    git clone https://github.com/ohRobertoCarlos/testeanalista-jr.git
~~~

2. Entre na pasta testeanalista-jr:
~~~shell
    cd testeanalista-jr/
~~~

3. Crie um arquivo de configuração com o nome **.env** dentro da pasta **www/**, e depos copie o conteudo do arquivo **.env.local** (na pasta www/) para o **.env**.

4. Volte para a pasta raiz do projeto (onde está o arquivo **docker-compose.yml**) e execute o comando abaixo para baixar as imagens e inicializar os conteiners:

~~~shell
    docker-compose up -d
~~~

5. Depois execute o camando abaixo para instalar as dependências do projeto:

~~~shell
    docker-compose exec php-fpm composer install --no-dev
~~~

6. Depois de os conteiners estarem de pé, execute o camando abaixo para dar permissao aos conteiners para manipular os arquivos da pasta **www/**.

~~~shell
    sudo chmod -R 777 www/
~~~
7. Para rodar as migrations execute o comando abaixo:

~~~shell
    docker-compose exec php-fpm php artisan migrate
~~~

8. Se ocorrer algum erro de conexão recusada (Connection refused), o banco de dados Mysql não inicializou ainda. Caso seja a primeira vez que esse container inicializa, ele pode demorar, peço para aguardar um pouco e executar o comando anterior novamente. Se o erro persistir aguarde mais um pouco e tente novamente. É possível ver se o Mysql está pronto para conexões vendo os logs do container.

8. Em seguida é preciso semear o banco de dados, execute o camando abaixo:

~~~shell
    docker-compose exec php-fpm php artisan db:seed --class=AdminSeeder
~~~

9. O último comando, basicamente, foi para fazer um insert de um usuário com permissões de administrador no banco. Acesse o endereço http://localhost:8888 para acessar a aplicação, use as credenciais abaixo para fazer login:

    Email: admin@email.com
    senha: 1234