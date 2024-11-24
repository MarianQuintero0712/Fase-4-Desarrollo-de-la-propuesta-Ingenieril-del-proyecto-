# Backend Menulisto

Documentación de la API desarrollada en Laravel 10 y MySQL. Esta API proporciona funcionalidades de autenticación y gestión de listas de compras.

## Requisitos
- **PHP** >= 8.1
- **Laravel** 10
- **Composer**
- **MySQL** >= 5.7
- **JWT-Auth** para autenticación basada en tokens.

## Instalación

1. Clonar este repositorio:
   ```bash
   git clone <URL-del-repositorio>
   ```

2. Instalar dependencias:
   ```bash
   composer install
   ```

3. Configurar el archivo .env:
   ```bash
   cp .env.example .env
   ```

4. Generar la clave de la aplicación:
   ```bash
   php artisan key:generate
   ```

5. Ejecutar las migraciones:
   ```bash
   php artisan migrate
   ```

6. Iniciar el servidor:
   ```bash
   php artisan serve
   ```

## Índice

- [Autenticación](#autenticación)
- [Gestión de Menús](#gestión-de-menús)
- [Gestión de Listas](#gestión-de-listas)
- [Uso de la API](#uso-de-la-api)
- [Ejemplos de Solicitudes](#ejemplos-de-solicitudes)

## Autenticación

La API permite a los usuarios registrarse, iniciar sesión, cerrar sesión y obtener información sobre el usuario autenticado. Las rutas de autenticación son las siguientes:

### Rutas

- **Iniciar sesión**
  - `POST /auth/login`
  - Controlador: `AuthController@login`
  
- **Registrarse**
  - `POST /auth/register`
  - Controlador: `AuthController@register`

- **Cerrar sesión**
  - `POST /auth/logout`
  - Controlador: `AuthController@logout`

- **Actualizar token**
  - `POST /auth/refresh`
  - Controlador: `AuthController@refresh`

- **Obtener información del usuario**
  - `POST /auth/me`
  - Controlador: `AuthController@me`

**Nota:** Las rutas de inicio de sesión y registro no requieren autenticación (sin middleware `jwt`).

## Gestión de Menús

Los usuarios autenticados pueden acceder a la información del menú disponible.

### Rutas

- **Obtener menús**
  - `GET /menus`
  - Controlador: `MenuController@menus`

## Gestión de Listas

Los usuarios autenticados pueden gestionar sus listas de compras.

### Rutas

- **Obtener listas**
  - `GET /lists`
  - Controlador: `ListController@lists`

- **Crear una lista**
  - `POST /lists/create`
  - Controlador: `ListController@create`

- **Eliminar una lista**
  - `DELETE /lists/{id}`
  - Controlador: `ListController@delete`

- **Obtener lista de compras**
  - `GET /shopping-list/{id}`
  - Controlador: `ListController@getShoppingList`

- **Agregar a la lista de compras**
  - `POST /shopping-list`
  - Controlador: `ListController@addShoppingList`

## Uso de la API

Para utilizar la API, asegúrate de incluir un token de autenticación en las solicitudes que requieren autenticación. Este token se obtiene al iniciar sesión y se debe enviar en el encabezado `Authorization` como `Bearer {token}`.

### Ejemplo de encabezado de autorización

```http
Authorization: Bearer {token}
