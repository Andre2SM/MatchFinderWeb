<?php 

require 'game.php';

if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {

	$content = file_get_contents("php://input");
	$data = json_decode($content, true);

	$id			= 	$data['id'];

	$gameDelete = Game::delete( $id );

	if ($gameDelete) {
		print 'The data was removed from Database';
	} else {
		print 'something is wrong';
	}

}

?>