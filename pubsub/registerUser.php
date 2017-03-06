<?php
	include 'Register.php';
	$registerClass = new Register;
	$name = $_POST['name'];
	$registerClass->registerUser($name);
	$response['status'] = 'success';
	echo json_encode($response);
?>