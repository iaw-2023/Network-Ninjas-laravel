## Entrega Proyecto Laravel

Creamos el backend de una aplicacion web que permite las siguientes operaciones sobre las siguientes entidades:

#### Productos
- Ver los productos disponibles junto con su informacion
- Editar la información de cualquier producto
- Borrar cualquier producto siempre y cuando no este asociado a algun pedido existente
- Crear uno o mas productos

### Categorias: 
- Ver las categorías disponibles junto con su informacion
- Editar la información de cualquier categoria
- Borrar cualquier categoria siempre y cuando no existan productos correspondientes a dicha categoria
- Crear una o mas categorias

### Pedidos: 
- Ver los pedidos realizados junto a su informacion, pudiendo ver tambien los detalles de los mismos


### Formas de probar la ap
Puede probarse de dos formas, una es utilizar Postman y colocar alguna de las URL provistas y obtiene la información, otra es simplemente buscar la URL en el navegador y obtiene los datos. Tambien puede probarse accediendo a la opcion de Try de la pagina de la documentacion de la api.

### Librerias utilizadas
- L5-Swagger
- Laravel UI Auth para el login

### Datos del usuario para iniciar sesion
- Usuario: admin@iaw.com
- Contraseña: admin123

### Datos del email que envia el correo de cambio de contraseña
- Mail: carfectsreset@gmail.com
- Contraseña: networkninjas

### Links
- Deploy en Vercel: https://network-ninjas-laravel-dwfy.vercel.app
- Documentation de api en vercel de Swagger: https://network-ninjas-laravel-dwfy.vercel.app/rest/documentation
- Documentacion de api en SwaggerHub: https://app.swaggerhub.com/apis/FIDOGIANNOTTI_1/car-fects_api/1.0.0
- Productos disponibles por medio de la api en vercel:  https://network-ninjas-laravel-dwfy.vercel.app/rest/v1/productos
- Categorias disponibles por medio de la api en vercel: https://network-ninjas-laravel-dwfy.vercel.app/rest/v1/categorias


## Idea a implementar



- La idea es realizar un aplicacion que permita a los usuarios comprar autos o accesorios para el auto eligiendo la cantidad que desea comprar, tambien puede filtrar los productos por categoria o buscarlos por su nombre. 

## Diagrama entidad-relacion

![image00001](https://user-images.githubusercontent.com/71414041/230743123-8f5b8043-01e1-4ab5-af70-8898cb2c6788.jpeg)


## Proyecto Framework PHP - Laravel


Las entidades que podrán actualizarse seran:
- Categoría 
- Producto

Los reportes que podrán generarse son:
- Reporte de productos disponibles de cada categoría 
- Reporte de pedidos hechos y los detalles de cada pedido

Las entidades que se obtendrán por api son:
- Categoria
- Producto

El usuario podra ver todas las categorías y filtrar por ellas o buscar por nombre los diferentes productos


Las entidades que podrán ser modificadas por api son:
- Pedidos
- Detalles de pedidos

## Proyecto Javascript - React/Vue

El usuario podra ver todos los productos disponible para comprar, tambien podra filtrar por categoria o buscar por nombre, y podra elegir uno o mas productos para comprar seleccionando la cantidad de cada producto. Podra ver los productos que eligio para comprar y el total de su importe.


## Pasos

- clonar el repo https://github.com/iaw-2023/laravel-template y mantener como owner la organización de la materia.
## parados en el directorio del repositorio recientemente clonado, ejecutar:

- `composer install`
- `cp .env.example .env`
- `php artisan key:generate`
- `php artisan serve`

Con el último comando, pueden acceder a http://127.0.0.1:8000/ y ver la cáscara de la aplicación Laravel

### Requisitos

- tener [composer](https://getcomposer.org/) instalado
- tener [php](https://www.php.net/) instalado



<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
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

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

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
