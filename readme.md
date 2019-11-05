# Task Manager Backend
## Laravel Framework API Rest

### Development Stack
* Laravel 6.4.1
* MySql 5.7.25

### Endpoints
- #### tasks
HTTP Verb: GET

Devuelve todas las tareas contenidas en la Base de Datos. URL:

http://domain/api/tasks

- #### task
HTTP Verb: GET

Devuelve los datos de una tarea concreta. URL:

http://domain/api/tasks/{id}

- #### create
HTTP Verb: POST

Persiste un nuevo modelo Task en la BD. URL:

http://domain/api/tasks/create


El body debe de contener los siguientes datos:
* "name": "Requerido. Longitud máxima 191 caracteres."
* "due_date": "Requerido. Fecha con formato Y-m-d H:i:s"
* "description": "Requerido"

- #### update
HTTP Verb: PUT

Actualiza un Task en la BD. URL:

http://domain/api/tasks/{id}


El body debe de contener los siguientes datos:
* "name": "Requerido. Longitud máxima 191 caracteres."
* "due_date": "Requerido. Fecha con formato Y-m-d H:i:s"
* "description": "Requerido"

- #### delete
HTTP Verb: DELETE

Elimina un Task de la BD. URL:

http://domain/api/tasks/{id}