<?php
/**
 * Archivo de definicion de la clase capability.
 * Las clases se definen con Mayuscula para diferenciarlas de los metodos
 */
class Center_resource {

	/**
	 * @property int $id id de la capability
	 * @property int $capability nombre de la capability
	 * @property string $tablename nombre de la tabla en la base de datos
	 */
	
	protected $centerid, $resourceid, $tablename = "center_resource";
	
	public function __construct($centerid = 'null', $resourceid = 'null') {
		$this->centerid = $centerid;
		$this->resourceid = $resourceid;
	}
	
	/**
	 * @return boolean inserta una nueva center resource
	 */
	public function insert() {
        if ($this->company_id !== "null" && $this->name !== "null") {
            /* incluye la conexion a la base de datos */
            require_once dirname(dirname(__FILE__)) . '/config/config.php';

            /* query de ejecucion */
			$query = "INSERT INTO   $this->tableName  VALUES ('  $this->centerid  ', ' $this->resourceid ', NOW())";
				
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
     * @return boolean actualiza los datos del center resource
     */
	public function update() {
        if ($this->centerid !== "null" && $this->resourceid !== "null") {
            /* incluye la conexion a la base de datos */
            require_once dirname(dirname(__FILE__)) . '/config/config.php';

            /* query de ejecucion */
			$query = "UPDATE  $this->tableName  SET center_id = ' $this->centerid ', resource_id = ' $this->resourceid ', lastmodified = NOW() WHERE center_id = $this->centerid and resource_id = $this->resourceid";
        
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
	    if ($this->centerid !== "null" && $this->resourceid !== "null") {
            /* incluye la conexion a la base de datos */
            require_once dirname(dirname(__FILE__)) . '/config/config.php';

            /* query de ejecucion */
			$query = "DELETE FROM  $this->tableName  WHERE  center_id = $this->centerid and resource_id = $this->resourceid";

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
    	if ($this->centerid !== "null" && $this->resourceid !== "null") {
    		/* incluye la conexion a la base de datos */
    		require_once dirname(dirname(__FILE__)) . '/config/config.php';
    
    		/* query de ejecucion */
    		$query = "SELECT * FROM $this->tableName WHERE center_id = $this->centerid and resource_id = $this->resourceid";
    
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

