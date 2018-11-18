<?php 

require 'user.php';

if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {

	$content = file_get_contents("php://input");
	$data = json_decode($content, true);

	$id			= 	$data['id'];
	$rol		=	$data['rol'] ;
	$username	=	$data['username'];
	$password	=	$data['password'];
	$name		=	$data['name'];
	$lastname	=	$data['lastname'];
	$birthday	=	$data['birthday'];
	$mail		=	$data['mail'];
	$sex		=	$data['sex'];

	$userUpdate = User::update( $id, $rol, $username, $password, $name, $lastname, $birthday, $mail, $sex );

	if ($userUpdate) {
		print 'The data was updated on the Database';
	} else {
		print 'Something is wrong with your query';
	}
}

 ?>