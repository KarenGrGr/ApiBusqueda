# ApiBusqueda
Ejercicio de entrevista técnica mo2o

La API obtiene los datos del campo de filtrado food de la Api Punk Api y ofrece dos servicios:

El primero devuelve id(id), nombre(name) y descripción(description) de una cerveza en base a una cadena de búsqueda de alguna comida.
La forma de acceder a este es, si por ejemplo, la cadena de búsqueda es 'chips':
http://localhost/ApiBusqueda/busqueda/chips

EL otro servicio devuelve id(id), nombre(name), descripción(description) y detalles(details);
details es un array que contiene los datos de imagen(image_url), slogan (tagline) y cuando fue fabricada la cerveza(first_brewed).
La forma de acceder a este es, si por ejemplo, la cadena de búsqueda es 'chips':
http://localhost/ApiBusqueda/busquedadDetallada/chips

El formato de salida de los datos es JSON.
Si la búsqueda no encuentra nada devolverá un array vacío.
