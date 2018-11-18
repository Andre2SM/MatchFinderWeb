<?php 

require 'user.php';

ini_set('display_errors', 'On');
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$content = file_get_contents("php://input");
	$data = json_decode($content, true);

	$username	= $data['username'];
	$password 	= $data['password'];

	$users = User::getLogin($username, $password);

	if ($users) {
		$datos['estado']	= 1;
		$datos['users']		= $users;

		print json_encode($datos);
	}else{
		print 'Data not found';
	}
}

?>