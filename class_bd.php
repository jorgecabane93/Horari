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

	protected  $host = 'localhost';
	protected  $user = 'root';
	protected  $pass = '';
	protected  $db = 'horari';
	public $myconn;
    
	public function connect() {		
		$con = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
		if (!$con) {
			die('Could not connect to database!');
		}
		else {
			$this->myconn = $con;
			echo 'Connection established!';
		}
		    return $this->myconn;		    
	}
	
	public function close() {
		mysqli_close($myconn);
		echo 'Connection closed!';
	}

}
