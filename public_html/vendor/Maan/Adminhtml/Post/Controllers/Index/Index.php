<?php
	namespace Maan\Adminhtml\Post\Controllers\Index;

	use Maan\Adminhtml\Post\Model\Post as PostModel;
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
			$this->_db = new PostModel();
			$this->_conn = new DbConnect();
			$this->execute();
		}

		public function execute()
		{
			$conn = $this->_conn->connect();
			$conn = $conn->query("SELECT * FROM posts");

			require_once(VENDOR_MAAN_PATH.'Adminhtml/Post/View/templates/Index.phtml'); 
		}
	}
?>