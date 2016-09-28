<?php

/**
 * Archivo de definicion de la clase user.
 * Las clases se definen con Mayuscula para diferenciarlas de los metodos
 */
class Password {

    /**
     * @property int $userid id del usuario
     * @property string $password clave del usuario
     * @property string $tableName nombre de la tabla en la base de datos 
     */
    protected $tablename = "password", $userid,$password;

    public function __construct($userid = null, $password = null) {
    	/* setea los atributos a null cuando la clase es instanciada */
    	$this->userid = $userid;
        $this->password = $password;
    }	

    /**
     * @return boolean Inserta en la base de datos
     */
    public function insert(){
    	if($this->userid !== null){
    		$password = substr(md5(microtime()),rand(0,26),5).rand(1000000,9999999);
    		/* incluye la conexion a la base de datos */
    		require_once dirname(dirname(__FILE__)) . '/config/config.php';
    		
    		/* query de ejecucion */
    		$query = "INSERT INTO $this->tablename
    		VALUES ($this->userid,
    				'$password',
    				NOW()
    				)";
    		
    		/* ejecucion */
    		$BD->query($query);
    
    		/* verificacion de resultaado */
    		if($BD->affected_rows >= 1){
    			return true;
    		}else{
    			return false;
    		}
    		/* liberar el conjunto de resultados */
    		$BD->close();
    	}
    }

    /**
     * @return boolean actualiza la ubicación
     */
    public function update() {
    	if ($this->userid !== "null") {
	    	
	    	/* incluye la conexion a la base de datos */
	    	require_once dirname(dirname(__FILE__)) . '/config/config.php';
	    	
	    	/* query de ejecucion */
	    	$query = "UPDATE $this->tablename SET 
	    			  password = md5($this->password), 
	    			  lastmodified = '$this->secondname', 
	    			  WHERE user_id = $this->userid";
	    	
			/* ejecucion */
	    	$BD->query($query);
	    	
	    	/* verificacion de resultaado */
	    	if ($BD->affected_rows >= 1) {
	    		return true;
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