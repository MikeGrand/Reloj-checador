# Reloj-checador

El Proyecto en cuestión utiliza las siguientes herramientas:

-Java con WebServices con wsdl de SOAP y Tomcat
-Base de Datos utilizando MySQL
-PHP  para consumir los servicios web del WSDL
-PHP con HTML/JS/CSS para la parte de FrontEnd

MySQL:
El nombre de la base de datos recibe por nombre "relojchecador"
con una tabla con 5 columnas ya definidas:
	tabla: entradassalidas
		col1: idTrabajador (int)
		col2: entrada (datetime)
		col3: salidaComer (datetime)
		col4: regresoComer (datetime)
		col5: salida (datetime)
En la carpeta de base de datos incluye todas las setencias para crear la tabla, pero en este caso es necesario crear
el nombre de la bd utilizando el nombre definido ya que incluye en java o en su debido caso cambiar el nombre de la bd
en los archivos de java
*esta base de datos no tiene contraseña solo necesita el nombre root, ya que se diseñó con XAMPP*

JAVA + TOMCAT
El IDE debe estar integrado con tomcat, en dado caso de usar tomcat de XAMPP  es necesario ingresar el jar de mysqlconnector
al directorio lib de tomcat para que los servicios web de SOAP de java puedan funcionar.
Al abrir el proyecto en IDE es necesario volver a ingresar el .jar en la dirección donde este ubicado 
(Solo es necesario el JAR no el .zip)

PHP: 
Consumo de servicio: cuidar con el estilo y que el echo tiene integrado el estilo predefinido del proyecto
frontend: utiliza js para el reloj, formulario y toda la pagina los estilos tienen que funcionar
con conexión obligatoria a internet
forntend administrador: conectado a la base de datos, cambiar el usuario, contraseña si se requiere, pero en este caso no es asi

todas estas tecnologias se usaron con Xampp con configuraciones ya establecidas. 

Puente de Java a MYSQL: 

En la carpeta Librerias_JAR se encontrara un archivo zip, ese archivo debe ser descomprimido e implementado en el proyecto ya que es básicamente el puente entre el proyecto y la base de datos MySQL.

Sirve para que el proyecto Java pueda conectarse, leer y escribir datos en MySQL.

Sin ese conector: Java no entiende cómo hablar con MySQL
Con ese conector: Puede hacer SELECT, INSERT, UPDATE, DELETE, Manejar transacciones, Autenticación con el servidor MySQL, Conexiones seguras (SSL)

