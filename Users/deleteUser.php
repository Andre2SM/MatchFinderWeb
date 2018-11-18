<?php 

require 'user.php';

if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {

	$content = file_get_contents("php://input");
	$data = json_decode($content, true);

	$id			= 	$data['id'];

	$userDelete = User::delete( $id );

	if ($userDelete) {
		print 'The user was removed from Database';
	} else {
		print 'something is wrong';
	}

}

?>