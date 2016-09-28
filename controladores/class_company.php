<?php

/**
 * Archivo de definicion de la clase company.
 * Las clases se definen con Mayuscula para diferenciarlas de los metodos
 */
class Company {

    /**
     * @property int $id id de la company
     * @property string $tableName nombre de la tabla en la base de datos 
     */
    protected $id, $tableName = "company";

    public function __construct($id = "null", $name = "null", $dni = "null", $comercialbusiness = "null", $address = "null") {
        //setea los atributos a null cuando la clase es instanciada
        $this->id = $id;
        $this->name = $name;
        $this->dni = $dni;
        $this->comercialbusiness = $comercialbusiness;
        $this->address = $address;
        //campos extra
        //$this->extralocation = $extralocation;
        //$this->extra = $extra;
    }

    /**
     * @return boolean inserta un nuevo centro
     */
    public function insert() {
        if ($this->dni !== "null" && $this->name !== "null" && $this->comercialbusiness !== "null") {
            /* incluye la conexion a la base de datos */
            require_once dirname(dirname(__FILE__)) . '/config/config.php';

            /* query de ejecucion */
            $query = "INSERT INTO $this->tableName VALUES (null, $this->name, '$this->dni', '$this->comercialbusiness', '$this->address', null, null, NOW())";

            /* ejecucion */
            $BD->query($query);

            /* verificacion de resultaado */
            if ($BD->affected_rows >= 1) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
        $BD->close();
    }

    /**
     * @return boolean actualiza los datos del centro
     */
    public function update() {
        if ($this->id !== "null") {
            /* incluye la conexion a la base de datos */
            require_once dirname(dirname(__FILE__)) . '/config/config.php';

            /* query de ejecucion */
            $query = "UPDATE $this->tableName SET name = '$this->name', dni = '$this->dni', comercialbusiness = '$this->comercialbusiness', address = '$this->address', lastmodified = NOW() WHERE id=$this->id";

            /* ejecucion */
            $BD->query($query);

            /* verificacion de resultaado */
            if ($BD->affected_rows >= 1) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
        $BD->close();
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
        } else {
            return false;
        }
        $BD->close();
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

//$company = new Company(3, 1, null, null);
//print_r($company);
//echo '<br>';
//var_dump($company->get_all());
