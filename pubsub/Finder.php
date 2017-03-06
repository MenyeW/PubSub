<?php
	class Finder{

		private $dbHandle;
		
		function __construct(){
			$this->dbHandle = mysqli_connect("127.0.0.1", "root", "root", "pubsub");
			if(!$this->dbHandle){
				echo "Error connecting to mysql, aborting from Finder";
				die;
			}
		}


		public function findUserByName($name){
			include "User.php";
			$user = new User;
			$sql = "select userId, name from user where name = '".mysql_escape_string($name)."'";
			$res = $this->dbHandle->query($sql);
			while($row = $res->fetch_assoc()){
				$user->setName($row['name']);
				$user->setUserId($row['userId']);
			}
			$sql = "select s.movieId movieId, p.movieName movieName from userSubscriptions s inner join publishedMovies p on p.movieId = s.movieId where s.userId = ".$user->getUserId();
			$res = $this->dbHandle->query($sql);
			$subscriptionList = array();
			while($row = $res->fetch_assoc()){
				$subscriptionList[$row['movieId']] = $row['movieName'];
			}
			$user->setSubscriptionList($subscriptionList);
			return $user;
		}

		public function findPublisherByName($name){
			include 'Publisher.php';
			$pub = new Publisher;
			$sql = "select publisherId,name from publisher where name = '".mysql_escape_string($name)."'";
			$res = $this->dbHandle->query($sql);
			while($row = $res->fetch_assoc()){
				$pub->setName($row['name']);
				$pub->setPublisherId($row['publisherId']);
			}
			return $pub;
		}


		public function findMovieByName($name){
			include 'Movie.php';
			$movie = new Movie;
			$sql = "select movieId, publisherId, movieName, releaseDate from publishedMovies where movieName = '".mysql_escape_string($name)."'";
			$res = $this->dbHandle->query($sql);
			while($row = $res->fetch_assoc()){
				$movie->setMovieId($row['movieId']);
				$movie->setName($row['movieName']);
				$movie->setPublisherId($row['publisherId']);
				$movie->setReleaseDate($row['releaseDate']);
			}
			return $movie;
		}
	}
?>