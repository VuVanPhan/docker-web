<?php
	namespace Maan\Adminhtml\Post\Controllers\Delete;

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
			try {
				$id = $_POST["id"];
				$result = [];
				if ( isset($id) &&  !is_null( $id ) && !empty($id) ) {
					$conn = $this->_conn->connect();
					$sql = "DELETE FROM posts WHERE id = :id";
					$conn 	= $conn->prepare( $sql );

					$conn->bindValue(":id", htmlspecialchars($id));

					if ( $conn->execute() )
					{
						$result["success"] = "Delete row success";
					} else {
						$result["error"] = "Delete row failed";
					}
				} else {
					$result["error"] = "Delete row failed";
				}
				echo json_encode($result);
				return true;
			} catch (PDOException $e) {
				echo "Execute failed: " . $e->getMessage();
		   	}
		}
	}
?>