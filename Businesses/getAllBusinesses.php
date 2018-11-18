<?php 

require 'business.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

	$businesses = Business::getAll();

	if ($businesses) {

		$datos['estado'] 	= 1;

		$datos['businesses']		= $businesses;

		print json_encode($datos);

	} else {

		print json_encode(array(

			"estado" => 2,

            "mensaje" => "Ha ocurrido un error"

        ));

	}

}
?>