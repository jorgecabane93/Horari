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
     * @return array get_all(void) trae un arreglo de todos los elementos de la bbdd
     */
    public function get_all() {
        /* incluye la conexion a la base de datos */
        require_once dirname(__FILE__) . '/config/config.php';
        /* query de ejecucion */
        $query = "SELECT * FROM $this->tableName";

        $resultado = $BD->query($query);
        if ($resultado->num_rows >= 1) {
            /* obtener el array de objetos */

            while ($obj = $resultado->fetch_object()) {
                $res[] = $obj;
            }

            /* liberar el conjunto de resultados */
            $resultado->close();
            /* devolver el arreglo con los resultados */
            return $res;
        } else {
            //return $query;
            return false;
        }
    }

}

//$center = new Center();
//
//foreach ($center->get_all() as $obj) {
//    if (is_object($obj)) {
//        echo "$obj->name <br>";
//    }
//}
