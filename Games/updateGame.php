<?php 

require 'game.php';

if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {

	$content = file_get_contents("php://input");
	$data = json_decode($content, true);

	$id		=	$data['id'];	
	$game_type		=	$data['game_type'];	
	$name			=	$data['name'];	
	$logo			=	$data['logo'];	
	$description	=	$data['description'];

	$gameUpdate = Game::update( $id,$game_type, $name, $logo, $description );

	if ($gameUpdate) {
		print 'The data was updated on the Database';
	} else {
		print 'Something is wrong with your query';
	}
}

?>