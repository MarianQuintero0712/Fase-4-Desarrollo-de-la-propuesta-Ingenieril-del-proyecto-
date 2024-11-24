# Proyecto de Aplicación Móvil: Lista de Compras Semanal

Este proyecto es un prototipo funcional de una aplicación móvil desarrollada con **Ionic** y **Laravel** La aplicación tiene como objetivo facilitar la planificación de comidas y la generación de listas de compras para la semana, ayudando a los usuarios a organizar sus compras de manera eficiente y evitando el desperdicio de alimentos.

## Objetivo

La aplicación permite a los usuarios planificar las comidas de la semana y generar automáticamente una lista de compras con los ingredientes necesarios para preparar esas comidas. El flujo de trabajo es el siguiente:

1. **Planificación de comidas**: El usuario decide qué recetas va a preparar durante la semana.
   - Ejemplo: El lunes hará pasta, el martes pollo al horno, etc.
   
2. **Generación automática de lista de compras**: Una vez que el usuario selecciona las recetas, la aplicación revisa qué ingredientes se necesitan para cada receta y genera una lista de compras con los ingredientes correspondientes.

   - Ejemplo: Si el usuario planea hacer pasta boloñesa y pollo al horno, la lista de compras incluirá:
     - Pasta
     - Carne molida
     - Tomates
     - Pollo
     - Y todos los demás ingredientes necesarios para esas recetas.

## Características

- **Planificación semanal de comidas**: Los usuarios pueden elegir qué recetas desean preparar durante la semana.
- **Generación automática de la lista de compras**: Basada en las recetas seleccionadas, la app crea una lista de todos los ingredientes necesarios.
- **Reducción del desperdicio de alimentos**: Ayuda a evitar comprar en exceso y desperdiciar productos.
- **Evitar olvidos**: No olvides los ingredientes necesarios para las recetas elegidas.
- **Ahorro de tiempo**: Ya no es necesario hacer listas de compras manualmente.
- **Evitar compras impulsivas**: Evita comprar cosas que no necesitas mientras estás en el supermercado.

## Beneficios

- **Organización de comidas**: Te ayuda a organizar qué vas a cocinar y qué ingredientes necesitas.
- **Facilidad de uso**: Todo se gestiona directamente desde tu teléfono móvil.
- **Ahorro de dinero y tiempo**: Reduce el gasto innecesario y te ayuda a planificar mejor tus compras.

## Tecnologías Utilizadas

- **Ionic Framework**: Para el desarrollo de la aplicación móvil.
- **Angular**: Para la estructura y lógica de la aplicación.
- **Capacitor**: Para la integración con funciones nativas del dispositivo móvil (como la cámara, notificaciones, etc.).
- **Firebase** (opcional): Para almacenar datos de recetas y compras en la nube, si se requiere una funcionalidad de sincronización entre dispositivos.

# Proyecto Ionic 6 con Capacitor y Angular 14

Bienvenido a la guía de instalación para un proyecto que utiliza Ionic 6, Capacitor y Angular 14. Sigue estos pasos para configurar tu entorno y comenzar a desarrollar.

## Requisitos Previos

- Node.js
- npm 18.18.0 o superior
- Ionic CLI
- Capacitor CLI
- Un editor de código (como Visual Studio Code)

## Instalación 

1. Instalar dependencias

```bash
npm install 
```
2. Ejecutar la aplicación

```bash
ionic serve 
```

___


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
