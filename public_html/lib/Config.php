<?php
	/**
	 *  Class parant config variable
	 */
	class Config
	{
		private $dbhost;
		private $dbuser;
		private $dbpass;
		private $dbname;
		private $dbport;
		
		// __construct does not include arguments
		public function __construct()
		{
			// config variable of database
			$this->dbhost = "mariadb"; // name container SQL
			$this->dbuser = "root";
			$this->dbpass = "mypass123";
			$this->dbname = "mykinhdoanh";
		}

		public function getDbHost() {
			return $this->dbhost;
		}

		public function getDbUser() {
			return $this->dbuser;
		}

		public function getDbPass() {
			return $this->dbpass;
		}

		public function getDbName() {
			return $this->dbname;
		}
	}
?>