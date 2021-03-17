<?php
	/**
	 * 
	 */
	//require_once (__DIR__.'/defineRoot.php');
	//require_once (__DIR__.'/Config.php');

	class ConnectDb //extends Config
	{
		private $conn;

		public function __construct()
		{
			// call function parent in class extends
			parent::__construct();
			$this->OpenConnect();
		}

		public function OpenConnect() {
			try {
				die('ffff656565f');
			   // $this->conn = new PDO('"mysql:host="'.$this->getDbHost().'";dbname="'.$this->getDbName().'"', $this->getDbUser(), $this->getDbPass());
				// $conn = new PDO('"mysql:host="'.$this->getDbHost().'";dbname="'.$this->getDbName().'"', $this->getDbUser(), $this->getDbPass());
				$conn = new PDO("mysql:host=mariadb;dbname=mykinhdoanh;charset=utf8md4", "root", "mypass123");
			   // set the PDO error mode to exception
			   // $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			   $sqls=['CREATE TABLE IF NOT EXISTS users (
                    	user_id INT(11) PRIMARY KEY,
                        user_name varchar(300) NOT NULL,
                        dt_create date
                    	)'];
	            foreach ($sqls as $sql) {
	            	$conn->exec($sql);
	            }
			   echo "Connected and create table successfully";
		   	}
			catch(PDOException $e) {
			   echo "Connection failed: " . $e->getMessage();
		   	}
		}

		public function CloseConnect($conn) {
			// $this->conn = null;
			$conn = null;
		}
	}
?>