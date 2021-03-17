<?php
	namespace Maan\Adminhtml\Post\Model;

	use Maan\Framework\Model\DbConnect as DbConnect;

	/**
	 * 
	 */
	class Post extends DbConnect
	{
		private $_db;
		public function __construct()
		{
			// call function parent in class extends
			$this->_db = new DbConnect();
			$this->OpenConnect();
			return parent::__construct();
		}

		public function OpenConnect() {
			try {
				$conn = $this->_db->connect();
			   	$sqls=['CREATE TABLE IF NOT EXISTS posts (
                    	id INT(11)  PRIMARY KEY NOT NULL AUTO_INCREMENT,
                        name varchar(300) NOT NULL,
                        content text NOT NULL,
                        image varchar(300) NOT NULL,
                        link varchar(300) NOT NULL,
                        tag varchar(300) NOT NULL,
                        is_active char(1) default "A" NOT NULL,
                        dt_create datetime NOT NULL,
                        dt_modify datetime NOT NULL
                    	)'];
                $check = $conn->exec('select 1 from posts');
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
	}
?>