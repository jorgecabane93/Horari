<?php
class user_level {
	/**
	 *
	 * @var string nombre de la tabla
	 */
	public $tableName = 'userlevel';
	public $headers = ["id", "user_id", "level_id","lastmodified"];
	
	public function __construct($id = 'null', $userid = 'null', $levelid = 'null') {
		$this->id = $id;
		$this->userid = $userid;
		$this->levelid = $levelid;
	}
	public function update() {
		/**
		 * @return boolean updates userlevel
		 */
		//incluye la conexion a la base de datos
		require_once dirname(__FILE__) . '/../config/config.php';
		/**
		 * @var string query de ejecución
		 */
		$query = "UPDATE  $this->tableName  SET user_id = ' $this->userid ', level_id = ' $this->levelid ', lastmodified = NOW() WHERE id = $this->id";
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
			$query = "INSERT INTO  . $this->tableName .  VALUES ('null', ' . $this->user_id . ', ' . $this->level_id . ', NOW())";
			
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
