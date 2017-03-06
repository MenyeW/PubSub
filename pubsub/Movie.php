<?php
	class Movie{
		private $movieId;
		private $name;
		private $publisherId;
		private $releaseDate;

		public function getMovieId(){
			return $this->movieId;
		}

		public function setMovieId($id){
			$this->movieId = $id;
		}
		
		public function getName(){
			return $this->name;
		}

		public function setName($name){
			$this->name = $name;
		}

		public function getPublisherId(){
			return $this->publisherId;
		}

		public function setPublisherId($publisherId){
			$this->publisherId = $publisherId;
		}

		public function getReleaseDate(){
			return $this->releaseDate;
		}

		public function setReleaseDate($releaseDate){
			$this->releaseDate = $releaseDate;
		}

	}
?>