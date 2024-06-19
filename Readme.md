Projeto CRUD Laravel e Vue.js 🚀

Este projeto é uma aplicação full-stack que utiliza Laravel (backend) e Vue.js (frontend) para implementar um sistema CRUD (Criar, Ler, Atualizar, Excluir) completo.

Recursos:

    Gerenciamento de Níveis: Permite listar, cadastrar, atualizar e excluir níveis.
    Gerenciamento de Desenvolvedores: Permite listar, cadastrar, atualizar e excluir desenvolvedores, associando-os a níveis.

Pré-requisitos:

    Docker

Instalação e Execução:

    Clone o repositório:
    Bash

    git clone https://github.com/Tiagokochem/crud_laravel_vue

    Use o código com cuidado.

Inicie os containers Docker:
Bash

docker compose up -d --build

Use o código com cuidado.

    Acesse a aplicação:
    Abra seu navegador e acesse http://localhost:3000.

Endpoints da API:

Observação: Para todas as requisições, adicione os seguintes headers:

Content-Type: application/json
Accept: application/json

Níveis:

    Listar Níveis (GET): /api/levels
    Cadastrar Nível (POST): /api/levels
        Corpo da requisição (JSON): { "level": "Nome do Nível" }
    Atualizar Nível (PUT): /api/levels/{id}
        Corpo da requisição (JSON): { "level": "Novo Nome do Nível" }
    Excluir Nível (DELETE): /api/levels/{id}

Desenvolvedores:

    Listar Desenvolvedores (GET): /api/developers
    Cadastrar Desenvolvedor (POST): /api/developers
        Corpo da requisição (JSON):
        JSON

        {
          "nivel_id": 1,
          "nome": "Nome do Desenvolvedor",
          "sexo": "M",
          "data_nascimento": "1990-01-01",
          "hobby": "Programação"
        }

        Use o código com cuidado.

Atualizar Desenvolvedor (PUT): /api/developers/{id}

    Corpo da requisição (JSON):
    JSON

    {
      "nome": "Novo Nome do Desenvolvedor",
      "hobby": "Violão",
      "nivel_id": 2,
      "sexo": "F",
      "data_nascimento": "1990-01-01"
    }

    Use o código com cuidado.

    Excluir Desenvolvedor (DELETE): /api/developers/{id}

Contribuição:

Contribuições são muito bem-vindas! Se você encontrar algum problema ou tiver sugestões de melhorias, sinta-se à vontade para abrir uma issue ou enviar um pull request.

Licença:

Este projeto está licenciado sob a licença MIT. Consulte o arquivo LICENSE para obter mais detalhes.