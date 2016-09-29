<?php

/**
 * Archivo de definicion de la clase resource.
 * Las clases se definen con Mayuscula para diferenciarlas de los metodos
 */
class Resource {

    /**
     * @property int $id id del resource
     * @property string $tableName nombre de la tabla en la base de datos 
     */
    protected $id, $tableName = "resource";

    public function __construct($id = "null", $color = "null", $name = "null", $extra = "null") {
        //setea los atributos a null cuando la clase es instanciada
        $this->id = $id;
        $this->color = $color;
        $this->name = $name;
        $this->extra = $extra;
    }

    /**
     * @return boolean inserta un nuevo resource
     */
    public function insert() {
        if ($this->name !== "null") {
            /* incluye la conexion a la base de datos */
            require_once dirname(dirname(__FILE__)) . '/config/config.php';

            /* query de ejecucion */
            $query = "INSERT INTO $this->tableName VALUES (null, '$this->color', '$this->name', '$this->extra', NOW())";

            /* ejecucion */
            $BD->query($query);

            /* verificacion de resultaado */
            if ($BD->affected_rows >= 1) {
                return true;
            } else {
                return false;
            }
            $BD->close();
        } else {
            return false;
        }
    }

    /**
     * @return boolean actualiza los datos del resource
     */
    public function update() {
        if ($this->id !== "null") {
            /* incluye la conexion a la base de datos */
            require_once dirname(dirname(__FILE__)) . '/config/config.php';

            /* query de ejecucion */
            $query = "UPDATE $this->tableName SET color = '$this->color', name = '$this->name', extra = '$this->extra', lastmodified = NOW() WHERE id=$this->id";

            /* ejecucion */
            $BD->query($query);

            /* verificacion de resultaado */
            if ($BD->affected_rows >= 1) {
                return true;
            } else {
                return false;
            }
            $BD->close();
        } else {
            return false;
        }
    }

    /**
     * @return boolean borra un resource de la tabla
     */
    public function delete() {
        if ($this->id !== "null") {
            /* incluye la conexion a la base de datos */
            require_once dirname(dirname(__FILE__)) . '/config/config.php';

            /* query de ejecucion */
            $query = "DELETE FROM $this->tableName WHERE id = $this->id";

            /* ejecucion */
            $BD->query($query);

            /* verificacion de resultaado */
            if ($BD->affected_rows >= 1) {
                return true;
            } else {
                return false;
            }
            $BD->close();
        } else {
            return false;
        }
    }

    /**
     * @return array trae un arreglo de todos los elementos de la bbdd
     */
    public function get_all() {
        /* incluye la conexion a la base de datos */
        require_once dirname(dirname(__FILE__)) . '/config/config.php';

        /* query de ejecucion */
        $query = "SELECT * FROM $this->tableName";

        /* ejecucion */
        $resultado = $BD->query($query);

        /* verificacion de resultaado */
        if ($BD->affected_rows >= 1) {

            /* obtener el array de objetos */
            while ($obj = $resultado->fetch_object()) {
                $res[] = $obj;
            }

            /* devolver el arreglo con los resultados */
            return $res;
        } else {
            return false;
        }
        /* liberar el conjunto de resultados */
        $BD->close();
    }

    /**
     * @return array Obtiene los datos desde la bbdd del resource instanciado (debe tener id) 
     * y devuelve un objeto para utilizar en cualquier situación
     */
    public function get_by_id() {
        if ($this->id !== "null") {
            /* incluye la conexion a la base de datos */
            require_once dirname(dirname(__FILE__)) . '/config/config.php';

            /* query de ejecucion */
            $query = "SELECT * FROM $this->tableName WHERE id = $this->id";

            /* ejecicion */
            $resultado = $BD->query($query);

            if ($BD->affected_rows >= 1) {

                /* obtener el array de objetos */
                while ($obj = $resultado->fetch_object()) {
                    $res[] = $obj;
                }

                /* devolver el arreglo con los resultados */
                return $res;
            } else {
                return false;
            }
            /* liberar el conjunto de resultados */
            $BD->close();
        } else {
            return false;
        }
    }

}

//$resource = new Resource(3, 1, null, null);
//print_r($resource);
//echo '<br>';
//var_dump($resource->get_all());
