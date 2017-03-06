<?php
	$movieName = $_POST['movieName'];
	$publisherName = $_POST['publisherName'];
	$releaseDate = $_POST['releaseDate'];

	include 'Finder.php';
	$finder = new Finder;
	$publisher = $finder->findPublisherByName($publisherName);
	if(empty($publisher->getPublisherId())){
		$response['status'] = 'fail';
		$response['errorMessage'] = 'Publisher Not Found';
		echo json_encode($response);
	}

	include 'Movie.php';
	$movie = new Movie;
	$movie->setName($movieName);
	$movie->setPublisherId($publisher->getPublisherId());
	$movie->setReleaseDate($releaseDate);

	include 'Register.php';
	$register = new Register;
	$register->publishMovie($movie);

	$response['status'] = 'success';
	echo json_encode($response);
?>
