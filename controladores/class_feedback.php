<?php

/**
 * Archivo de definicion de la clase feedback.
 * Las clases se definen con Mayuscula para diferenciarlas de los metodos
 */
class Feedback {

    /**
     * @property int $id id del feedback
     * @property int $user_id id del usuario al que pertenece
     * @property string $tableName nombre de la tabla en la base de datos 
     */
    protected $id, $user_id, $tableName = "feedback";

    public function __construct($id = "null", $user_id = "null", $title = "null", $comment = "null") {
        //setea los atributos a null cuando la clase es instanciada
        $this->id = $id;
        $this->user_id = $user_id;
        $this->title = $title;
        $this->comment = $comment;
        $this->status = true;
    }

    /**
     * @return boolean inserta un nuevo feedback
     */
    public function insert() {
        if ($this->user_id !== "null" && $this->title !== "null") {
            /* incluye la conexion a la base de datos */
            require_once dirname(__FILE__) . '/config/config.php';

            /* query de ejecucion */
            $query = "INSERT INTO $this->tableName VALUES (null, $this->user_id, '$this->title', '$this->comment', NOW(), $this->status)";

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
     * @return boolean actualiza los datos del feedback
     */
    public function update() {
        if ($this->id !== "null") {
            /* incluye la conexion a la base de datos */
            require_once dirname(__FILE__) . '/config/config.php';

            /* query de ejecucion */
            $query = "UPDATE $this->tableName SET user_id = $this->user_id, title = '$this->title', comment = '$this->comment', status = $this->status WHERE id=$this->id";

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
            require_once dirname(__FILE__) . '/config/config.php';

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
        require_once dirname(__FILE__) . '/config/config.php';

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
     * @return array Obtiene los datos desde la bbdd del feedback instanciado (debe tener id) 
     * y devuelve un objeto para utilizar en cualquier situación
     */
    public function get_by_id() {
        if ($this->id !== "null") {
            /* incluye la conexion a la base de datos */
            require_once dirname(__FILE__) . '/config/config.php';

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

//$feedback = new Feedback(3, 1, null, null);
//print_r($feedback);
//echo '<br>';
//var_dump($feedback->get_all());
