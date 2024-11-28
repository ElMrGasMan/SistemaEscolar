<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

# Proyecto Escolar en Laravel

![](https://th.bing.com/th/id/OIP.LL222BTPq5cqoh4QSakTvAHaE8?w=263&h=180&c=7&r=0&o=5&dpr=2.4&pid=1.7)


# Introducción

Este proyecto escolar está diseñado para facilitar la gestión de la información de una escuela mediante una aplicación web desarrollada con el framework Laravel. 
La aplicación permite registrar, modificar, eliminar y actualizar los datos relacionados con cursos, profesores, alumnos y materias, con un sistema de base de datos estructurado para cada uno de estos elementos.

La plataforma tiene como objetivo principal organizar y centralizar la información de manera eficiente, permitiendo a los administradores gestionar los datos de la institución de forma sencilla y accesible. 
Con una interfaz intuitiva, los usuarios pueden interactuar con el sistema a través de formularios web que facilitan las operaciones CRUD (Crear, Leer, Actualizar, Eliminar) sobre los distintos registros, manteniendo la información siempre actualizada.

El sistema está basado en un conjunto de tablas interrelacionadas que permiten almacenar:

    Cursos: Información sobre los cursos ofrecidos.
    Profesores: Datos sobre los profesores que imparten clases en cada curso.
    Alumnos: Registros de los estudiantes y su relación con los cursos y materias.
    Materias: Detalles de las asignaturas que los profesores imparten.

Este proyecto está pensado tanto para el personal administrativo como para los docentes, quienes podrán gestionar fácilmente todos los aspectos académicos de la institución.

# Configuración

Una vez que hayas instalado el sistema, asegúrate de que la base de datos esté correctamente configurada. Laravel utiliza Eloquent ORM para interactuar con la base de datos, lo que permite realizar operaciones como:

    Agregar datos: Crear nuevos registros de cursos, profesores, alumnos o materias.
    Editar datos: Modificar registros existentes.
    Eliminar datos: Eliminar registros de la base de datos.
    Actualizar datos: Actualizar información de los registros en la base de datos.

# Uso

    Acceder al sistema: Una vez que todo esté instalado y configurado, puedes acceder al sistema a través de tu navegador en la URL http://localhost:8000.

    Navegar por las secciones: El sistema cuenta con una interfaz web para gestionar los siguientes módulos:
        Cursos: Visualizar, agregar, editar y eliminar cursos.
        Profesores: Administrar la información de los profesores.
        Alumnos: Gestionar los registros de los alumnos.
        Materias: Añadir y actualizar las materias.

    Operaciones CRUD:
        Crear: Puedes agregar nuevos registros a través de los formularios de entrada.
        Leer: Visualiza todos los registros de los cursos, profesores, alumnos o materias.
        Actualizar: Modifica los detalles de los registros existentes.
        Eliminar: Borra registros de la base de datos.

   Instalar las dependencias de Composer:
composer install

Configurar el archivo .env: Copia el archivo .env.example y renómbralo a .env. Luego, configura los parámetros de la base de datos:
cp .env.example .env

Edita el archivo .env para incluir los detalles de tu base de datos, como el nombre de la base de datos, usuario y contraseña.

Generar la clave de la aplicación:
php artisan key:generate

Ejecutar las migraciones:
php artisan migrate

Cargar datos iniciales (opcional): Si deseas agregar datos de prueba, puedes usar los factories y seeders de Laravel para insertar datos de ejemplo:
php artisan db:seed


# Configuraciones por ERRORES Adicionales:
Para que el proyecto funcione sin problemas; ya que las dependencias de exportacion
de excel y PDF pueden ocasionar errores. 

Si se experiencian problemas con las dependencias se debe hacer lo siguiente:

Para poder hacerlo primero se debe ir al arhcivo "php.ini". El mismo se encuentra dentro
de la carpeta de XAMPP: "C:\xampp\php" en Windows, o en la ruta que esté intalado el xampp.

Ya dentro del archivo se debe buscar las lineas "extension=gd" y "extension=zip" (esta ultima puede que no esté), acto seguido se debe borrar los punto y coma que están al principio de estas lineas, de este modo se habilitan las extensiones para su descarga, acto seguido guardar el archivo. Si estas extensiones ya estan habilitadas entonces se puede ignorar este paso.

Luego de eso se debe correr el comando de "composer update --with-all-dependencies"
esto descargará todas las dependencias necesarias para hacer correr el sistema.


# Iniciar el Servidor

Por ultimo, para iniciar el servidor se debe escribir en la terminal:
"php artisan serve" o usar el servidor apache de XAMPP.