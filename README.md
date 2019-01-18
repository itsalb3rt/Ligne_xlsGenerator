# XLSGenerator

Es una clase generadora de archivos XLS a partir de una matriz asociativa unidimensional, esto tiene la flexibilidad de poder utilizarse no solo para descargar archivos si no también para presentar tablas de datos.

Está diseñado para trabajar no solo como componente de [Ligne Framework PHP](https://github.com/itsalb3rt/ligne_php "Ligne Framework PHP"), también puede ser incluido en cualquier proyecto, tomando en cuenta que debe cambiarse el `namespace` del mismo.

### Instalación;

Clonar este repositorio y copiar en el directorio `CORE\UTIL `de tu proyecto en Ligne.

### Usos


**Para el ejemplo usaremos este array de 5 usuarios.**

```php
        $array = array (
            0 =>
                array (
                    'id' => 1,
                    'name' => 'Leanne Graham',
                    'username' => 'Bret',
                    'email' => 'Sincere@april.biz',
                    'phone' => '1-770-736-8031 x56442',
                    'website' => 'hildegard.org',
                ),
            1 =>
                array (
                    'id' => 2,
                    'name' => 'Ervin Howell',
                    'username' => 'Antonette',
                    'email' => 'Shanna@melissa.tv',
                    'phone' => '010-692-6593 x09125',
                    'website' => 'anastasia.net',
                ),
            2 =>
                array (
                    'id' => 3,
                    'name' => 'Clementine Bauch',
                    'username' => 'Samantha',
                    'email' => 'Nathan@yesenia.net',
                    'phone' => '1-463-123-4447',
                    'website' => 'ramiro.info',
                ),
            3 =>
                array (
                    'id' => 4,
                    'name' => 'Patricia Lebsack',
                    'username' => 'Karianne',
                    'email' => 'Julianne.OConner@kory.org',
                    'phone' => '493-170-9623 x156',
                    'website' => 'kale.biz',
                ),
            4 =>
                array (
                    'id' => 5,
                    'name' => 'Chelsey Dietrich',
                    'username' => 'Kamren',
                    'email' => 'Lucio_Hettinger@annie.ca',
                    'phone' => '(254)954-1289',
                    'website' => 'demarco.info',
                ),
            5 =>
                array (
                    'id' => 6,
                    'name' => 'Mrs. Dennis Schulist',
                    'username' => 'Leopoldo_Corkery',
                    'email' => 'Karley_Dach@jasper.info',
                    'phone' => '1-477-935-8478 x6430',
                    'website' => 'ola.org',
                )
        );
```

**Uso basico:**

```php
use Core\Util\XlsGenerator\XlsGenerator;

$xls = new XlsGenerator($array);
 var_dump($xls->getXls());
```

**Resultado:**

[![](https://i.imgur.com/9HBIpuj.png)](https://i.imgur.com/9HBIpuj.png)

**Opciones;**

El constructor de la clase también recibe ciertas opciones que te permiten decidir que obtener;

`array $content: `Arreglo asociativa unidimensional

`array $omit_fields = array():` Arreglo con nombres de campos que requiera omitir,

`bool $downloable = false:` Si se desea que se descargue como archivo xls

`bool $hasHeader = true: `Si tiene encabezados para incluirlos (Estos son los indices de la del arreglo)

**Ejemplo:**

En este ejemplo omitiremos el campo `phone`

```php
$xls = new XlsGenerator($array,['phone'],false,true);
var_dump($xls->getXls());
```
**Resultado**

[![](https://i.imgur.com/n8rZ1z4.png)](https://i.imgur.com/n8rZ1z4.png)

Cualquier sugerencia siempre es bien recibida.
