<?php
	namespace Maan\Framework\Model;
	use Maan\Data\Model\Db as Db;
	/**
	 * 
	 */
	Class DbConnect extends Db
	{
		private $_conn;
		private $db;
		public function __construct()
		{
			// parent::__construct();
			$this->db = new Db();
			return parent::__construct();
		}

		public function connect()
		{
			try {
				if (is_null($this->_conn) || empty($this->_conn)) {
					//$this->_conn = new PDO("mysql:host=mariadb;dbname=mykinhdoanh", "user1", "mypassuser123");
					$this->_conn = $this->db->connect();
				}
		   	}
			catch(PDOException $e) {
			   $this->_conn = $e;
		   	}
			return $this->_conn;
		}

		public function exec($sql, $params = null)
		{
			// echo "<pre>";
			// var_dump($this->_conn);
			// echo "</pre>";
			// die('_exec_00000');

			if (is_null($this->_conn) || empty($this->_conn)) {
				$stm = $this->prepare($sql);
				$result = false;
				if( $stm && $stm->execute($params) ) {
					$result = $stm->rowCount();
					while( $stm->fetch(PDO::FETCH_ASSOC) ) {
					}
				}
			}
			return $result;
		}

		public function query ()
		{
			var_dump($this->_conn);
			die('666666666');
		}
	}
?>