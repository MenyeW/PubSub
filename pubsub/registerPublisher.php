<?php
	include 'Register.php';
	$registerClass = new Register;
	$name = $_POST['name'];
	$registerClass->registerPublisher($name);
	$response['status'] = 'success';
	echo json_encode($response);
?>