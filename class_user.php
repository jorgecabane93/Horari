<?php

/**
 * Archivo de definicion de la clase user.
 * Las clases se definen con Mayuscula para diferenciarlas de los metodos
 */
class User {

    /**
     * @property type $name Description
     */
    protected $tablename = 'user';
 
    protected $id,$email,$phone;

    public function __construct($id = null, $name = null, $secondname = null, $lastname = null, $secondlastname = null, $birthdate = null, $email = null, $phone = null, $extra = null, $secondextra = null) {
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

    public function update() {
    	/**
    	 * @return boolean actualiza la ubicacion
    	 */
    	//incluye la conexion a la base de datos
    	require_once dirname(__FILE__) . '/config/config.php';
    	/**
    	 * @var string query de ejecuci�n
    	 */
    	$query = "UPDATE $this->tablename SET 
    			  name = '$this->name', 
    			  secondname = '$this->secondname', 
    			  lastname = '$this->lastname', 
    			  secondlastname = '$this->secondlastname',
    			  birthdate = $this->birthdate,
    			  email = '$this->email',
    			  phone = '$this->phone',
    			  extra = $this->'extra',
    			  secondextra = $this->secondextra
    			  WHERE idColor = $this->id";
    	/**
    	* @var mysql resultado mysql
    	*/
    	$result = $BD->query($query);
    	if ($result) {
    		return true;
    	} else {
    		return false;
    	}
    }
    
    public function insert(){
    	/**
    	 * @return boolean Inserta en la base de datos
    	 */
    	require_once dirname(__FILE__) . '/config/config.php';
    	/**
    	 * @var string query de ejecuci�n
    	 */
    	if($this->name !== null && $this->lastname !== null && $this->email !== null){
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
    		$result = $BD->query($query);
    		return $result;
    	}
    }
    
    public function delete(){
    	/**
    	 * @return boolean borra en la base de datos
    	 */
    	require_once dirname(__FILE__) . '/config/config.php';
    	/**
    	 * @var string query de ejecuci�n
    	 */
    	if($this->id !== null){
    		$query = "DELETE FROM $this->tablename WHERE id = $this->id";
    		$result = $BD->query($query);
    		return $result;
    	}
    }
    
    public function get_by_id(){
    	/**
    	 * @return boolean borra en la base de datos
    	 */
    	require_once dirname(__FILE__) . '/config/config.php';
    	/**
    	 * @var string query de ejecuci�n
    	 */
    	$query = "SELECT * 
    			  FROM user 
    			  WHERE id = $this->id";
    	/**
    	 * @var mysql resultado mysql
    	 */
    	$result = $BD->query($query);
    	
    	
    	
    	return $result;
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
    	$result = $BD->query($query);
    }
    
}
$user = new User(8);
$result = $user->get_by_id();
print_r($result);