<?php
	class Publisher{
		private $name;
		private $publisherId;

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

	}
?>