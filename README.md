#
#PARA USAR ESTA API:
#
1) Configurar la conexión a la BBDD en /clases/AccesoDatos.php 
2) Crear entidades en directorio /clases utilizando como base "template_entidad.php". 
3) Modificar /clases/FuncionesEntidades.php agregando el require_once de la entidad nueva. 
4) Modificar /clases/FuncionesEntidades.php agregando la entidad nueva en el switch de la función getObjEntidad(). 
5) Enjoy !  

#COMO ARMAR LA URL DESDE APP CLIENTE 

GET     :  ...methods.php/all?t=alumno  

PUT     :  ...methods.php/put?t=alumno&id=x&[params]  

DELETE  :  ...methods.php/del/x?t=alumno  

POST    :  ...methods.php/post?t=alumno 
(para post enviar por body los valores para el insert, con el id=null ya que lo resuelve mySQL)  

Donde 'x' corresponde a un id de BBDD y 't' es el nombre de entidad, en el ejemplo es "alumno".  

PD: Para que funcione, la entidad debe tener un campo "id" como identificador principal. Es una limitación.  

#By Blillo :)