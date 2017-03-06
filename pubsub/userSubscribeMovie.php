<?php
	$userName = $_POST['userName'];
	$movieName = $_POST['movieName'];
	
	include 'Finder.php';
	$finder = new Finder;
	$user = $finder->findUserByName($userName);
	$movie = $finder->findMovieByName($movieName);
	
	if(empty($user->getUserId())){
		$response['status'] = 'fail';
		$response['errorMessage'] = "User Not Found";
		echo json_encode($reponse);
	}elseif (empty($movie->getMovieId())) {
		$response['status'] = 'fail';
		$response['errorMessage'] = "Movie Not Found";
	}else{
		include('Register.php');
		$register = new Register;
		$register->registerUserSubscription($user->getUserId(),$movie->getMovieId());
		$response['status'] = 'success';	
	}
	
	echo json_encode($response);
?>