# Lista de Profesionales


Este proyecto de profesionales con js , php y css

## Requisitos

- [Docker](https://www.docker.com/)
- [Docker Compose](https://docs.docker.com/compose/)

## Configuración

Clona este repositorio:

```sh
git clone git@github.com:Fernilo/ListaProfesionales.git
cd listado-profesionales
```

## Uso
### Levantar el Proyecto

Para construir y levantar los servicios se recomienda ejecutar ejecuta:


```sh
docker build -t listado-profesionales .

docker run -d -p 80:80 -p 3306:3306 -v $(pwd):/var/www/html --name listado-profesionales listado-profesionales
```

Esto construirá la imagen de Docker y levantará el contenedor
Acceder a la Aplicación

Una vez que los contenedores estén corriendo, podrás acceder a la API en 
[http://127.0.0.1](http://127.0.0.1)

### Detener el Proyecto

Para detener los contenedores, ejecuta:

```sh
docker stop listado-profesionales
```

### Estructura del Proyecto
```sh
/crossfit-api
|-- Dockerfile
|-- persona.php
|-- index.php
|-- borrar.php
|-- info.php
|-- Alerts
    |-- alertify.js
    |-- ...
|-- includes
    |-- conexion.php
    |-- estilos.css
    |-- tabla.css
```

* Dockerfile: Define la imagen de Docker para el proyecto.

## Licencia
[MIT](https://choosealicense.com/licenses/mit/)

## Autor
Fernando Mercado