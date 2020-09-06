<?php 
	/**
	 * 
	 */
	class Maan_Core_Model_Users
	{
		
		public function __construct()
		{
			// call function parent in class extends
			$this->OpenConnect();
		}

		public function load($mode, $arg){
			$actionMode = $mode.'Action';
			return self::$actionMode($arg);
		}

		public function OpenConnect() {
			try {
				// die('fffff');
			   // $this->conn = new PDO('"mysql:host="'.$this->getDbHost().'";dbname="'.$this->getDbName().'"', $this->getDbUser(), $this->getDbPass());
				// $conn = new PDO('"mysql:host="'.$this->getDbHost().'";dbname="'.$this->getDbName().'"', $this->getDbUser(), $this->getDbPass());
				$conn = new PDO("mysql:host=mariadb;dbname=mykinhdoanh", "root", "mypass123");
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

		public function insertAction($arg) {
			var_dump($arg);
			die('fdfdfdf');

		}

		public function CloseConnect($conn) {
			// $this->conn = null;
			$conn = null;
		}
	}
?>