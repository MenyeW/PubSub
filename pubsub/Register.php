<?php
	class Register{

		private $conn;

		function __construct(){
			$this->conn = mysqli_connect("127.0.0.1", "root", "root", "pubsub");
		}

		public function registerUser($name){
			if(!$this->conn){
				$response['status'] = 'fail';
				$response['errorMessage'] = "Error connecting to database from UserRegistration";
				echo json_encode($response);
				die;
			}
			$sql = "insert into user(name) values('".$name."')";
			$this->conn->query($sql);
		}

		public function registerPublisher($name){
			if(!$this->conn){
				$response['status'] = 'fail';
				$response['errorMessage'] = "Error connecting to database from PublisherRegistration";
				echo json_encode($response);
				die;
			}
			$sql = "insert into publisher(name) values('".$name."')";
			$this->conn->query($sql);
		}

		public function publishMovie($movie){
			if(!$this->conn){
				$response['status'] = 'fail';
				$response['errorMessage'] = "Error connecting to database from PublishMovie";
				echo json_encode($response);
				die;
			}
			$sql = "insert into publishedMovies(publisherId,movieName,releaseDate) 
				values("
					.$movie->getPublisherId().","
					."'".$movie->getName()."',".
					"'".$movie->getReleaseDate()."')";
			$this->conn->query($sql);
		}

		public function registerUserSubscription($userId,$movieId){
			if(!$this->conn){
				$response['status'] = 'fail';
				$response['errorMessage'] = "Error connecting to database from registerUserSubscription";
				echo json_encode($response);
				die;
			}
			$sql = "insert into userSubscriptions(userId,movieId) values(".$userId.",".$movieId.")";
			$this->conn->query($sql);
		}

	}
?>