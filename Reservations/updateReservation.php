<?php 

require 'reservation.php';

if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {

	$content = file_get_contents("php://input");
	$data = json_decode($content, true);

	$id 			=	$data['id'];
	$business_id	=	$data['business_id'];
	$user_id		=	$data['user_id'];
	$date_time		=	$data['date_time'];
	$init_hour		=	$data['init_hour'];

	$createdGame = Reservation::update( $id, $business_id, $user_id, $date_time, $init_hour );

	if ($createdGame) {
		print 'Data was updated correctly to the database';
	}else {
		print 'There was an error';
	}

}

?>