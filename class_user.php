<?php

/**
 * Archivo de definicion de la clase user.
 * Las clases se definen con Mayuscula para diferenciarlas de los metodos
 */
class User {

    /**
     * @property int $id id del usuario
     * @property string $email correo del usuario
     * @property int $phone telefono del usuario
     * @property string $tableName nombre de la tabla en la base de datos 
     */
    protected $tablename = "user", $id,$email,$phone;

    public function __construct($id = null, $name = null, $secondname = null, $lastname = null, $secondlastname = null, $birthdate = null, $email = null, $phone = null, $extra = null, $secondextra = null) {
    	/* setea los atributos a null cuando la clase es instanciada */
    	$this->id = $id;
        $this->name = $name;
        $this->secondname = $secondname;
        $this->lastname = $lastname;
        $this->secondlastname = $secondlastname;
        $this->birthdate = $birthdate;
        $this->email = $email;
        $this->phone = $phone;
        $this->extra = $extra;
        $this->secondextra = $secondextra;
    }	

    /**
     * @return boolean Inserta en la base de datos
     */
    public function insert(){
    	if($this->name !== null && $this->lastname !== null && $this->email !== null){
    
    		/* incluye la conexion a la base de datos */
    		require_once dirname(__FILE__) . '/config/config.php';
    		/**
    		 * @var string query de ejecución
    		 */
    		/* query de ejecucion */
    		$query = "INSERT INTO $this->tablename
    		VALUES ('null',
    		'$this->name',
    		'$this->secondname',
    		'$this->lastname',
    		'$this->secondlastname',
    		'$this->birthdate',
    		'$this->email',
    		'$this->phone',
    		'$this->extra',
    		'$this->secondextra',
    		NOW(),
    		NOW()
    		)";
    		/* ejecucion */
    		$BD->query($query);
    
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
    	if ($this->id !== "null") {
	    	
	    	/* incluye la conexion a la base de datos */
	    	require_once dirname(__FILE__) . '/config/config.php';
	    	
	    	/* query de ejecucion */
	    	$query = "UPDATE $this->tablename SET 
	    			  name = '$this->name', 
	    			  secondname = '$this->secondname', 
	    			  lastname = '$this->lastname', 
	    			  secondlastname = '$this->secondlastname',
	    			  birthdate = $this->birthdate,
	    			  email = '$this->email',
	    			  phone = '$this->phone',
	    			  extra = '$this->'extra',
	    			  secondextra = '$this->secondextra'
	    			  WHERE idColor = $this->id";
	    	
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
    
    /**
     * @return boolean borra en la tabla user
     */
    public function delete(){
    	if($this->id !== null){
	    	/* incluye la conexion a la base de datos */
	    	require_once dirname(__FILE__) . '/config/config.php';
	    	
	    	/* query de ejecucion */
    		$query = "DELETE FROM $this->tablename WHERE id = $this->id";
    		
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
    	} else {
    		return false;
    	}
    }
    
    /**
     * @return boolean borra en la base de datos
     */
    public function get_by_id(){
    	if($this->id !== null){
    		/* incluye la conexion a la base de datos */
	    	require_once dirname(__FILE__) . '/config/config.php';
	    	
	    	/* query de ejecucion */
	    	$query = "SELECT * 
	    			  FROM $this->tablename 
	    			  WHERE id = $this->id";
	    	
	    	/* ejecucion */
	    	$BD->query($query);
	    	
	    	/* verificacion de resultaado */
	    	if($BD->affected_rows >= 1){
	    		
	    		/* obtener el array de objetos */
		    	while ($obj = $execution->fetch_object()) {
		    		$result[] = $obj;
		    	}
		    	
		    	/* devolver el arreglo con los resultados */
		    	return $result;
    		}else{
    			return false;
    		}
    		/* liberar el conjunto de resultados */
    		$BD->close();
   		}else{
   			return false;
   		}
    }
    
    public function get_all(){
    	/**
    	 * @return boolean borra en la base de datos
    	 */
    	require_once dirname(__FILE__) . '/config/config.php';
    	/**
    	 * @var string query de ejecuci�n
    	 */
    	$query = "SELECT * FROM user";
    	/**
    	 * @var mysql resultado mysql
    	 */
    	if($execution = $BD->query($query)){
    		while ($obj = $execution->fetch_object()) {
	    		$result[] = $obj;
	    	}
	    	return $result;
    	}else{
    		return false;
    	}
    	/* liberar el conjunto de resultados */
    	$BD->close();
    }   
}