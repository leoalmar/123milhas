# 123Milhas API

Para executar o projeto é necessário ter o **docker** instalado.

Faça o download do projeto a partir do reositório no github:
```sh
git clone https://github.com/leoalmar/123milhas.git
```

Entre no diretório do projeto:
```sh
cd 123milhas
```

Crie o arquivo .env a partir do arquivo .env.example:
```sh
# linux and macOS
cp .env.example .env

# windows
copy .env.example .env
```

Com o docker em execução, rode o comando abaixo para provisionar o ambiente:
```sh
docker-compose up -d
```

Após o o ambiente ser provisionado, execute o comando abaixo para preparar a aplicação:
```sh
docker-compose exec php composer install
```

Execute o comando abaixo para gerar a documentação do Swagger:
```sh
docker-compose exec php php artisan swagger-lume:generate
```

Para acessar a documentação da API, clique no link abaixo:
[http://localhost:8180/api/documentation](http://localhost:8180/api/documentation)
