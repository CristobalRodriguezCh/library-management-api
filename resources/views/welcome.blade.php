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

            .readme-container a {
                color: #e94560;
                text-decoration: none;
            }

            .readme-container a:hover {
                text-decoration: underline;
            }

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

            .readme-container hr {
                border: none;
                border-top: 1px solid #16213e;
                margin: 2rem 0;
            }

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

            .badge {
                display: inline-block;
                background: #16213e;
                color: #a9dc76;
                padding: 0.2rem 0.6rem;
                border-radius: 4px;
                font-size: 0.8rem;
                margin: 0.2rem 0.3rem 0.2rem 0;
                font-family: 'Courier New', monospace;
            }

            .badge-method {
                font-weight: 600;
                min-width: 50px;
                text-align: center;
            }

            .badge-method.post { background: #2d4a22; color: #a9dc76; }
            .badge-method.get { background: #1a3a4a; color: #78dce8; }
            .badge-method.put { background: #4a3a1a; color: #ffd866; }
            .badge-method.delete { background: #4a1a1a; color: #ff6188; }

            .endpoint-block {
                background: #0f0f23;
                border: 1px solid #16213e;
                border-radius: 6px;
                padding: 1rem;
                margin: 0.8rem 0;
            }

            .endpoint-block .url {
                color: #ffd866;
                font-family: 'Courier New', monospace;
                font-size: 0.9rem;
            }

            .endpoint-block .header {
                color: #78dce8;
                font-family: 'Courier New', monospace;
                font-size: 0.85rem;
            }

            .endpoint-block .json {
                color: #a9dc76;
                font-family: 'Courier New', monospace;
                font-size: 0.85rem;
                margin-top: 0.5rem;
            }

            .tech-list {
                list-style: none;
                padding-left: 0;
            }

            .tech-list li {
                padding: 0.3rem 0;
            }

            .feature-list {
                list-style: none;
                padding-left: 0;
            }

            .feature-list li {
                padding: 0.2rem 0;
            }

            .note-box {
                background: #16213e;
                border-left: 3px solid #ffd866;
                padding: 0.8rem 1rem;
                margin: 0.8rem 0;
                border-radius: 0 6px 6px 0;
                color: #bbb;
                font-size: 0.9rem;
            }

            .section-divider {
                border: none;
                border-top: 1px solid #16213e;
                margin: 2.5rem 0;
            }

            .footer {
                text-align: center;
                margin-top: 3rem;
                padding-top: 1.5rem;
                border-top: 1px solid #16213e;
                color: #777;
                font-size: 0.9rem;
            }

            .footer a {
                color: #e94560;
            }

            .tree {
                color: #78dce8;
            }
        </style>
    </head>
    <body>
        <div class="readme-container">

            <h1>Library Management API</h1>
            <p>RESTful API para gestión de biblioteca con autenticación JWT, construida con Laravel 5.1, PostgreSQL y Docker.</p>

            <!-- Características -->
            <h2>✨ Características</h2>
            <ul class="feature-list">
                <li>✅ Autenticación JWT (JSON Web Tokens)</li>
                <li>✅ CRUD completo de Usuarios, Autores y Libros</li>
                <li>✅ Sistema de Events y Jobs para actualización automática de contadores</li>
                <li>✅ Exportación de datos a Excel (XLSX)</li>
                <li>✅ Soft Deletes con auditoría (created_by, updated_by, deleted_by)</li>
                <li>✅ Validaciones con Form Requests</li>
                <li>✅ Respuestas JSON consistentes</li>
                <li>✅ Arquitectura escalable con Services y Base Classes</li>
                <li>✅ Docker para desarrollo y producción</li>
                <li>✅ PostgreSQL como base de datos</li>
            </ul>

            <!-- Tecnologías -->
            <h2>🛠️ Tecnologías</h2>
            <ul class="tech-list">
                <li><strong>Backend:</strong> Laravel 5.1</li>
                <li><strong>Base de Datos:</strong> PostgreSQL 13</li>
                <li><strong>Autenticación:</strong> JWT (tymon/jwt-auth 0.5)</li>
                <li><strong>Servidor Web:</strong> Nginx</li>
                <li><strong>Contenedores:</strong> Docker &amp; Docker Compose</li>
                <li><strong>PHP:</strong> 7.1-fpm</li>
                <li><strong>Excel Export:</strong> Maatwebsite Excel 2.1</li>
            </ul>

            <!-- Requisitos -->
            <h2>📦 Requisitos Previos</h2>
            <ul>
                <li>Docker Desktop instalado</li>
                <li>Git</li>
                <li>Cliente HTTP (Postman, Insomnia, o cURL)</li>
            </ul>

            <!-- Instalación -->
            <h2>🚀 Instalación</h2>

            <h3>1. Clonar el repositorio</h3>
            <pre><code>git clone https://github.com/CristobalRodriguezCh/library-management-api.git
cd library-management-api</code></pre>

            <h3>2. Levantar los contenedores Docker</h3>
            <pre><code>docker-compose up -d --build</code></pre>
            <p>Esto construirá e iniciará los siguientes servicios:</p>
            <ul>
                <li><strong>app:</strong> Aplicación Laravel (PHP 7.1-FPM)</li>
                <li><strong>nginx:</strong> Servidor web (puerto 8000)</li>
                <li><strong>db:</strong> PostgreSQL (puerto 5433)</li>
            </ul>

            <h3>3. Instalar dependencias de Composer</h3>
            <pre><code>docker-compose exec app composer install</code></pre>

            <h3>4. Configurar el archivo .env</h3>
            <pre><code>docker-compose exec app cp .env.example .env</code></pre>

            <p>Verifica que el <code>.env</code> tenga estas configuraciones:</p>
            <pre><code>APP_NAME=LibraryManagementAPI
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
QUEUE_DRIVER=sync</code></pre>

            <h3>5. Generar la clave de la aplicación</h3>
            <pre><code>docker-compose exec app php artisan key:generate</code></pre>

            <h3>6. Generar la clave JWT</h3>
            <pre><code>docker-compose exec app php artisan jwt:generate</code></pre>

            <h3>7. Ejecutar las migraciones</h3>
            <pre><code>docker-compose exec app php artisan migrate</code></pre>

            <h3>8. Configurar permisos</h3>
            <pre><code>docker-compose exec app chmod -R 775 storage bootstrap/cache
docker-compose exec app chown -R www-data:www-data storage bootstrap/cache</code></pre>

            <h3>9. Verificar instalación</h3>
            <p>Abre tu navegador en <code>http://localhost:8000</code> — Deberías ver la página de bienvenida.</p>

            <!-- Configuración -->
            <h2>⚙️ Configuración</h2>

            <h3>Variables de Entorno</h3>
            <table>
                <thead>
                    <tr>
                        <th>Variable</th>
                        <th>Descripción</th>
                        <th>Valor por Defecto</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td><code>APP_URL</code></td><td>URL de la aplicación</td><td><code>http://localhost:8000</code></td></tr>
                    <tr><td><code>DB_HOST</code></td><td>Host de PostgreSQL</td><td><code>db</code></td></tr>
                    <tr><td><code>DB_PORT</code></td><td>Puerto de PostgreSQL</td><td><code>5432</code></td></tr>
                    <tr><td><code>DB_DATABASE</code></td><td>Nombre de la BD</td><td><code>library_db</code></td></tr>
                    <tr><td><code>DB_USERNAME</code></td><td>Usuario de BD</td><td><code>library_user</code></td></tr>
                    <tr><td><code>DB_PASSWORD</code></td><td>Contraseña de BD</td><td><code>library_pass</code></td></tr>
                </tbody>
            </table>

            <h3>Puertos Expuestos</h3>
            <ul>
                <li><strong>8000:</strong> Nginx (Aplicación web)</li>
                <li><strong>5433:</strong> PostgreSQL (Base de datos — puerto externo)</li>
            </ul>

            <!-- Uso de la API -->
            <h2>📖 Uso de la API</h2>

            <h3>Base URL</h3>
            <pre><code>http://localhost:8000/api/v1</code></pre>

            <h3>Autenticación</h3>
            <p>La API utiliza JWT (JSON Web Tokens) para autenticación. Incluye el token en el header de cada petición:</p>
            <pre><code>Authorization: Bearer {tu_token_jwt}</code></pre>

            <h3>Flujo de Autenticación</h3>
            <ol>
                <li><strong>Registrar usuario:</strong> <code>POST /api/v1/auth/register</code></li>
                <li><strong>Login:</strong> <code>POST /api/v1/auth/login</code> → Obtener token</li>
                <li><strong>Usar el token</strong> en todas las peticiones protegidas</li>
            </ol>

            <!-- Endpoints -->
            <h2>🔗 Endpoints</h2>

            <!-- Auth -->
            <h3>Autenticación</h3>

            <h4>Registro de Usuario</h4>
            <div class="endpoint-block">
                <span class="badge badge-method post">POST</span>
                <span class="url">/api/v1/auth/register</span>
                <div class="header">Content-Type: application/json</div>
                <pre><code>{
                "name": "Juan Pérez",
                "email": "juan@example.com",
                "password": "password123",
                "password_confirmation": "password123",
                "birth_date": "1990-01-15",
                "role": "user"
                }</code></pre>
                            </div>

                            <h4>Login</h4>
                            <div class="endpoint-block">
                                <span class="badge badge-method post">POST</span>
                                <span class="url">/api/v1/auth/login</span>
                                <div class="header">Content-Type: application/json</div>
                                <pre><code>{
                "email": "juan@example.com",
                "password": "password123"
                }</code></pre>
            </div>

            <h4>Obtener Usuario Autenticado</h4>
            <div class="endpoint-block">
                <span class="badge badge-method get">GET</span>
                <span class="url">/api/v1/me</span>
                <div class="header">Authorization: Bearer {token}</div>
            </div>

            <h4>Logout</h4>
            <div class="endpoint-block">
                <span class="badge badge-method post">POST</span>
                <span class="url">/api/v1/logout</span>
                <div class="header">Authorization: Bearer {token}</div>
            </div>

            <hr class="section-divider">

            <!-- Usuarios -->
            <h3>Usuarios</h3>

            <h4>Listar Usuarios</h4>
            <div class="endpoint-block">
                <span class="badge badge-method get">GET</span>
                <span class="url">/api/v1/users</span>
                <div class="header">Authorization: Bearer {token}</div>
            </div>

            <h4>Crear Usuario</h4>
            <div class="endpoint-block">
                <span class="badge badge-method post">POST</span>
                <span class="url">/api/v1/users</span>
                <div class="header">Authorization: Bearer {token}</div>
                <div class="header">Content-Type: application/json</div>
                <pre><code>{
  "name": "María García",
  "email": "maria@example.com",
  "password": "password123",
  "password_confirmation": "password123",
  "birth_date": "1985-05-20",
  "role": "author"
}</code></pre>
            </div>

            <h4>Ver Usuario</h4>
            <div class="endpoint-block">
                <span class="badge badge-method get">GET</span>
                <span class="url">/api/v1/users/{id}</span>
                <div class="header">Authorization: Bearer {token}</div>
            </div>

            <h4>Actualizar Usuario</h4>
            <div class="endpoint-block">
                <span class="badge badge-method put">PUT</span>
                <span class="url">/api/v1/users/{id}</span>
                <div class="header">Authorization: Bearer {token}</div>
                <div class="header">Content-Type: application/json</div>
                <pre><code>{
  "name": "María García Actualizado",
  "email": "maria.nueva@example.com"
}</code></pre>
            </div>

            <h4>Eliminar Usuario (Soft Delete)</h4>
            <div class="endpoint-block">
                <span class="badge badge-method delete">DELETE</span>
                <span class="url">/api/v1/users/{id}</span>
                <div class="header">Authorization: Bearer {token}</div>
            </div>

            <h4>Exportar Usuarios a Excel</h4>
            <div class="endpoint-block">
                <span class="badge badge-method get">GET</span>
                <span class="url">/api/v1/users/export</span>
                <div class="header">Authorization: Bearer {token}</div>
            </div>

            <hr class="section-divider">

            <!-- Autores -->
            <h3>Autores</h3>

            <h4>Listar Autores</h4>
            <div class="endpoint-block">
                <span class="badge badge-method get">GET</span>
                <span class="url">/api/v1/authors</span>
                <div class="header">Authorization: Bearer {token}</div>
            </div>

            <h4>Crear Autor (con user_id existente)</h4>
            <div class="endpoint-block">
                <span class="badge badge-method post">POST</span>
                <span class="url">/api/v1/authors</span>
                <div class="header">Authorization: Bearer {token}</div>
                <div class="header">Content-Type: application/json</div>
                <pre><code>{
  "user_id": 2,
  "biography": "Reconocido autor de novelas históricas"
}</code></pre>
            </div>

            <h4>Crear Autor (creando usuario nuevo)</h4>
            <div class="endpoint-block">
                <span class="badge badge-method post">POST</span>
                <span class="url">/api/v1/authors</span>
                <div class="header">Authorization: Bearer {token}</div>
                <div class="header">Content-Type: application/json</div>
                <pre><code>{
  "user": {
    "name": "Gabriel García Márquez",
    "email": "gabo@example.com",
    "password": "password123",
    "birth_date": "1927-03-06"
  },
  "biography": "Premio Nobel de Literatura 1982"
}</code></pre>
            </div>

            <h4>Ver Autor</h4>
            <div class="endpoint-block">
                <span class="badge badge-method get">GET</span>
                <span class="url">/api/v1/authors/{id}</span>
                <div class="header">Authorization: Bearer {token}</div>
            </div>

            <h4>Actualizar Autor</h4>
            <div class="endpoint-block">
                <span class="badge badge-method put">PUT</span>
                <span class="url">/api/v1/authors/{id}</span>
                <div class="header">Authorization: Bearer {token}</div>
                <div class="header">Content-Type: application/json</div>
                <pre><code>{
  "biography": "Biografía actualizada del autor"
}</code></pre>
            </div>

            <h4>Eliminar Autor</h4>
            <div class="endpoint-block">
                <span class="badge badge-method delete">DELETE</span>
                <span class="url">/api/v1/authors/{id}</span>
                <div class="header">Authorization: Bearer {token}</div>
            </div>

            <h4>Exportar Autores a Excel</h4>
            <div class="endpoint-block">
                <span class="badge badge-method get">GET</span>
                <span class="url">/api/v1/authors/export</span>
                <div class="header">Authorization: Bearer {token}</div>
            </div>

            <hr class="section-divider">

            <!-- Libros -->
            <h3>Libros</h3>

            <h4>Listar Libros</h4>
            <div class="endpoint-block">
                <span class="badge badge-method get">GET</span>
                <span class="url">/api/v1/books</span>
                <div class="header">Authorization: Bearer {token}</div>
            </div>

            <h4>Crear Libro</h4>
            <div class="endpoint-block">
                <span class="badge badge-method post">POST</span>
                <span class="url">/api/v1/books</span>
                <div class="header">Authorization: Bearer {token}</div>
                <div class="header">Content-Type: application/json</div>
                <pre><code>{
  "title": "Cien Años de Soledad",
  "description": "Obra maestra del realismo mágico",
  "published_date": "1967-05-30",
  "isbn": "978-0-06-088328-7",
  "author_id": 1
}</code></pre>
            </div>

            <div class="note-box">
                <strong>Nota:</strong> Al crear un libro, automáticamente se dispara un Event que ejecuta un Job para actualizar el campo <code>books_count</code> del autor.
            </div>

            <h4>Ver Libro</h4>
            <div class="endpoint-block">
                <span class="badge badge-method get">GET</span>
                <span class="url">/api/v1/books/{id}</span>
                <div class="header">Authorization: Bearer {token}</div>
            </div>

            <h4>Actualizar Libro</h4>
            <div class="endpoint-block">
                <span class="badge badge-method put">PUT</span>
                <span class="url">/api/v1/books/{id}</span>
                <div class="header">Authorization: Bearer {token}</div>
                <div class="header">Content-Type: application/json</div>
                <pre><code>{
  "title": "Cien Años de Soledad - Edición Especial",
  "description": "Descripción actualizada"
}</code></pre>
            </div>

            <h4>Eliminar Libro</h4>
            <div class="endpoint-block">
                <span class="badge badge-method delete">DELETE</span>
                <span class="url">/api/v1/books/{id}</span>
                <div class="header">Authorization: Bearer {token}</div>
            </div>

            <h4>Exportar Libros a Excel</h4>
            <div class="endpoint-block">
                <span class="badge badge-method get">GET</span>
                <span class="url">/api/v1/books/export</span>
                <div class="header">Authorization: Bearer {token}</div>
            </div>

            <!-- Arquitectura -->
            <h2>🏗️ Arquitectura</h2>

            <h3>Estructura del Proyecto</h3>
            <pre><code class="tree">library-management-api/
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
└── README.md</code></pre>

            <h3>Patrones y Principios</h3>
            <ul>
                <li><strong>Service Layer:</strong> Lógica de negocio separada de controladores</li>
                <li><strong>Repository Pattern (implícito):</strong> A través de Eloquent ORM</li>
                <li><strong>Single Responsibility:</strong> Cada clase tiene una responsabilidad clara</li>
                <li><strong>DRY:</strong> BaseService y BaseController reutilizables</li>
                <li><strong>Dependency Injection:</strong> Servicios inyectados en controladores</li>
                <li><strong>Event-Driven Architecture:</strong> Events y Jobs para acciones asíncronas</li>
            </ul>

            <h3>Base de Datos</h3>
            <h4>Relaciones</h4>
            <pre><code>users (1) ──── (1) authors (1) ──── (*) books</code></pre>
            <ul>
                <li>Un <strong>Usuario</strong> puede ser un <strong>Autor</strong></li>
                <li>Un <strong>Autor</strong> pertenece a un <strong>Usuario</strong></li>
                <li>Un <strong>Autor</strong> tiene muchos <strong>Libros</strong></li>
                <li>Un <strong>Libro</strong> pertenece a un <strong>Autor</strong></li>
            </ul>

            <h4>Auditoría</h4>
            <p>Todas las tablas incluyen:</p>
            <ul>
                <li><code>created_at</code>, <code>updated_at</code> (timestamps)</li>
                <li><code>deleted_at</code> (soft delete)</li>
                <li><code>created_by</code>, <code>updated_by</code>, <code>deleted_by</code> (auditoría de usuario)</li>
            </ul>

            <!-- Troubleshooting -->
            <h2>🐛 Troubleshooting</h2>

            <h3>Error de permisos</h3>
            <pre><code>docker-compose exec app chmod -R 775 storage bootstrap/cache
docker-compose exec app chown -R www-data:www-data storage bootstrap/cache</code></pre>

            <h3>Limpiar caché</h3>
            <pre><code>docker-compose exec app php artisan cache:clear
docker-compose exec app php artisan config:clear
docker-compose exec app php artisan view:clear</code></pre>

            <h3>Recrear contenedores</h3>
            <pre><code>docker-compose down
docker-compose up -d --build</code></pre>

            <h3>Ver logs</h3>
            <pre><code>docker-compose logs -f app
docker-compose logs -f nginx
docker-compose logs -f db</code></pre>

            <!-- Notas -->
            <h2>📝 Notas de Desarrollo</h2>
            <ul>
                <li>El proyecto usa Laravel 5.1 por requerimiento de la prueba técnica</li>
                <li>JWT configurado con tymon/jwt-auth 0.5 (compatible con Laravel 5.1)</li>
                <li>PostgreSQL en puerto externo 5433 (puerto interno 5432)</li>
                <li>Los exports de Excel se descargan directamente al hacer GET</li>
            </ul>

            <!-- Footer -->
            <div class="footer">
                <h2>👤 Autor</h2>
                <p><strong>Cristobal Canto</strong></p>
                <p>GitHub: <a href="https://github.com/CristobalRodriguezCh" target="_blank">@CristobalRodriguezCh</a></p>
                <p>Email: cantoniorodriguez2307@gmail.com</p>
                <hr>
                <p>Desarrollado con ❤️ usando Laravel, Docker y PostgreSQL BY CR</p>
            </div>

        </div>
    </body>
</html>
