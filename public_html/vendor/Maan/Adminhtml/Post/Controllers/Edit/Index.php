<?php
	namespace Maan\Adminhtml\Post\Controllers\Edit;

	use Maan\Framework\Model\DbConnect as DbConnect;
	use Maan\Framework\Controllers\Redirect\Redirect as Redirect;
	/**
	 * 
	 */
	class Index extends Redirect
	{
		private $_conn;
		public function __construct()
		{
			$this->_conn = new DbConnect();
			$this->execute();
		}

		public function execute()
		{
			$requestUrl = trim( htmlentities( $_SERVER["REDIRECT_URL"] ) );
			$dataUrl = explode( "/", $requestUrl );
			$id = trim( $dataUrl[5] );
			if ( isset( $id ) && !is_null( $id ) && !empty( $id ) ) {
				if ( strtoupper($id) == 'ID' ) {
					$conn = $this->_conn->connect();
					$id = $dataUrl[6];
					$sql = "SELECT * FROM posts WHERE id = '". $id ."'";
					foreach ($conn->query($sql) as $row) {
						$data = $this->arraysToObject( $row );
					}
					// $data = $this->arraysToObject( $conn->query($sql) );
				} else $this->redirect("*/*/error");
			} else $this->redirect("*/*/error");
			require_once(VENDOR_MAAN_PATH.'Adminhtml/Post/View/templates/AddPost.phtml'); 
		}
	}
?>