<?php
	namespace Maan\Adminhtml\Login\Model;

	use Maan\Framework\Model\DbConnect as DbConnect;

	/**
	 * 
	 */
	class Login
	{
		private $_db;
		public function __construct()
		{
			// call function parent in class extends
			$this->_db = new DbConnect();
			$this->OpenConnect();
		}

		public function load($mode, $arg){
			$actionMode = $mode.'Action';
			return self::$actionMode($arg);
		}

		public function OpenConnect() {
			try {
				$conn = $this->_db->connect();
			   	$sqls=['CREATE TABLE IF NOT EXISTS users (
                    	user_id INT(11)  PRIMARY KEY NOT NULL AUTO_INCREMENT,
                        username varchar(300) NOT NULL,
                        password text NOT NULL,
                        is_active char(1) default "A" NOT NULL,
                        dt_create datetime NOT NULL
                    	)'];
                $check = $conn->exec('select 1 from users');
                if ( !$check ) {
                	foreach ($sqls as $sql) {
		            	$conn->exec($sql);
		            }
                }
	            return true;
			   //echo "Connected and create table successfully";
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