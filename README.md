# Para usar esta api:
 1) Configurar la conexión a la BBDD en /clases/AccesoDatos.php
 2) Subir entidades creadas en /clases
 3) Modificar /clases/FuncionesEntidades.php agregando el require_once de la entidad nueva
 4) Modificar /clases/FuncionesEntidades.php agregando la entidad nueva en el switch de la función getObjEntidad()
 5) Enjoy !

GET     :  ...index.php/all?t=alumno

PUT     :  ...index.php/put?t=alumno&id=x&[params]

DELETE  :  ...index.php/del/x?t=alumno

POST    :  ...index.php/post/x?t=alumno
(enviar por body los valores para el insert)

Donde 'x' corresponde a un id de BBDD
#
# PD: Para que funcione, la entidad debe tener un campo "id" como identificador principal. Es una limitación.
#
# By Blillo :)
#
