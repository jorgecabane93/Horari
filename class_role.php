<?php
class role {
	/**
	 *
	 * @var string nombre de la tabla
	 */
	public $tableName = 'role';
	public $headers = ["id", "role", "lastmodified"];
	
	public function __construct($id = 'null', $role = 'null') {
		$this->id = $id;
		$this->role = $role;
	}
	public function update() {
		/**
		 * @return boolean updates role
		 */
		//incluye la conexion a la base de datos
		require_once dirname(__FILE__) . '/../config/config.php';
		/**
		 * @var string query de ejecución
		 */
		$query = "UPDATE  $this->tableName  SET role = ' $this->role ', lastmodified = NOW() WHERE id = $this->id";
		/**
		 * @var mysql resultado mysql
		 */

		if ($res = $BD->query($query)) {
			return true;
		} else {
			return false;
		}
		
		$BD->close();
	}
	public function insert() {
		/**
		 * @return boolean Inserta en la base de datos
		 */
		require_once dirname(__FILE__) . '/../config/config.php';
		/**
		 * @var string query de ejecución
		 */
		if ($this->id !== null) {
			$query = "INSERT INTO  . $this->tableName .  VALUES ('null', ' . $this->role . ', NOW())";
			
			if ($res = $BD->query($query)) {
				return true;
			} else {
				return false; //la consulta no se ejecuto
			}
		} else {
			return false; //no hay un dato asignado
		}
		
		$BD->close();
	}
	public function delete() {
		/**
		 * @return boolean borra de la base de datos
		 */
		require_once dirname(__FILE__) . '/../config/config.php';
		/**
		 * @var string query de ejecución
		 */
		if ($this->id !== null) {
			$query = "DELETE FROM  $this->tableName  WHERE  $this->headers[0] = $this->id";

			if ($res = $BD->query($query)) {
				return true;
			} else {
				return false; //la consulta no se ejecuto
			}
		} else {
			return false; //no hay un dato asignado
		}
		
		$BD->close();
	}
	public function getAll() {
		/**
		 *
		 * @return array|false devuelve todas las userlevel o falso si no hay
		 */
		//incluye la conexion a la base de datos
		require_once dirname(__FILE__) . '/../config/config.php';
		/**
		 * @var string query de ejecución
		 */
		$query = "SELECT * FROM  $this->tableName";
		/**
		 * @var mysql resultado mysql
		 */
		$res = $BD->query($query);
		if (mysql_num_rows($res) >= 1) {
			while ($row = mysql_fetch_assoc($res)) {
				$result [] = $row;
			}
			return $result;
		} else {
			return false;
		}
	}
}
?>