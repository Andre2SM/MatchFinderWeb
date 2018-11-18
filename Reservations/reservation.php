<?php 

require '../Database.php';

class Reservation
{
	
	function __construct()
	{
		
	}

	public static function getAll() {
		$query = "SELECT * FROM reservations";
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
					*
					FROM reservations
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

	public static function update( $id, $business_id, $user_id, $date_time, $init_hour ) {
		$query = 	"UPDATE reservations SET
					business_id=?, user_id=?, date_time=?, init_hour=?
					WHERE id=?";
		$cmd = Database::getInstance()->getDb()->prepare($query);
		$cmd->execute(array( $business_id, $user_id, $date_time, $init_hour, $id ));

		return $cmd;
	}

	public static function create( $business_id, $user_id, $date_time, $init_hour ) {
		$query = 	"INSERT INTO reservations 
					(business_id, user_id, date_time, init_hour)
					VALUES (?,?,?,?)";
		$cmd = Database::getInstance()->getDb()->prepare($query);
		$cmd->execute(array($business_id, $user_id, $date_time, $init_hour));
		return $cmd;
	}

	public static function delete($id){
		$query ="DELETE FROM reservations where id=?";
		$cmd = Database::getInstance()->getDb()->prepare($query);
		$cmd->execute(array($id));
		return $cmd;
	}
}


?>