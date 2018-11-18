<?php 

require 'user.php';

if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {

	$content = file_get_contents("php://input");
	$data = json_decode($content, true);

	$rol		=	$data['rol'];
	$username	=	$data['username'];
	$password	=	$data['password'];
	$name		=	$data['name'];
	$lastname	=	$data['lastname'];
	$birthday	=	$data['birthday'];
	$mail		=	$data['mail'];
	$sex		=	$data['sex'];

	User::create( $rol, $username, $password, $name, $lastname, $birthday, $mail, $sex );

print 'The data was saved on the Database';

}

?>