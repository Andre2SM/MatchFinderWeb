<?php 

require 'reservation.php';

ini_set('display_errors', 'On');
error_reporting(E_ALL);

if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {

	$content = file_get_contents("php://input");
	$data = json_decode($content, true);

	$business_id	=	$data['business_id'];
	$user_id		=	$data['user_id'];
	$date_time		=	$data['date_time'];
	$init_hour		=	$data['init_hour'];

	$createdReservations = Reservation::create( $business_id, $user_id, $date_time, $init_hour );

	if ($createdReservations) {
		print 'Data was added correctly to the database';
	}else {
		print 'There was an error';
	}

}

?>