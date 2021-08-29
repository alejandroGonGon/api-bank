# API BANK
## _Entregable AGonzalez_

En clase de Programacion Web se a pedido realizar una Api que controle 3 transacciones de banco, tales como Transferir, Depositar y retiro sobre cuentas.

## Caracteristicas
Las caracteristicas implementadas para esta Api son :
- Poder crear una cuenta.
- Poder ver todas las cuentas.
-  Poder depositar dinero sobre una cuenta.
-  Poder Retirar dinero de una cuenta.
-  Poder hacer transferencias de una cuenta a otra.
-  Implementacion de Mail (junto a mialtrap se simulo el envio de mail en cada transaccion hecha dentro de la Api).
-  Proteccion de endpoints con Token.

## Getting Started

Pasos para poder correr el proyecto sin incovnientes.

#### Actulizar npm

```sh
npm i
```

#### Actualizar composer

```sh
composer update
```

#### Editar el .env
Para poder correr la app neceitaremos cambiar algunos valores del .env para poder decirle donde guardar los datos y configurar el Mail.

Configurar la db
```sh
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel //cambiar el nombre  por una DB existente.
DB_USERNAME=root
DB_PASSWORD=
```
Configurar el Mailtrap
```sh
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null // Cambiar por unos validos 
MAIL_PASSWORD=null // Cambiar por unos validos
MAIL_ENCRYPTION=tls

MAIL_FROM_ADDRESS=example@mail.com // Escribir el mail de la persona que manda el mail.
MAIL_FROM_NAME="Example Name" // Escribir un nombre de la peronsa que envia el mail
```

#### Cargar las tablas a la DB con migrate
Esto creara todas las tablas dentro de la DB que anteriormente configuraste en el .env.

```sh
php artisan migrate
```
#### Correr Laravel
Correr el servicio dentro de laravel.

```sh
php artisan serve
```

#### Importar los endpoints en POSTMAN
Abrir el archivo llamado api-bank.postman_collection.json y importarlo dentro de Postman para poder correr y ver todos los endpoints funcionando.
