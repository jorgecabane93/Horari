<?php

/**
 * Archivo de definicion de la clase center.
 * Las clases se definen con Mayuscula para diferenciarlas de los metodos
 */
class Center {

    /**
     * @property int $id id del centro
     * @property int $company_id id de la compañia a la que pertenece
     * @property string $tableName nombre de la tabla en la base de datos 
     */
    protected $id, $company_id, $tableName = "center";

    public function __construct($id = "null", $company_id = "null", $name = "null", $acronym = "null") {
        //setea los atributos a null cuando la clase es instanciada
        $this->id = $id;
        $this->company_id = $company_id;
        $this->name = $name;
        $this->acronym = $acronym;
    }

    /**
     * @return boolean inserta un nuevo centro
     */
    public function insert() {
        if ($this->company_id !== "null" && $this->name !== "null") {
            /* incluye la conexion a la base de datos */
            require_once dirname(dirname(__FILE__)) . '/config/config.php';

            /* query de ejecucion */
            $query = "INSERT INTO $this->tableName VALUES (null, $this->company_id, '$this->name', '$this->acronym', NOW())";

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
     * @return boolean actualiza los datos del centro
     */
    public function update() {
        if ($this->id !== "null") {
            /* incluye la conexion a la base de datos */
            require_once dirname(dirname(__FILE__)) . '/config/config.php';

            /* query de ejecucion */
            $query = "UPDATE $this->tableName SET company_id = $this->company_id, name = '$this->name', acronym = '$this->acronym', lastmodified = NOW() WHERE id=$this->id";

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
     * @return boolean borra un centro de la tabla
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
     * @return array Obtiene los datos desde la bbdd del centro instanciado (debe tener id) 
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

//$center = new Center(3, 1, null, null);
//print_r($center);
//echo '<br>';
//var_dump($center->get_all());
