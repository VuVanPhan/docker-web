<?php
	namespace Maan\Adminhtml\Product\Controllers\Index;

	use Maan\Adminhtml\Product\Model\Product as ProductModel;
	use Maan\Framework\Model\DbConnect as DbConnect;
	/**
	 * 
	 */
	class Index
	{
		private $_db;
		private $_conn;
		public function __construct()
		{
			$this->_db = new ProductModel();
			$this->_conn = new DbConnect();
			$this->execute();
		}

		public function execute () {
			$conn = $this->_conn->connect();
			$conn = $conn->query("SELECT * FROM products");
			// echo "<pre>";
			// foreach($conn as $row) {
		 //        var_dump($row);
		 //    }
			// die('fdffd');
			require_once(VENDOR_MAAN_PATH.'Adminhtml/Product/View/templates/Index.phtml'); 
		}
	}
?>