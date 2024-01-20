
# Project Devstagram - Laravel

Aplicación web - Red social que permite crear usuarios, subir post, comentar los post, seguir a otros usarios, dar me gusta a los post.


## Installation

Install with xampp or docker

https://www.apachefriends.org/es/index.html
https://www.docker.com/get-started/

Si usas xampp no será necesario ejecuatar los siguientes comandos.


Install WSL2 - STEP 4 : https://learn.microsoft.com/en-us/windows/wsl/tutorials/wsl-containers

STEP 5: 
```bash
 wsl --set-default-version 2
```

Commnand select distro: 
```bash
  wsl --install -d Ubuntu
```

Configuración de user y password Ubuntu
restart

Open terminal PowerShell 

```bash
  wsl
```

Create new project in laravel
```bash
  curl -s https://laravel.build/devstagram | bash
```
    
Start server 
```bash
 ./vendor/bin/sail ip
```

Stop server
```bash
  ./vendor/bin/sail ip
```

Create alias sail
```bash
  sudo nano ~/.bashrc
```
bajar hasta abajo del todo y escribir

```bash
  alias sail = "./vendor/bin/sail"
```
Finalemente guardar

recargar los cambios
```bash
  source ~/.bashrc
```

Up service

```bash
  sail up
```

Stop service
```bash
  sail down
```

Instalar composer
https://getcomposer.org/

Instalar Table plus
https://tableplus.com/

Instalar Node
https://nodejs.org/en

Craer project
```bash
  composer create-project laravel/laravel devstagram
```

crear servidor artisan
```bash
  php artisan serve
```

Instalar tailwind css
```bash
  tailwind.config.js
```

Configuración archivo tailwind.config.js

```
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js", "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php"
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}
```

Configuración archivo css/app.css
```
@import 'tailwindcss/base';
@import 'tailwindcss/components';
@import 'tailwindcss/utilities';
```

Arrancar un servidor de desarrollo
```bash
  sail npm run dev
```

En la cabecera de app.blade.php

```
@vite('resources/css/app.css')
@vite('resources/js/app.js')
```
## Authors

- [@alejandro14972](https://github.com/alejandro14972?tab=repositories)

