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

Após o ambiente ser provisionado, execute o comando abaixo para preparar a aplicação:
```sh
docker-compose exec php composer install
```

Execute o comando abaixo para gerar a documentação do Swagger:
```sh
docker-compose exec php php artisan swagger-lume:generate
```

Para acessar a documentação da API, clique no link abaixo:
[http://localhost:8180/api/documentation](http://localhost:8180/api/documentation)

Para visualizar o resultado acesse o seguinte link: [http://localhost:8180/v1/groups](http://localhost:8180/v1/groups)

O resultado será parecido com o json abaixo:
```json
{
    "totalFlights": 15,
    "totalGroups": 10,
    "cheapestPrice": 200,
    "cheapestGroup": "451153ae407916549842f56f8f2a41c8755975ec",
    "groups": [
        {
            "uniqueId": "451153ae407916549842f56f8f2a41c8755975ec",
            "totalPrice": 200,
            "outbound": [1,2,3],
            "inbound": [9,10]
        }
    ],
    "flights": [
        {
            "id": 1,
            "cia": "GOL",
            "fare": "1AF",
            "flightNumber": "G3-1701",
            "origin": "CNF",
            "destination": "BSB",
            "departureDate": "29/01/2021",
            "arrivalDate": "29/01/2021",
            "departureTime": "07:40",
            "arrivalTime": "09:00",
            "classService": 3,
            "price": 50,
            "tax": 36,
            "outbound": 1,
            "inbound": 0,
            "duration": "1:20"
        }
    ]
}
```
