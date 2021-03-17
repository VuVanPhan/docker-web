<?php
	namespace Maan\Adminhtml\Post\Controllers\Save;

	use Maan\Framework\Model\DbConnect as DbConnect;
	/**
	 * 
	 */
	class Index
	{
		private $_db;
		public function __construct()
		{
			$this->_db = new DbConnect();
			$this->execute();
		}

		public function execute () {
			try {
					// echo "<pre>";
					// var_dump( isset( $_POST["post-id"] ) && !is_null( $_POST["post-id"] ) && !empty( $_POST["post-id"] ));
					// var_dump($_POST);
					// die(__FILE__);

					$conn 	= $this->_db->connect();
					if ( isset( $_POST["post-id"] ) && !is_null( $_POST["post-id"] ) && !empty( $_POST["post-id"] ) ) {
						$sql	= "UPDATE posts SET name = :name, link = :link, content = :content, image = :image, tag = :tag, is_active = :is_active, dt_modify = :dt_modify WHERE id = :id";
					} else {
						$sql	= "INSERT INTO posts (name, link, content, image, tag, is_active, dt_create, dt_modify) VALUES (:name, :link, :content, :image, :tag, :is_active, :dt_create, :dt_modify)";
					}

					$conn 	= $conn->prepare( $sql );

					$name 			= htmlspecialchars( $_POST["post-name"] );
					$content		= htmlspecialchars( $_POST["post-content"] );
					$link 			= htmlspecialchars( $_POST["post-link"] );
					$tag 			= htmlspecialchars( $_POST["post-tag"] );
					$is_active		= ( $_POST["post-active"] ) ? htmlspecialchars( "A" ) : htmlspecialchars( "I" );

					$conn->bindValue(":name", $name);
					$conn->bindValue(":content", $content);
					$conn->bindValue(":link", $link);
					$conn->bindValue(":tag", $tag);
					$conn->bindValue(":is_active", $is_active);

					if ( ! ( isset( $_POST["post-id"] ) && !is_null( $_POST["post-id"] ) && !empty( $_POST["post-id"] ) ) ) {
						$conn->bindValue(":dt_create", "2021-01-25");
					}

					
					$conn->bindValue(":dt_modify", "2021-01-25");

					if ( isset( $_POST["post-id"] ) && !is_null( $_POST["post-id"] ) && !empty( $_POST["post-id"] ) ) {
						$id 	= htmlspecialchars( $_POST["post-id"] );
						$image 	= htmlspecialchars( $_POST["post-image"] );

						$conn->bindValue(":id", $id);
						$conn->bindValue(":image", $image);
					}

					$module 	= "post";
					$media 		= "media";
					$type 		= "images";
					$year 		= date("Y");
					$month 		= date("n");
					$date 		= date("j");

					$path 		= $module . DS . $media . DS . $type . DS . $year . DS . $month . DS . $date . DS;
					$pathImage	= htmlspecialchars( $path . basename($_FILES["post-image"]["name"]) );

					if ( ! ( isset( $_POST["post-id"] ) && !is_null( $_POST["post-id"] ) && !empty( $_POST["post-id"] ) ) ) {
						$conn->bindValue(":image", $pathImage);
						$this->upload($path);
					}

					if ( $conn->execute() )
					{
						echo "<script>
						window.location.href = '". ADMIN_HOME_URL ."Post/Index';
						</script>";
					}
					
				} catch (PDOException $e) {
				   echo "Execute failed: " . $e->getMessage();
			   	}
		}

		public function upload($path = "")
		{
			$target_dir = PUB_PATH;
			$target_dir = $target_dir . $path;
			if ( !is_dir($target_dir) )
			{
				mkdir($target_dir, 0777, true);
				return $this->processUpload($target_dir);
			} else {
				return $this->processUpload($target_dir);
			}
		}

		public function processUpload( $target_dir = "" )
		{
			$target_file = $target_dir . basename($_FILES["post-image"]["name"]);
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			if ( file_exists($target_file) ) {
				return false;
			} else {
				if (move_uploaded_file($_FILES["post-image"]["tmp_name"], $target_file)) {
					return true;
					//echo "The file ". htmlspecialchars( basename( $_FILES["post-image"]["name"])). " has been uploaded.";
				} else {
					return false;
					//echo "Sorry, there was an error uploading your file.";
				}
			}
			
		}

		public function validateInput($value='')
		{
			if (condition) {
					# code...
				}	
		}
	}
?>