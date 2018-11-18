<?php 

require '../Database.php';

class Game
{
	
	function __construct()
	{
		
	}

	public static function getAll() {
		$query = "SELECT * FROM games";
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
					id, game_type, name, logo, description
					FROM games
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

	public static function update( $id, $game_type, $name, $logo, $description ) {
		$query = 	"UPDATE games SET
					game_type=?, name=?, logo=?, description=?
					WHERE id=?";
		$cmd = Database::getInstance()->getDb()->prepare($query);
		$cmd->execute(array( $game_type, $name, $logo, $description, $id ));
		return $cmd;
	}

	public static function create( $game_type, $name, $logo, $description ) {		
		$query = 	"INSERT INTO games 
					( game_type, name, logo, description )
					VALUES (?, ?, ?, ?)";
		$cmd = Database::getInstance()->getDb()->prepare($query);
		$cmd->execute(array($game_type, $name, $logo, $description));
		return $cmd;
	}

	public static function delete($id){
		$query ="DELETE FROM games where id=?";
		$cmd = Database::getInstance()->getDb()->prepare($query);
		$cmd->execute(array($id));
		return $cmd;
	}
}


?>