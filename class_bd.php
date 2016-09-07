<?php

/**
 * Archivo de definicion de la clase BD.
 * Las clases se definen con Mayuscula para diferenciarlas de los metodos
 */
class BD  {
	
// 	protected  $host;
// 	protected  $user;
// 	protected  $pass;
// 	protected  $db;
	
	
//     public function __construct ( $host, $user, $pass, $db ) {
//     	$this->host = $host;
//     	$this->user = $user;
//     	$this->pass = $pass;
//     	$this->db = $db;
//     }
    /**
     * @property string $host host de la base de datos
     * @property string $user usuario de la base de datos
     * @property string $pass contraseña de la base de datos
     * @property string $db nombre de la base de datos
     * @property object $myconn conexion a bbdd
     */
	protected  $host = 'localhost';
	protected  $user = 'root';
	protected  $pass = '';
	protected  $db = 'horari';
	public $myconn;
    
	/**
	 * @method function connect() conexion a bbdd
	 * @return object conexion a bbdd
	 */
	public function connect() {		
			$con = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
		if (!$con) {
			die('Could not connect to database!');
		}
		else {
			$this->myconn = $con;
//			echo 'Connection established!';
		}
		    return $this->myconn;		    
	}
	
	/**
	 * @method function close() cierra conexion a bbdd
	 * @return void
	 */
	public function close() {
		mysqli_close($myconn);
		echo 'Connection closed!';
	}

}
