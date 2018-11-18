<?php 

require '../Database.php';

class Business
{
	
	function __construct()
	{
		
	}

	public static function getAll() {
		$query = "SELECT * FROM businesses";
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
					id, business_type, name, logo, description, price, seating, latitude, longitude, opening_days, init_hour, fin_hour
					FROM businesses
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

	public static function create( $business_type, $name, $logo, $description, $price, $seating, $latitude, $longitude, $opening_days, $init_hour, $fin_hour ) {		
		$query = 	"INSERT INTO businesses 
					(business_type, name, logo, description, price, seating, latitude, longitude, opening_days, init_hour, fin_hour)
					VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$cmd = Database::getInstance()->getDb()->prepare($query);
		$cmd->execute(array($business_type, $name, $logo, $description, $price, $seating, $latitude, $longitude, $opening_days, $init_hour, $fin_hour));
		return $cmd;
	}

	public static function update( $id, $business_type, $name, $logo, $description, $price, $seating, $latitude, $longitude, $opening_days, $init_hour, $fin_hour ) {
		$query = 	"UPDATE businesses SET
					business_type=?, name=?, logo=?, description=?, price=?, seating=?, latitude=?, longitude=?, opening_days=?, init_hour=?, fin_hour=?
					WHERE id=?";
		$cmd = Database::getInstance()->getDb()->prepare($query);
		$cmd->execute(array( $business_type, $name, $logo, $description, $price, $seating, $latitude, $longitude, $opening_days, $init_hour, $fin_hour, $id ));

		return $cmd;
	}

	public static function delete($id){
		$query ="DELETE FROM businesses where id=?";
		$cmd = Database::getInstance()->getDb()->prepare($query);
		$cmd->execute(array($id));
		return $cmd;
	}
}


?>