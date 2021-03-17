<?php
	namespace Maan\Data\Model;
	use PDO;

	Class Db {
		private $_connection;

		public function __construct() {
			return self::connect();
		}

		public function connect()
		{
			try {
		        if (is_null($this->_connection) || empty($this->_connection)) {
		            //$this->_connection = new \PDO($this->DB_driver.':host='.$this->DB_host.';dbname='.$this->DB_database, $this->DB_user_name, $this->DB_user_password);
		            $this->_connection = new PDO("mysql:host=mariadb;dbname=mykinhdoanh;charset=utf8mb4", "user1", "mypassuser123");
		        }
		    } catch (Exception $e) {
		        $this->_connection = $e;
		    }
		    return $this->_connection;
		}

		public function exec($sql, $params)
		{
			die('_exec_');
			$stm = $this->prepare($sql);
			$result = false;
			if( $stm && $stm->execute($params) ) {
				$result = $stm->rowCount();
				while( $stm->fetch(PDO::FETCH_ASSOC) ) {
				}
			}
			return $result;
		}
	}
?>