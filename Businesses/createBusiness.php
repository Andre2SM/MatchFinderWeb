<?php 

require 'business.php';

if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {

	$content = file_get_contents("php://input");
	$data = json_decode($content, true);

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

	$businessCreate = Business::create( $business_type, $name, $logo, $description, $price, $seating, $latitude, $longitude, $opening_days, $init_hour, $fin_hour );

	if ($businessCreate) {
		print 'Data was added correctly to the database';
	}else {
		print 'There was an error';
	}
}

?>