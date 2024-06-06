Projeto CRUD Laravel e Vue 🚀
Este projeto é uma aplicação full-stack desenvolvida em Laravel (backend) e Vue.js (frontend), seguindo o padrão CRUD (Create, Read, Update, Delete).

Pré-requisitos
Antes de começar, certifique-se de ter instalado o Node.js e o Composer em sua máquina.

Configuração
Backend
Navegue até o diretório backend:
cd backend

Instale as dependências do PHP usando o Composer:
composer install

Execute as migrações do banco de dados:
php artisan migrate

Inicie o servidor de desenvolvimento do Laravel:
php artisan serve

Frontend
Após configurar o backend, volte ao diretório raiz do projeto e navegue até o diretório frontend:

Navegue até o diretório frontend:
cd frontend

Instale as dependências do Node.js:
npm install

Compile e reinicie automaticamente o aplicativo para o desenvolvimento:
npm run serve

Endpoints Disponíveis
Níveis
Listar Níveis (GET): /api/levels
Retorna a lista de níveis existentes.
Cadastrar Nível (POST): /api/levels

Para o Insomnia / Postman:
no header colocar:

Content-Type: application/json

Accept: application/json

Corpo da Requisição:
JSON

{
  "level": "Nome do Nível"
}
Código gerado por IA. Examine e use com cuidado. Mais informações em perguntas frequentes.
Atualizar Nível (PUT): /api/levels/{id}
Corpo da Requisição:
JSON

{
  "level": "Nome do Nível"
}
Código gerado por IA. Examine e use com cuidado. Mais informações em perguntas frequentes.
Deletar Nível (DELETE): /api/levels/{id}
Desenvolvedores
Listar Desenvolvedores (GET): /api/developers
Retorna a lista de desenvolvedores existentes.
Cadastrar Desenvolvedor (POST): /api/developers
Corpo da Requisição:
JSON

{
  "nivel_id": 1,
  "nome": "Nome do Desenvolvedor",
  "sexo": "M",
  "data_nascimento": "1990-01-01",
  "hobby": "Programação"
}
Código gerado por IA. Examine e use com cuidado. Mais informações em perguntas frequentes.
Atualizar Desenvolvedor (PUT): /api/developers/{id}
Corpo da Requisição:
JSON

{
  "nome": "Novo Nome do Desenvolvedor",
  "hobby": "Violão",
  "nivel_id": 2,
  "sexo": "F",
  "data_nascimento": "1990-01-01"
}
Código gerado por IA. Examine e use com cuidado. Mais informações em perguntas frequentes.
Deletar Desenvolvedor (DELETE): /api/developers/{id}
Contribuição
Contribuições são bem-vindas! Sinta-se à vontade para abrir um pull request com suas alterações.

Licença
Este projeto está licenciado sob a licença MIT. Consulte o arquivo LICENSE para mais detalhes.