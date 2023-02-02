# DomgeoPHP
API REST para Información de domicilios geograficos basado en información de INEGI

Esta api permitirá obtener la información de los siguientes catalogos de INEGI

 - Estados
 - Municipios
 - Localidades

Instrucciones:

 1. Clonar el proyecto
 2. Ejecutar el archivo api/db/domgeo.sql para crear la base de datos
 3. Ejecutar el archivo api/db/sp.sql para crear los procedimientos almacenados y vistas necesarias.
 4. Cambiar la cadena de conexión a la base de datos en api/utilities/mysql.php
