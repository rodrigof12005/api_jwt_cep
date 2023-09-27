# API Cep

Esse projeto é uma APi de busca de ceps onde é informado nos endpoints número do cep ou estado/cidade/bairro onde deseja-se
obter as informações, é realizada uma integração com a API externa ViaCep onde apenas usuários registrados , autenticados nos endpoints
 e com token JWT gerado após o login podem acessar as informações.

#Endpoints

POST localhost:8000/api/register {name=seunome , password=suasenha , email=seuemail}

POST localhost:8000/api/login {email , password}

POST localhost:8000/api/logoff

GET  localhost:8000/api/findCep?cep=numerocepvalido

GET localhost:8000/api/findCepName?cep_state=SIGLA&cep_city=CIDADE&cep_region=BAIRRO 

# Requisitos:
Composer >=2.0 , PHP 8.1 , MYSQL

Após baixar o projeto executar essas etapas

1.Renomear o .env.example para .env e alterar suas configurações
de banco de dados.

2.composer update , php artisan migrate .



Rodrigo Duarte https://www.linkedin.com/in/rodrigo-duarte-461a99165/
