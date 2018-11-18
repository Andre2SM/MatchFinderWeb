<?php 

require 'game.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

	$games = Game::getAll();

	if ($games) {
		$datos['estado'] 	= 1;
		$datos['games']		= $games;

		print json_encode($datos);
	} else {
		print json_encode(array(
			"estado" => 2,
            "mensaje" => "Ha ocurrido un error"
        ));
	}
}

?>