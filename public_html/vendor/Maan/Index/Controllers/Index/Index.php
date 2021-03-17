<?php
	namespace Maan\Index\Controllers\Index;

	use Maan\Framework\Model\DbConnect as DbConnect;
	/**
	 * 
	 */
	class Index
	{
		private $_conn;
		public function __construct()
		{
			$this->_conn = new DbConnect();
			$this->execute();
		}

		public function execute() {
			$conn = $this->_conn->connect();
			$products 	= $conn->query("SELECT * FROM products");
			$posts		= $conn->query("SELECT * FROM posts");
			require_once(VENDOR_MAAN_PATH.'Index/View/templates/Frontend/Index.phtml');
		}
	}
?>