<?php 

require 'business.php';

if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {

	$content = file_get_contents("php://input");
	$data = json_decode($content, true);

	$id			= 	$data['id'];

	$businessDelete = Business::delete( $id );

	if ($businessDelete) {
		print 'The user was removed from Database';
	} else {
		print 'something is wrong';
	}

}

?>