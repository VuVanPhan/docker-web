<?php
	namespace Maan\Adminhtml\Product\Model;

	use Maan\Framework\Model\DbConnect as DbConnect;

	/**
	 * 
	 */
	class Product extends DbConnect
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
			   	$sqls=['CREATE TABLE IF NOT EXISTS products (
                    	id INT(11)  PRIMARY KEY NOT NULL AUTO_INCREMENT,
                        name varchar(300) NOT NULL,
                        description text NOT NULL,
                        sku text NOT NULL,
                        price varchar(300) NOT NULL,
                        quantity varchar(300) NOT NULL,
                        is_active char(1) default "A" NOT NULL,
                        dt_create datetime NOT NULL
                    	)'];
                $check = $conn->exec('select 1 from products');
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