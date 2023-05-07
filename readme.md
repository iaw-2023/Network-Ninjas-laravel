## Entrega Proyecto Laravel

Creamos el backend de una aplicacion web que permite las siguientes operaciones sobre las siguientes entidades:

### Productos
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


### Formas de probar la api
Puede probarse de dos formas, una es utilizar Postman y colocar alguna de las URL provistas y obtiene la información, otra es simplemente buscar la URL en el navegador y obtiene los datos. Tambien puede probarse accediendo a la opcion de Try de la pagina de la documentacion de la api. Para probar fallos en la api en la opcion de Try de la documentacion de swagger puede, por ejemplo, al probar la creacion de un detalle ingresar un "id_pedido" invalido, lo mismo al probar metodos get quee buscan por id, puede probarse ingresando ids incorrectos. La informacion restante de la api esta en su documentacion, no la incluimos para evitar redundancia.

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

#### Aclaracion: como se ve arriba, al consultar productos o categorias por medio de api estos se encontraran en las rutas rest/v1/...

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
