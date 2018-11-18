<?php 

require 'game.php';

if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {

	$content = file_get_contents("php://input");
	$data = json_decode($content, true);

	$game_type		=	$data['game_type'];	
	$name			=	$data['name'];	
	$logo			=	$data['logo'];	
	$description	=	$data['description'];

	$createdGame = Game::create( $game_type, $name, $logo, $description );

	if ($createdGame) {
		print 'Data was added correctly to the database';
	}else {
		print 'There was an error';
	}

}

?>