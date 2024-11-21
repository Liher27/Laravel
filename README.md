<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects.

# Comandos utilizados hasta ahora, y para que sirven: 

```bash
php artisan make:model Post -crms
```
Para crear el modelo de nuestros posts, este en especifico creara un controlador (con el argumento "c"), un migration (con el argumento "m"), un seeder (con el argumento "s"), y un route (con el argumento "r").

Una vez hayamos creado el modelo o esquema de la tabla de posts, tendremos que modificar el migration que se ha creado, para ello modificaremos el archivo que se llama **YYYY\_mm\_dd\_HHMMSS\_comentario.php**, en **app/database/migrations/**. 
Para lanzar la migracion se hara uso del siguiente comando: 

```bash
php artisan migrate
```
Al lanzar este comando, nuestra base de datos se habra actualizado con la informacion correspondiente del ultimo "batch".

Los migrations se pueden definir como un sistema de control de versiones: lo que esto significa es que, cuando se lanza el migration el esquema de la base de datos cambia con la informacion añadida o modificada, que va acorde con el resto del 
codigo, es gracias a estas migrations que podremos tener un control sobre la informacion manejada en la base de datos.

Si queremos mirar el estado de nuestra migracion, ademas de sus "batch" (versiones), podremos usar el comando "**php artisan migrate:status**".

Una vez hayamos hecho la migracion podremos ver su informacion al entrar a la base de datos, con el siguiente comando: 
```bash
php artisan db
```
Y despues, seleccionar la base de datos apropiada y lanzar:
```bash
SHOW TABLES;
```

Bien, ahora que se ha creado la base de datos, sera necesario poblarla con la informacion que queramos. Para ello, haremos uso de los Seeders, unos archivos que sirven para llenar la tabla correspondiente con valores. Si queremos usar estos 
Seeders, será necesario que las modifiquemos. Estos archivos se encuentran en **app/database/seeders/**

Una vez hayamos escrito lo necesario en el Seeder, deberemos de lanzarlo desde consola, para ello, haremos uso del siguiente comando:
```bash
php artisan db:seed PostSeeder
```
Tras esto, nuestra base de datos habra sido poblada con la informacion que nosotros queramos.

Ahora, necesitamos poder mostrar esta informacion en nuestra pagina web. Para conseguirlo, sera necesario crear las rutas correspondientes de la vista, para que el usuario pueda acceder a la vista correspondiente. Si queremos crear estas rutas,
Haremos uso del archivo que se encuentra en **routes/web.php**. En este archivo se definen todas las rutas a las que el usuario tiene acceso, u si queremos ver todas las rutas a las que un usuario puede acceder, deberemos lanzar el comando 
```bash
php artisan route:list
```

# Bootstrap

Ahora nos centraremos en la instalacion de bootstrap para Laravel, un servicio que antiguamente era nativo de Laravel, pero ya no. Para instalarlo, neceistaremos ejecutar los siguientes comandos: 

Para definir mediante Composer (el gestor de dependencias de Laravel), que se ha creado una dependencia del paquete "laravel/ui"
```bash
composer require laravel/ui --dev
```

Se indica qué framework para el interfaz se va a utilizar. Aparte, con el parámetro “–auth” se le indica que genera las plantillas para la autenticación
```bash
php artisan ui bootstrap --auth
```

Instala las dependencias indicadas en el primer comando
```bash
npm install
```

ejecuta la acción “build” indicada en el fichero package.json. Este comando será necesario siempre que queramos cambiar los assets de la plantilla 
```bash
npm run build
```

Con estos comandos, habremos generado una plantilla que podremos utilizar a lo largo de nuestra pagina web. Para ver mas detalles de la composicion de nuestra plantilla, podemos ir al archivo en la ruta  **resources/views/layouts/app.blade.php**.
Para usar esta plantilla, deberemos cambiar el archivo de la vista que queramos que incluya esta estructura. Por ejemplo, para ver la vista modificada de show.blade.php

## Metodos CRUD

Estos metodos sirven para crear posts, editarlos o borrarlos. Ambos tres pueden verse en los apartados de postController en los metodos: Destroy, Put, Edit y Update.

## Middleware

Este sistema de autenticacion nos permite hacer que multiples de nuestras rutas necesiten una autenticacion. Para ello, deberemos de modificar las rutas en el archivo web.php. Además, podemos tener rutas a las que queramos acceder sin necesidad de estar logeados en la pagina web. Para ello, tendremos que marcar explicitamente en este mismo archivo que rutas no necesitaran middleware.

## Relacionando modelos

Habrán veces que nuestros objetos tengan como atributo otros objetos, y para ello, será necesario relacionarlos entre ellos en laravel. Primero, crearemos el modelo del objeto al igual que se hizo anteriormente. Después, será necesario hacer un migrate y poblar la base de datos con la informacion que queramos. Tras ello, habrá que relacionarlos en los modelos en este caso de Comentario, y de Post, diciendole a los modelos respectivamente, o HasMany, o BelongsTo. Además serán necesarias pequeñas modificaciones en la vista de los comentarios y en el controlador de posts, para guardar dentro del objeto Post los Comentarios que tenga relacionados en la base de datos.