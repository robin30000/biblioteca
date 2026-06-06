# 📚 Biblioteca API REST - Laravel

Proyecto desarrollado en **Laravel 10** con **Sanctum** para autenticación de usuarios.  
Incluye gestión de **Libros**, **Autores**, **Usuarios** y **Préstamos** con endpoints RESTful.

---

## 🚀 Requisitos previos
- PHP >= 8.1
- Composer
- MySQL/PostgreSQL
- Node.js & NPM (opcional, si se usa frontend)
- Git

---

## ⚙️ Instalación

1. Clonar el repositorio:
   ```bash
   git clone https://github.com/robin30000/biblioteca.git
   cd 
   
2. Instalar dependencias:
   composer install
   npm install

3. Configurar variables de entorno:
   cp .env.example .env

4. Generar la clave de la aplicación:
   php artisan key:generate

5. Ejecutar migraciones y seeders:
   php artisan migrate --seed

6. Iniciar el servidor:
   php artisan 
   
7. en postman con metodo get:
   http://localhost:8000/api/libros





