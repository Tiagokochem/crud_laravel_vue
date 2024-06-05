# Script para iniciar Docker Compose, acessar o container backend, instalar dependências do Composer e rodar as migrations

# Defina o nome do serviço do backend no docker-compose.yml
$backendService = "backend"

# Inicia os containers definidos no docker-compose.yml
Write-Output "Starting Docker Compose..."
docker-compose up -d

# Obtém o ID do container do backend
$containerId = docker-compose ps -q $backendService

# Verifica se o container está em execução
if ([string]::IsNullOrEmpty($containerId)) {
    Write-Output "Backend container not found or not running."
    exit 1
}

# Acessa o container do backend e executa o composer install
Write-Output "Running composer install inside the backend container..."
docker exec -it $containerId composer install

# Executa as migrations dentro do container do backend
Write-Output "Running migrations inside the backend container..."
docker exec -it $containerId php artisan migrate

Write-Output "Setup completed successfully."