Projeto CRUD Laravel e Vue 🚀
Este projeto é uma aplicação full-stack desenvolvida em Laravel (backend) e Vue.js (frontend), seguindo o padrão CRUD (Create, Read, Update, Delete).

Pré-requisitos
Docker instalado

Configuração

Rodar o comando docker compose up -d --build

Assim já será instalado o projeto, e estará disponível na URL [localhost:3000](http://localhost:3000)

Endpoints Disponíveis
Lembrando de adicionar no header:

Content-Type: application/json Accept: application/json

Níveis
Listar Níveis (GET): /api/levels - Retorna a lista de níveis existentes.
Cadastrar Nível (POST): /api/levels - Para o Insomnia / Postman, no header colocar Content-Type: application/json e Accept: application/json. Corpo da Requisição: JSON com campo "level": "Nome do Nível".
Atualizar Nível (PUT): /api/levels/{id} - Corpo da Requisição: JSON com campo "level": "Nome do Nível".
Deletar Nível (DELETE): /api/levels/{id}
Desenvolvedores
Listar Desenvolvedores (GET): /api/developers - Retorna a lista de desenvolvedores existentes.
Cadastrar Desenvolvedor (POST): /api/developers - Corpo da Requisição: JSON com campos "nivel_id": 1, "nome": "Nome do Desenvolvedor", "sexo": "M", "data_nascimento": "1990-01-01", "hobby": "Programação".
Atualizar Desenvolvedor (PUT): /api/developers/{id} - Corpo da Requisição: JSON com campos "nome": "Novo Nome do Desenvolvedor", "hobby": "Violão", "nivel_id": 2, "sexo": "F", "data_nascimento": "1990-01-01".
Deletar Desenvolvedor (DELETE): /api/developers/{id}
Contribuição
Contribuições são bem-vindas Sinta-se à vontade para abrir um pull request com suas alterações.


