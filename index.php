<?php

require('includes/db_connect.php');
include('templates/navigation.html');
include('templates/header.html');

if (!isset($_GET['page'])) {
	$page_id = 'home'; // display the home page
} else {
	$page_id = $_GET['page']; // display any requested page
}

switch ($page_id) {
	case 'home' :
	    include 'views/home.php';
	    break;
	case 'artist' :
	    include 'views/artist.php';
	    break;
	case 'record' :
	    include 'views/record.php';
	    break;
	case 'orders' :
	    include 'views/orders.php';
	    break;
	case 'order' :
	    include 'views/order.php';
	    break;
	case 'add-record' :
	    include 'views/add-record.php';
	    break;
	default :
	    include 'views/404.php';
}

include('templates/footer.html');
mysqli_close($link);
?>