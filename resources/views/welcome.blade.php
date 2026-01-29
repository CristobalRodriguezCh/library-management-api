<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Library Management API</title>

        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                font-family: 'Inter', sans-serif;
                background: #1a1a2e;
                color: #ddd;
                line-height: 1.7;
            }

            .readme-container {
                max-width: 860px;
                margin: 0 auto;
                padding: 2rem 2rem 4rem;
            }

            /* Headings */
            .readme-container h1 {
                font-size: 2.2rem;
                color: #fff;
                border-bottom: 2px solid #0f3460;
                padding-bottom: 0.5rem;
                margin: 2rem 0 1rem;
            }

            .readme-container h2 {
                font-size: 1.5rem;
                color: #e94560;
                margin: 2rem 0 0.8rem;
                border-bottom: 1px solid #16213e;
                padding-bottom: 0.4rem;
            }

            .readme-container h3 {
                font-size: 1.15rem;
                color: #fff;
                margin: 1.5rem 0 0.5rem;
            }

            .readme-container h4 {
                font-size: 1rem;
                color: #ccc;
                margin: 1.2rem 0 0.4rem;
            }

            /* Paragraphs & lists */
            .readme-container p {
                margin: 0.6rem 0;
                color: #bbb;
            }

            .readme-container ul, .readme-container ol {
                padding-left: 1.5rem;
                margin: 0.5rem 0;
            }

            .readme-container li {
                margin: 0.3rem 0;
                color: #bbb;
            }

            /* Links */
            .readme-container a {
                color: #e94560;
                text-decoration: none;
            }

            .readme-container a:hover {
                text-decoration: underline;
            }

            /* Code blocks */
            .readme-container pre {
                background: #0f0f23;
                border: 1px solid #16213e;
                border-radius: 6px;
                padding: 1rem;
                overflow-x: auto;
                margin: 0.8rem 0;
            }

            .readme-container pre code {
                color: #a9dc76;
                font-family: 'Courier New', monospace;
                font-size: 0.85rem;
                background: none;
                padding: 0;
                border-radius: 0;
            }

            .readme-container code {
                background: #16213e;
                color: #e94560;
                padding: 0.15rem 0.4rem;
                border-radius: 4px;
                font-family: 'Courier New', monospace;
                font-size: 0.85rem;
            }

            /* Tables */
            .readme-container table {
                width: 100%;
                border-collapse: collapse;
                margin: 1rem 0;
            }

            .readme-container th, .readme-container td {
                border: 1px solid #16213e;
                padding: 0.5rem 0.8rem;
                text-align: left;
                font-size: 0.9rem;
            }

            .readme-container th {
                background: #16213e;
                color: #e94560;
                font-weight: 600;
            }

            .readme-container td {
                color: #bbb;
            }

            /* Horizontal rules */
            .readme-container hr {
                border: none;
                border-top: 1px solid #16213e;
                margin: 2rem 0;
            }

            /* Strong & em */
            .readme-container strong {
                color: #fff;
                font-weight: 600;
            }

            .readme-container blockquote {
                border-left: 3px solid #e94560;
                padding-left: 1rem;
                margin: 1rem 0;
                color: #999;
            }
        </style>
    </head>
    <body>
        <div class="readme-container" id="readme-content"></div>

        <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
       <script>
            var readmeContent = `# Library Management API
        
        RESTful API para gestión de biblioteca con autenticación JWT, construida con Laravel 5.1, PostgreSQL y Docker.
        
        ## 📋 Tabla de Contenidos
        
        - [Características](#características)
        - [Tecnologías](#tecnologías)
        - [Requisitos Previos](#requisitos-previos)
        - [Instalación](#instalación)
        - [Configuración](#configuración)
        - [Uso de la API](#uso-de-la-api)
        - [Endpoints](#endpoints)
        - [Arquitectura](#arquitectura)
        - [Testing](#testing)
        
        ## ✨ Características
        
        - ✅ Autenticación JWT (JSON Web Tokens)
        - ✅ CRUD completo de Usuarios, Autores y Libros
        - ✅ Sistema de Events y Jobs para actualización automática de contadores
        - ✅ Exportación de datos a Excel (XLSX)
        - ✅ Soft Deletes con auditoría (created_by, updated_by, deleted_by)
        - ✅ Validaciones con Form Requests
        - ✅ Respuestas JSON consistentes
        - ✅ Arquitectura escalable con Services y Base Classes
        - ✅ Docker para desarrollo y producción
        - ✅ PostgreSQL como base de datos
        
        ## 🛠️ Tecnologías
        
        - **Backend:** Laravel 5.1
        - **Base de Datos:** PostgreSQL 13
        - **Autenticación:** JWT (tymon/jwt-auth 0.5)
        - **Servidor Web:** Nginx
        - **Contenedores:** Docker & Docker Compose
        - **PHP:** 7.1-fpm
        - **Excel Export:** Maatwebsite Excel 2.1
        
        ## 📦 Requisitos Previos
        
        - Docker Desktop instalado
        - Git
        - Cliente HTTP (Postman, Insomnia, o cURL)
        
        ## 🚀 Instalación
        
        ### 1. Clonar el repositorio
        \\\`\\\`\\\`bash
        git clone https://github.com/CristobalRodriguezCh/library-management-api.git
        cd library-management-api
        \\\`\\\`\\\`
        
        ### 2. Levantar los contenedores Docker
        \\\`\\\`\\\`bash
        docker-compose up -d --build
        \\\`\\\`\\\`
        
        Esto construirá e iniciará los siguientes servicios:
        - **app:** Aplicación Laravel (PHP 7.1-FPM)
        - **nginx:** Servidor web (puerto 8000)
        - **db:** PostgreSQL (puerto 5433)
        
        ### 3. Instalar dependencias de Composer
        \\\`\\\`\\\`bash
        docker-compose exec app composer install
        \\\`\\\`\\\`
        
        ### 4. Configurar el archivo .env
        \\\`\\\`\\\`bash
        docker-compose exec app cp .env.example .env
        \\\`\\\`\\\`
        
        Verifica que el \\\`.env\\\` tenga estas configuraciones:
        \\\`\\\`\\\`env
        APP_NAME=LibraryManagementAPI
        APP_ENV=local
        APP_KEY=
        APP_DEBUG=true
        APP_URL=http://localhost:8000
        
        DB_CONNECTION=pgsql
        DB_HOST=db
        DB_PORT=5432
        DB_DATABASE=library_db
        DB_USERNAME=library_user
        DB_PASSWORD=library_pass
        
        CACHE_DRIVER=file
        SESSION_DRIVER=file
        QUEUE_DRIVER=sync
        \\\`\\\`\\\`
        
        ### 5. Generar la clave de la aplicación
        \\\`\\\`\\\`bash
        docker-compose exec app php artisan key:generate
        \\\`\\\`\\\`
        
        ### 6. Generar la clave JWT
        \\\`\\\`\\\`bash
        docker-compose exec app php artisan jwt:generate
        \\\`\\\`\\\`
        
        ### 7. Ejecutar las migraciones
        \\\`\\\`\\\`bash
        docker-compose exec app php artisan migrate
        \\\`\\\`\\\`
        
        ### 8. Configurar permisos
        \\\`\\\`\\\`bash
        docker-compose exec app chmod -R 775 storage bootstrap/cache
        docker-compose exec app chown -R www-data:www-data storage bootstrap/cache
        \\\`\\\`\\\`
        
        ### 9. Verificar instalación
        
        Abre tu navegador en \\\`http://localhost:8000\\\` - Deberías ver la página de bienvenida de Laravel.
        
        ## ⚙️ Configuración
        
        ### Variables de Entorno
        
        | Variable | Descripción | Valor por Defecto |
        |----------|-------------|-------------------|
        | \\\`APP_URL\\\` | URL de la aplicación | \\\`http://localhost:8000\\\` |
        | \\\`DB_HOST\\\` | Host de PostgreSQL | \\\`db\\\` |
        | \\\`DB_PORT\\\` | Puerto de PostgreSQL | \\\`5432\\\` |
        | \\\`DB_DATABASE\\\` | Nombre de la BD | \\\`library_db\\\` |
        | \\\`DB_USERNAME\\\` | Usuario de BD | \\\`library_user\\\` |
        | \\\`DB_PASSWORD\\\` | Contraseña de BD | \\\`library_pass\\\` |
        
        ### Puertos Expuestos
        
        - **8000:** Nginx (Aplicación web)
        - **5433:** PostgreSQL (Base de datos - puerto externo)
        
        ## 📖 Uso de la API
        
        ### Base URL
        \\\`\\\`\\\`
        http://localhost:8000/api/v1
        \\\`\\\`\\\`
        
        ### Autenticación
        
        La API utiliza JWT (JSON Web Tokens) para autenticación. Incluye el token en el header de cada petición:
        \\\`\\\`\\\`
        Authorization: Bearer {tu_token_jwt}
        \\\`\\\`\\\`
        
        ### Flujo de Autenticación
        
        1. **Registrar usuario:** \\\`POST /api/v1/register\\\`
        2. **Login:** \\\`POST /api/v1/login\\\` → Obtener token
        3. **Usar el token** en todas las peticiones protegidas
        
        ## 🔗 Endpoints
        
        ### Autenticación
        
        #### Registro de Usuario
        \\\`\\\`\\\`http
        POST /api/v1/register
        Content-Type: application/json
        
        {
          "name": "Juan Pérez",
          "email": "juan@example.com",
          "password": "password123",
          "password_confirmation": "password123",
          "birth_date": "1990-01-15",
          "role": "user"
        }
        \\\`\\\`\\\`
        
        #### Login
        \\\`\\\`\\\`http
        POST /api/v1/login
        Content-Type: application/json
        
        {
          "email": "juan@example.com",
          "password": "password123"
        }
        \\\`\\\`\\\`
        
        #### Obtener Usuario Autenticado
        \\\`\\\`\\\`http
        GET /api/v1/me
        Authorization: Bearer {token}
        \\\`\\\`\\\`
        
        #### Logout
        \\\`\\\`\\\`http
        POST /api/v1/logout
        Authorization: Bearer {token}
        \\\`\\\`\\\`
        
        ---
        
        ### Usuarios
        
        #### Listar Usuarios
        \\\`\\\`\\\`http
        GET /api/v1/users
        Authorization: Bearer {token}
        \\\`\\\`\\\`
        
        #### Crear Usuario
        \\\`\\\`\\\`http
        POST /api/v1/users
        Authorization: Bearer {token}
        Content-Type: application/json
        
        {
          "name": "María García",
          "email": "maria@example.com",
          "password": "password123",
          "password_confirmation": "password123",
          "birth_date": "1985-05-20",
          "role": "author"
        }
        \\\`\\\`\\\`
        
        #### Ver Usuario
        \\\`\\\`\\\`http
        GET /api/v1/users/{id}
        Authorization: Bearer {token}
        \\\`\\\`\\\`
        
        #### Actualizar Usuario
        \\\`\\\`\\\`http
        PUT /api/v1/users/{id}
        Authorization: Bearer {token}
        Content-Type: application/json
        
        {
          "name": "María García Actualizado",
          "email": "maria.nueva@example.com"
        }
        \\\`\\\`\\\`
        
        #### Eliminar Usuario (Soft Delete)
        \\\`\\\`\\\`http
        DELETE /api/v1/users/{id}
        Authorization: Bearer {token}
        \\\`\\\`\\\`
        
        #### Exportar Usuarios a Excel
        \\\`\\\`\\\`http
        GET /api/v1/users/export
        Authorization: Bearer {token}
        \\\`\\\`\\\`
        
        ---
        
        ### Autores
        
        #### Listar Autores
        \\\`\\\`\\\`http
        GET /api/v1/authors
        Authorization: Bearer {token}
        \\\`\\\`\\\`
        
        #### Crear Autor (Opción 1: Con user_id existente)
        \\\`\\\`\\\`http
        POST /api/v1/authors
        Authorization: Bearer {token}
        Content-Type: application/json
        
        {
          "user_id": 2,
          "biography": "Reconocido autor de novelas históricas"
        }
        \\\`\\\`\\\`
        
        #### Crear Autor (Opción 2: Creando usuario nuevo)
        \\\`\\\`\\\`http
        POST /api/v1/authors
        Authorization: Bearer {token}
        Content-Type: application/json
        
        {
          "user": {
            "name": "Gabriel García Márquez",
            "email": "gabo@example.com",
            "password": "password123",
            "birth_date": "1927-03-06"
          },
          "biography": "Premio Nobel de Literatura 1982"
        }
        \\\`\\\`\\\`
        
        #### Ver Autor
        \\\`\\\`\\\`http
        GET /api/v1/authors/{id}
        Authorization: Bearer {token}
        \\\`\\\`\\\`
        
        #### Actualizar Autor
        \\\`\\\`\\\`http
        PUT /api/v1/authors/{id}
        Authorization: Bearer {token}
        Content-Type: application/json
        
        {
          "biography": "Biografía actualizada del autor"
        }
        \\\`\\\`\\\`
        
        #### Eliminar Autor
        \\\`\\\`\\\`http
        DELETE /api/v1/authors/{id}
        Authorization: Bearer {token}
        \\\`\\\`\\\`
        
        #### Exportar Autores a Excel
        \\\`\\\`\\\`http
        GET /api/v1/authors/export
        Authorization: Bearer {token}
        \\\`\\\`\\\`
        
        ---
        
        ### Libros
        
        #### Listar Libros
        \\\`\\\`\\\`http
        GET /api/v1/books
        Authorization: Bearer {token}
        \\\`\\\`\\\`
        
        #### Crear Libro
        \\\`\\\`\\\`http
        POST /api/v1/books
        Authorization: Bearer {token}
        Content-Type: application/json
        
        {
          "title": "Cien Años de Soledad",
          "description": "Obra maestra del realismo mágico",
          "published_date": "1967-05-30",
          "isbn": "978-0-06-088328-7",
          "author_id": 1
        }
        \\\`\\\`\\\`
        
        **Nota:** Al crear un libro, automáticamente se dispara un Event que ejecuta un Job para actualizar el campo \\\`books_count\\\` del autor.
        
        #### Ver Libro
        \\\`\\\`\\\`http
        GET /api/v1/books/{id}
        Authorization: Bearer {token}
        \\\`\\\`\\\`
        
        #### Actualizar Libro
        \\\`\\\`\\\`http
        PUT /api/v1/books/{id}
        Authorization: Bearer {token}
        Content-Type: application/json
        
        {
          "title": "Cien Años de Soledad - Edición Especial",
          "description": "Descripción actualizada"
        }
        \\\`\\\`\\\`
        
        #### Eliminar Libro
        \\\`\\\`\\\`http
        DELETE /api/v1/books/{id}
        Authorization: Bearer {token}
        \\\`\\\`\\\`
        
        #### Exportar Libros a Excel
        \\\`\\\`\\\`http
        GET /api/v1/books/export
        Authorization: Bearer {token}
        \\\`\\\`\\\`
        
        ---
        
        ## 🏗️ Arquitectura
        
        ### Estructura del Proyecto
        \\\`\\\`\\\`
        library-management-api/
        ├── app/
        │   ├── Events/
        │   │   └── BookCreated.php
        │   ├── Http/
        │   │   ├── Controllers/
        │   │   │   └── Api/
        │   │   │       ├── BaseController.php
        │   │   │       ├── AuthController.php
        │   │   │       ├── UserController.php
        │   │   │       ├── AuthorController.php
        │   │   │       └── BookController.php
        │   │   ├── Requests/
        │   │   └── Middleware/
        │   ├── Jobs/
        │   │   └── UpdateAuthorBooksCount.php
        │   ├── Listeners/
        │   │   └── UpdateAuthorBooksCountListener.php
        │   ├── Services/
        │   │   ├── BaseService.php
        │   │   ├── AuthService.php
        │   │   ├── UserService.php
        │   │   ├── AuthorService.php
        │   │   └── BookService.php
        │   ├── Author.php
        │   ├── Book.php
        │   └── User.php
        ├── database/
        │   └── migrations/
        ├── docker/
        │   └── nginx/
        │       └── default.conf
        ├── Dockerfile
        ├── docker-compose.yml
        └── README.md
        \\\`\\\`\\\`
        
        ### Patrones y Principios
        
        - **Service Layer:** Lógica de negocio separada de controladores
        - **Repository Pattern (implícito):** A través de Eloquent ORM
        - **Single Responsibility:** Cada clase tiene una responsabilidad clara
        - **DRY (Don't Repeat Yourself):** BaseService y BaseController reutilizables
        - **Dependency Injection:** Servicios inyectados en controladores
        - **Event-Driven Architecture:** Events y Jobs para acciones asíncronas
        
        ### Base de Datos
        
        #### Relaciones
        \\\`\\\`\\\`
        users (1) ──── (1) authors (1) ──── (*) books
        \\\`\\\`\\\`
        
        - Un **Usuario** puede ser un **Autor**
        - Un **Autor** pertenece a un **Usuario**
        - Un **Autor** tiene muchos **Libros**
        - Un **Libro** pertenece a un **Autor**
        
        #### Auditoría
        
        Todas las tablas incluyen:
        - \\\`created_at\\\`, \\\`updated_at\\\` (timestamps)
        - \\\`deleted_at\\\` (soft delete)
        - \\\`created_by\\\`, \\\`updated_by\\\`, \\\`deleted_by\\\` (auditoría de usuario)
        
        ## 🐛 Troubleshooting
        
        ### Error de permisos
        \\\`\\\`\\\`bash
        docker-compose exec app chmod -R 775 storage bootstrap/cache
        docker-compose exec app chown -R www-data:www-data storage bootstrap/cache
        \\\`\\\`\\\`
        
        ### Limpiar caché
        \\\`\\\`\\\`bash
        docker-compose exec app php artisan cache:clear
        docker-compose exec app php artisan config:clear
        docker-compose exec app php artisan view:clear
        \\\`\\\`\\\`
        
        ### Recrear contenedores
        \\\`\\\`\\\`bash
        docker-compose down
        docker-compose up -d --build
        \\\`\\\`\\\`
        
        ### Ver logs
        \\\`\\\`\\\`bash
        docker-compose logs -f app
        docker-compose logs -f nginx
        docker-compose logs -f db
        \\\`\\\`\\\`
        
        ## 📝 Notas de Desarrollo
        
        - El proyecto usa Laravel 5.1 por requerimiento de la prueba técnica
        - JWT configurado con tymon/jwt-auth 0.5 (compatible con Laravel 5.1)
        - PostgreSQL en puerto externo 5433 (puerto interno 5432)
        - Los exports de Excel se descargan directamente al hacer GET
        
        ## 👤 Autor
        
        **Cristobal Canto**
        - GitHub: [@CristobalRodriguezCh](https://github.com/CristobalRodriguezCh)
        - Email: cantoniorodriguez2307@gmail.com
        
        ---
        
        **Desarrollado con ❤️ usando Laravel, Docker y PostgreSQL BY CR**`;
                    document.getElementById('readme-content').innerHTML = marked.parse(readmeContent);
        </script>
        </body>
</html>
