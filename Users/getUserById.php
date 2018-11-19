<?php 

require 'user.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$content = file_get_contents("php://input");
	$data = json_decode($content, true);

	$id	= $data['id'];

	$users = User::getById($id);

	if ($users) {
		$datos['estado']	= 1;
		$datos['users']		= $users;

		print json_encode($datos);
	}else{
		print 'Data not found';
	}
}

?>