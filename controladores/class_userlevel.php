<?php
/**
 * Archivo de definicion de la clase user level.
 * Las clases se definen con Mayuscula para diferenciarlas de los metodos
 */
class User_level {

	/**
	 * @property int $id id de la capability
	 * @property int $capability nombre de la capability
	 * @property string $tablename nombre de la tabla en la base de datos
	 */
	
	protected $id, $userid, $levelid, $tablename = "userlevel";
	
	public function __construct($id = 'null', $userid = 'null', $levelid = 'null') {
		//setea los atributos a null cuando la clase es instanciada
		$this->id = $id;
		$this->userid = $userid;
		$this->levelid = $levelid;
	}
	
	/**
	 * @return boolean inserta una nueva user level
	 */
	public function insert() {
		if ($this->userid !== "null" && $this->levelid !== "null") {
			/* incluye la conexion a la base de datos */
            require_once dirname(dirname(__FILE__)) . '/config/config.php';

			/* query de ejecucion */
			$query = "INSERT INTO $this->tableName VALUES (null, ' $this->userid ', ' $this->levelid ', NOW())";
				
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
	 * @return boolean actualiza los datos de la user level
	 */
	public function update() {
		if ($this->id !== "null") {
			/* incluye la conexion a la base de datos */
            require_once dirname(dirname(__FILE__)) . '/config/config.php';
	
			/* query de ejecucion */
			$query = "UPDATE  $this->tableName  SET user_id = ' $this->userid ', level_id = ' $this->levelid ', lastmodified = NOW() WHERE id = $this->id";

			/* ejecucion */
			$BD->query($query);
			
		    /* verificacion de resultaado */
            if ($BD->affected_rows >= 1) {
                return true;
            } else {
                return false;
            }
            $BD->close();
	}
	else {
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
			$query = "DELETE FROM  $this->tablename  WHERE  id = $this->id";

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
	public function getAll() {
        /* incluye la conexion a la base de datos */
        require_once dirname(dirname(__FILE__)) . '/config/config.php';

        /* query de ejecucion */
		$query = "SELECT * FROM  $this->tablename";

		/* ejecucion */
		$res = $BD->query($query);
		
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
    		$query = "SELECT * FROM $this->tablename WHERE id = $this->id";
    
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
