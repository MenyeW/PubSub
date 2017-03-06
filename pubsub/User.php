<?php
	class User{
		private $name;
		private $userId;
		private $subscriptionList;

		public function getName(){
			return $this->name;
		}

		public function setName($name){
			$this->name = $name;
		}

		public function getUserId(){
			return $this->userId;
		}

		public function setUserId($userId){
			$this->userId = $userId;
		}

		public function getSubscriptionList(){
			return $this->subscriptionList;
		}

		public function setSubscriptionList($list){
			$this->subscriptionList = $list;
		}

	}
?>