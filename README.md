# Para usar esta api:
 1) Subir entidades creadas en /clases
 2) Modificar /clases/FuncionesEntidades.php agregando el require_once de la entidad nueva
 3) Modificar /clases/FuncionesEntidades.php agregando la entidad nueva en el switch de la función getObjEntidad()
 4) Enjoy !

GET     :  ...index.php/ge?t=persona

PUT     :  ...index.php/pu?t=persona&id=x&..[params]

DELETE  :  ...index.php/de/x?t=persona

POST    :  No funciona, te odio !

Donde 'x' corresponde a un id de BBDD
#
# PD: Para que funcione, la entidad debe tener un campo "id" como identificador principal. Es una limitación.
#
# By Blillo :)
#
