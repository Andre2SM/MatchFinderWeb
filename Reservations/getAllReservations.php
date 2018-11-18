<?php 

require 'reservation.php';



if ($_SERVER['REQUEST_METHOD'] == 'GET') {

	$reservations = Reservation::getAll();



	if ($reservations) {

		$datos['estado'] 	= 1;

		$datos['reservations']		= $reservations;



		print json_encode($datos);

	} else {

		print json_encode(array(

			"estado" => 2,

            "mensaje" => "Ha ocurrido un error"

        ));

	}

}



?>