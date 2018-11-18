<?php 

require 'business.php';

if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {

	$content = file_get_contents("php://input");
	$data = json_decode($content, true);

	$id				=	$id['id'];
	$business_type	=	$data['business_type'];
	$name			=	$data['name'];			
	$logo			=	$data['logo'];			
	$description	=	$data['description'];		
	$price			=	$data['price'];
	$seating		=	$data['seating'];
	$latitude		=	$data['latitude'];
	$longitude		=	$data['longitude'];
	$opening_days	=	$data['opening_days'];
	$init_hour		=	$data['init_hour'];
	$fin_hour		=	$data['fin_hour'];

	$businessUpdate = Business::update( $id, $business_type, $name, $logo, $description, $price, $seating, $latitude, $longitude, $opening_days, $init_hour, $fin_hour );

	if ($businessUpdate) {
		print 'The data was updated on the Database';
	} else {
		print 'Something is wrong with your query';
	}
}


?>