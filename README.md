
# 📲 Red Social - Laravel App

Esta es una aplicación web de Red Social desarrollada en Laravel, donde los usuarios pueden:

- ✅ Registrarse e iniciar sesión
- ✅ Crear y gestionar publicaciones (posts)
- ✅ Comentar en los posts de otros usuarios
- ✅ Seguir a otros usuarios y ver sus publicaciones
- ✅ Dar "Me gusta" a los posts


## 🛠 Tecnologías Utilizadas

- Laravel - Framework PHP
- Livewire - Interactividad sin recargar la página
- MySQL - Base de datos
- Eloquent ORM - Gestión de datos
- Blade - Motor de plantillas
- TailwindCSS - Estilos de la interfaz




## 📥 Instalación
1️⃣ Requisitos Previos

Asegúrate de tener instalado en tu sistema:
- PHP (>= 8.0)
- Composer
- XAMPP
- Node.js 

2️⃣ Clonar el Repositorio
```bash
  git clone https://github.com/alejandro14972/laravel-Devstagram.git
  cd nombre repositorio
```

3️⃣ Instalar Dependencias
```bash
 composer install
 npm run dev
```
4️⃣ Configurar Variables de Entorno
```bash
 cp .env.example .env 
```

Configura la base de datos en .env: 
Crea previamente la bd en phpMyAdmin

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=red_social_db
DB_USERNAME=root
DB_PASSWORD=
```
5️⃣ Generar Clave de la Aplicación

```bash
php artisan key:generate
```

6️⃣ Migrar y Poblar la Base de Datos
```bash
php artisan migrate
```
7️⃣ Iniciar el Servidor
```bash
php artisan serve
```

📌 Funcionalidades

- ✅ Registro e inicio de sesión con autenticación segura CORS
- ✅ Publicación de posts con imagen y texto
- ✅ Comentarios en publicaciones de otros usuarios
- ✅ Seguir/Dejar de seguir a usuarios
- ✅ Me gusta en publicaciones
- ✅ Notificaciones en tiempo real (si usaste Pusher/WebSockets)
- ✅ Perfil de usuario con foto y descripción
- ✅ Sistema de feed mostrando publicaciones de usuarios seguidos


## Authors

- [@alejandro14972](https://github.com/alejandro14972)

