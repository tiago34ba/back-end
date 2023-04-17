# laravel-9-docker-crud-generation
projeto base  Lavel-Docker-Crud-Generation

<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>
<p align="center"></p>

<h1>Comandos artisan</h1>

Artisan é a interface de linha de comando incluída no Laravel. Ele fornece vários comandos úteis que podem ajudá-lo enquanto você cria seu aplicativo. <br>
Personalizamos um comando onde é possível criar toda a estrutura e métodos necessários para um CRUD.<br>

**1. CRUD Generator** <br>
1.1 Na raiz do projeto utilizar o comando

``` 
   php artisan crud:generator NomeDaTabela
``` 
1.2 Comando acima gera um CRUD Básico, com seguintes arquivos: Model, Controller, Service, Repository


# gzlayers CRUD Generator
This package creates a layer structure to organize your laravel projects

More explanatory material available at: 
  - https://cauegonzalez.medium.com/utilizando-uma-arquitetura-de-camadas-no-desenvolvimento-laravel-60b3152d7be9 (portuguese version)

### How to Install
From the root of a laravel project, type the composer command:

```composer require cauegonzalez/gzlayers```


Once installed, the following artisan commands will be available:
```
gzlayers:makebo
gzlayers:makecontroller
gzlayers:makecrud
gzlayers:makemodel
gzlayers:makerepository
gzlayers:makerequest
gzlayers:makeresource
gzlayers:maketrait
```
You can call each one separately or choose the command that does the entire structure at once:

```php artisan gzlayers:makecrud --all```

The makecrud command with **--all** option will read the configured database (.env) and create all the files of the proposed structure for each table found



**2. Estrutura de pastas** <br>
2.1 Diretorio de Controllers fica em:
``` 
   app/Http/Controllers
``` 

OBS: destinada às classes controladoras da aplicação. <br>
Devem estender a classe **app/Http/Controllers/Controller.php**

2.2 Diretorio de Services fica em:
``` 
app/Http/Services
``` 

OBS: destinada às classes de serviços/regras de negócio da aplicação.<br>
Devem estender a classe **app/Http/Services/Service.php**

2.3 Diretorio de Entities fica em:
``` 
app/Models
``` 

OBS: destinada às classes de entidades da aplicação. <br>
após gerar via comandos artisan deve ser editada para completar com as informações de propriedades da tabela.<br>
atributo fillable deve conter campos que serão usados na inserção de novos registros na tabela.<br>
atributo table e sequence possuem o nome do schema do banco de dados. esse valor virá da propriedade DB_USERNAME configurado no .env.<br>
os demais campos devem ser verificados para corrigir alguma inconsistência.<br>

2.4 Diretorio de Repositories fica em:
``` 
app/Repository
``` 

OBS: destinada às classes repositórios da aplicação.

**3. Arquivos importantes** <br>

3.1 **config/app.php**

Arquivo destinado a configurações da sua aplicação: <br>
banco de dados; <br>
cache;<br>

3.2 **routes/api.php**

Arquivo destinado as rotas da sua aplicação.<br>
crud generation preenche esse arquivo com as rotas iniciais para o CRUD. as demais devem ser configuradas pelo desenvolvedor.

<h1>GraphQL</h1>
1. GraphQL Linguagem de API <br>
1.1 GraphQL é uma linguagem de consulta para APIs e um tempo de execução para atender essas consultas com seus dados existentes.
O GraphQL fornece uma descrição completa e compreensível dos dados em sua API. <br>

1.2 Os arquivos graphql referente ao schema, query, type, deve ter extensão **.graphql** <br>

1.3 Schema Principal do GraphQL fica em **routes/graphql/schame.graphql**, nesse arquivo que vai ter a query principal da API.

1.4 Schema os Type que são os modelos de uma tabela, deve conter todos os atributos ou aqueles necessários do modelo, como também o relacionamento entre os Type.
```
type Cartorio {
    id_cartorio: Int!
    no_cartorio_titular: String!
}
```

1.5 Os type devem ficar no diretório **routes/graphql/**. No schema principal (**routes/graphql/schame.graphql**) deve ser feito o import do arquivo.
``` 
    #import pessoa.graphql
```
1.6 Com GraphQL pode ser usado alguns recursos do Eloquet/Laravel, como all(), paginate(), find(), e entre outros.
```
https://lighthouse-php.netlify.com/2.6/api-reference/directives.html
```
1.7 Os arquivos GraphQL devem ficar no diretório **app/Http/GraphQL** como as Queries, Interfaces, Union. <br>
Alguns comandos via artisan pode ser usado para criar.
```
    php artisan lighthouse:query
    php artisan lighthouse:interface
    php artisan lighthouse:union
```
1.8 O GraphQL vem com um playground para que se possa fazer os teste da API, por default ele fica em:
```
    http://127.0.0.1/graphql-playground
```
OBS: O endpoint para consulta é **http://127.0.0.1/graphql**

<h1>Redis</h1>
O Redis é um banco de dados em memória rápido e flexível, que é capaz de armazenar e manipular uma variedade de estruturas de dados. Ele é frequentemente usado como um cache de dados e sistema de mensagens, e pode ser configurado em um cluster para suportar cargas de trabalho de alta disponibilidade e alta escala. <br>
1.1 Uso do Redis é para finalizade colocar alguma consulta em cache, mas é opcional como default está habilitado o uso Memcached

1.2 Para cachear alguma query deve dar o use da dependency
``` 
    use Illuminate\Support\Facades\Cache;
```
1.3 No site oficial segue alguns exemplos de armazenamento
``` 
    https://laravel.com/docs/5.7/cache
```
1.4 Um Exemplo:
``` 
    // Implementação Básica Utilizando o Redis
    return Cache::store('redis')->remember('pessoas', 60, function(){
        $pessoas = Pessoa::all();
        if(Cache::has('pessoas')) {
            return Cache::store('redis')->get('pessoas');
        }
        return $municipios;
    });
    
    // Implementação Básica Utilizando o Memcached
    return Cache::remember('pessoas', 60, function () {
        $pessoas = Pessoa::all();
        if (Cache::has('pessoas')) {
            return Cache::get('pessoas');
        }
        return $pessoas;
    });
```
OBS: **Remember** se passa como parâmetros (nome, tempo)
     **has** verifica a existência do cache
     **get** Traz o retorno do cache

```
```

```
```
1. Instalar o docker-compose, PHP na versão 8.0 e Mysql

2. Docker

2.1 Baixar docker
``` 
  
```
3.2 imagem do php 8.0
``` 
   
```

4. Instalar docker-compose
``` 
   sudo apt install docker-compose
```

5. Execute o comando
``` 
   php composer.phar update
``` 
6. Execute o seguinte comando após atualizar o framework
``` 
    php composer.phar install -vvv
``` 
``` 
    docker-compose up
``` 
7. Acessa a seguinte url:
``` 
    locaohost:8000
``` 

