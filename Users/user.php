<?php 

require '../Database.php';

class User
{
	
	function __construct()
	{
		
	}

	public static function getAll() {
		$query = "SELECT * FROM users";
		try {
			$cmd = Database::getInstance()->getDb()->prepare($query);
			$cmd->execute();
			return $cmd->fetchAll(PDO::FETCH_ASSOC);
		} catch (PDOexception $e) {
			return false;
		}
	}

	public static function getById($id){
		$query = 	"SELECT 
					id, rol, username, password, name, lastname, birthday, mail, sex
					FROM users
					WHERE id = ?";
		try {
			$cmd = Database::getInstance()->getDB()->prepare($query);
			$cmd->execute(array($id));
			$row = $cmd->fetch(PDO::FETCH_ASSOC);
			return $row;
		} catch (PDOException $e) {
			return -1;
		}
	}

	public static function getLogin($username, $password){
		$query = "SELECT *
					FROM users 
					WHERE username = ? and password = ?";
		try {
			$cmd = Database::getInstance()->getDB()->prepare($query);
			$cmd->execute(array($username, $password));
			$row = $cmd->fetch(PDO::FETCH_ASSOC);
			return $row;
		} catch(PDOException $e){
			return false;
		}

	}

	public static function create( $rol, $username, $password, $name, $lastname, $birthday, $mail, $sex ) {		
		$query = 	"INSERT INTO users 
					(rol, username, password, name, lastname, birthday, mail, sex)
					VALUES (?,?,?,?,?,?,?,?)";
		$cmd = Database::getInstance()->getDb()->prepare($query);
		$cmd->execute(array($rol, $username, $password, $name, $lastname, $birthday, $mail, $sex));
		
		return $cmd;
	}

	public static function update( $id, $rol, $username, $password, $name, $lastname, $birthday, $mail, $sex ) {
		$query = 	"UPDATE users SET
					rol=?, username=?, password=?, name=?, lastname=?, birthday=?, mail=?, sex=?
					WHERE id=?";
		$cmd = Database::getInstance()->getDb()->prepare($query);
		$cmd->execute(array( $rol, $username, $password, $name, $lastname, $birthday, $mail, $sex, $id ));

		return $cmd;
	}

	public static function delete($id) {
		$query = "DELETE FROM users
					WHERE id=?";
		$cmd = Database::getInstance()->getDb()->prepare($query);
		$cmd->execute(array($id));

		return $cmd;
	}
}


?>