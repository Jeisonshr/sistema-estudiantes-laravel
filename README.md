# Sistema de Gestión de Estudiantes

## Descripción del proyecto

Este proyecto consiste en un sistema web para gestionar la información de estudiantes, desarrollado utilizando el framework Laravel 10 y PHP.

El sistema permite registrar, consultar, editar y eliminar estudiantes de una base de datos. También cuenta con un inicio de sesión para controlar el acceso a las funcionalidades principales.

El proyecto se desarrolló como parte de una actividad académica de Programación Web II, con el propósito de aplicar los conocimientos adquiridos y realizar la migración de un sistema desarrollado en PHP a Laravel.

## Tecnologías utilizadas

- **PHP:** lenguaje de programación utilizado para el desarrollo.
- **Laravel 10:** framework utilizado para construir la aplicación.
- **MySQL:** sistema de gestión de bases de datos.
- **HTML:** estructura de las páginas.
- **Blade:** motor de plantillas de Laravel.
- **Composer:** administrador de dependencias de PHP.
- **Git y GitHub:** herramientas utilizadas para el control de versiones y almacenamiento del proyecto.

## Funcionalidades principales

El sistema cuenta con las siguientes funcionalidades:

- **Inicio de sesión:** permite ingresar al sistema mediante un correo electrónico y una contraseña.
- **Registro de estudiantes:** permite agregar nuevos estudiantes.
- **Consulta de estudiantes:** muestra los estudiantes registrados en la base de datos.
- **Edición de información:** permite modificar los datos de un estudiante.
- **Eliminación de estudiantes:** incluye una pantalla de confirmación antes de eliminar un registro.
- **Búsqueda:** permite encontrar estudiantes por nombre, correo electrónico o programa académico.
- **Validación de formularios:** verifica que la información ingresada cumpla con los requisitos establecidos.
- **Cierre de sesión:** permite salir del sistema de manera segura.

## Información de los estudiantes

El sistema almacena los siguientes datos:

- Nombre.
- Correo electrónico.
- Edad.
- Programa académico.

## Requisitos para ejecutar el proyecto

Antes de instalar el sistema, es necesario contar con:

- PHP 8.1 o superior.
- Composer.
- MySQL.
- XAMPP o un entorno equivalente.
- Git.

## Instalación y configuración

Sigue estos pasos para ejecutar el proyecto en un equipo local.

### 1. Clonar el repositorio

```bash
git clone https://github.com/Jeisonshr/sistema-estudiantes-laravel.git
```

### 2. Ingresar a la carpeta del proyecto

```bash
cd sistema-estudiantes-laravel
```

### 3. Instalar las dependencias

```bash
composer install
```

### 4. Crear el archivo de configuración

Copia el archivo `.env.example` y crea uno nuevo llamado `.env`.

En Windows puedes utilizar:

```bash
copy .env.example .env
```

### 5. Generar la clave de la aplicación

```bash
php artisan key:generate
```

### 6. Crear la base de datos

Desde phpMyAdmin, crea una base de datos llamada:

```text
webii_laravel
```

Después, configura los datos de conexión en el archivo `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=webii_laravel
DB_USERNAME=root
DB_PASSWORD=
```

### 7. Configurar el usuario de acceso

En el archivo `.env`, agrega un correo y una contraseña para el usuario docente:

```env
DOCENTE_EMAIL=docente@correo.com
DOCENTE_CLAVE=coloca_una_contrasena_segura
```

Estos datos serán utilizados para crear el usuario que permitirá ingresar al sistema.

### 8. Ejecutar las migraciones

```bash
php artisan migrate
```

### 9. Crear el usuario docente

```bash
php artisan db:seed --class=DocenteSeeder
```

### 10. Iniciar el servidor

```bash
php artisan serve
```

Finalmente, abre el navegador e ingresa a:

```text
http://localhost:8000
```

## Estructura general del proyecto

El proyecto utiliza la estructura de Laravel y organiza sus archivos principales de la siguiente manera:

- `app/`: contiene los controladores y modelos de la aplicación.
- `config/`: contiene los archivos de configuración.
- `database/`: contiene las migraciones y los seeders.
- `resources/views/`: contiene las vistas del sistema.
- `routes/web.php`: contiene las rutas de navegación.
- `public/`: contiene los archivos públicos de la aplicación.

## Base de datos

La aplicación utiliza MySQL para almacenar la información de los estudiantes y los usuarios del sistema.

La tabla principal es `estudiantes`, donde se guardan los datos personales y académicos de cada estudiante. También se utiliza la tabla `users` de Laravel para administrar el acceso al sistema.

## Autoría

Proyecto académico desarrollado para la asignatura Programación Web II.

**Repositorio en GitHub:**  
https://github.com/Jeisonshr/sistema-estudiantes-laravel

## Consideraciones

Este proyecto fue desarrollado con fines académicos y de aprendizaje, aplicando herramientas de desarrollo web, manejo de bases de datos y control de versiones.