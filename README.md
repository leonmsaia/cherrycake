# Cherrycake

Proyecto base de CakePHP 5.1 con base de datos SQLite y entorno Dockerizado.

## Autor
- Leon. M. Saia
- leonmsaia@gmail.com
- +54 11 2374 7372

## 🧰 Requisitos

- Docker
- Docker Compose
- Git Bash, PowerShell o Terminal compatible

## 🚀 Instalación y puesta en marcha

1. Clonar el repositorio

```bash
git clone https://github.com/leonmsaia/cherrycake.git
cd cherrycake
```

2. Crear la base de datos SQLite

```bash
mkdir -p database
touch database/database.sqlite
chmod 666 database/database.sqlite
```

3. Levantar el entorno Docker

```bash
docker compose up -d --build
```

4. Acceder

http://localhost:8080

## 🧪 Comandos útiles

```bash
docker exec -it cakephp_app php bin/cake.php migrations migrate
docker exec -it cakephp_app php bin/cake.php bake migration CreateUsers name:string email:string
```

## 📁 Estructura del proyecto
```bash
cherrycake/
├── cherrycake/              → App CakePHP
├── database/
│   └── database.sqlite      → Base SQLite
├── docker/
│   └── php/
│       └── Dockerfile       → Custom PHP Image
├── docker-compose.yml
├── .dockerignore
├── .gitignore
├── README.md
└── LICENSE
```
## 📄 Licencia

MIT License.
