Xtreme Vulnerable Web Application (XVWA) en Español
=========================================
XVWA es una aplicación web mal codificada escrita en PHP / MySQL que ayuda a los entusiastas de la seguridad 
a aprender la seguridad de las aplicaciones WEB. No es recomendable alojar esta aplicación en línea, ya que está
diseñada para ser "Extremadamente Vulnerable". Recomendamos alojar esta aplicación en un entorno local/controlado.
El fin es que puedas agudizar tus habilidades de seguridad, ya que este proyecto es totalmente legal romperlo o piratearlo.
La idea es evangelizar la seguridad de las aplicaciones web para la comunidad de la forma más fácil posible.
Por favor Aprende y adquiere estas habilidades para un buen propósito. 


https://ibb.co/dy62jR


XVWA está diseñado para comprender los siguientes problemas de seguridad. 

+ Inyección SQL - Basada en Error.
+ Inyección SQL A Ciegas. 
+ Inyección de Comando OS. 
+ Inyección XPATH.
+ Inyección de Fórmula CSV.
+ Inyección de Objetos PHP.
+ Carga de Archivos Insegura.
+ Secuencias de Comandos en Sitios Cruzados (XSS) - Reflejados. 
+ Secuencias de Comandos en Sitios Cruzados (XSS) - Almacenado. 
+ Secuencias de Comandos en Sitios Cruzados (XSS) - DOM.
+ Falsificación de Solicitudes del lado del Servidor (SSRF/XSPA).  
+ Inclusión de Archivos.
+ Inyección XXE.(Nuevo).
+ Flags de Sesiones Web.
+ Referencia Insegura a Objetos.
+ Falta del Control de Acceso a Nivel Funcional.
+ Falsificación de Solicitudes Cruzadas (CSRF).
+ Criptografía.(Nuevo).
+ Token Hijacking.(Nuevo).
+ Captcha Vulnerable a Ataques OCR.(Nuevo).
+ Redirecciones y Reenvíos Incorrectos.
+ Inyección de Plantilla del Lado del Servidor (SSTI).
+ Utilización de Componentes con Vulnerabilidades Conocidas(Nuevo).

 Buena Suerte y Happy Hacking!


## Aclaración

No aloje esta aplicación en linea ni en el entorno de producción. XVWA es una aplicación totalmente vulnerable y el acceso en línea de esta aplicación
podría llevar a un completo compromiso de su sistema. No somos responsables de dichos incidentes. Mantenerse a salvo por favor ! 

## Copyright
Este trabajo esta bajo la licencia GNU GENERAL PUBLIC LICENSE Version 3
Para ver una copia de esta licencia visita http://www.gnu.org/licenses/gpl-3.0.txt


## Instrucciones 
XVWA es fácil de instalar. Puede ser configurado en Windows, Linux o Mac. Los siguientes son los pasos básicos que debes seguir en tu entorno 
Para la instalacion. Puedes usar WAMP, XAMP o cualquier cosa  Apache-PHP-MYSQL para que funcione correctamente 

## Instalación Manual

Copie la carpeta xvwa en su directorio web. Asegúrese de que el nombre del directorio sea xvwa. 
Realice los cambios necesarios en xvwa/config.php para la conexión a la base de datos. Ejemplo a continuación:

```php
$XVWA_WEBROOT = '';  
$host = "localhost"; 
$dbname = 'xvwa';  
$user = 'root'; 
$pass = 'root';
```

Realice los siguientes cambios en el archivo de configuración de PHP.

```php
file_uploads = on 
allow_url_fopen = on 
allow_url_include = on 
```

Acceso a la Web :  http://localhost/xvwa/

Configure la base de datos y las tablas accediendo a http://localhost/xvwa/setup/

Detalles del Acceso:

```php
admin:admin
xvwa:xvwa
user:vulnerable
```


## Acerca de XVWA en Español

 XVWA está diseñado intencionalmente con muchos fallos de seguridad y suficiente fundamento técnico para mejorar el conocimiento de la seguridad de las aplicaciones. Toda esta idea es evangelizar los problemas de seguridad de las aplicaciones web. Háganos saber sus sugerencias de mejora o cualquier otra vulnerabilidad que le gustaría ver en futuros lanzamientos de XVWA.

## Autores:
- @s4n7h0 https://twitter.com/s4n7h0
- @samanL33T https://twitter.com/samanl33t 
- Sebastian Veliz Donoso https://www.linkedin.com/in/sebastianvelizdonoso/

## Proyecto Original
https://github.com/s4n7h0/xvwa
