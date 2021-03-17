<?php
	namespace Maan\Adminhtml\Product\Controllers\Save;

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
			// echo "<pre>";
			// var_dump($_POST);
			try {
					$conn 	= $this->_db->connect();
					$sql	= "INSERT INTO products (name, description, sku, price, quantity, is_active, dt_create) VALUES (:name, :description, :sku, :price, :quantity, :is_active, :dt_create)";
					// $sql 	= "INSERT INTO users (username, password, is_active, dt_create) VALUES (?, ?, ?, ?)";
					$conn 	= $conn->prepare( $sql );

					$name 			= $_POST["product-name"];
					$description	= $_POST["product-desc"];
					$sku 			= $_POST["product-sku"];
					$price 			= $_POST["product-price"];
					$quantity 		= $_POST["product-quantity"];

					// var_dump($name, $description, $sku, $price, $quantity);
					$conn->bindValue(":name", $name);
					$conn->bindValue(":description", $description);
					$conn->bindValue(":sku", $sku);
					$conn->bindValue(":price", $price);
					$conn->bindValue(":quantity", $quantity);
					$conn->bindValue(":is_active", "A");
					$conn->bindValue(":dt_create", "2021-01-25");

					if ( $conn->execute() )
					{
						// var_dump($_SESSION);
						// die("save sucs");
						echo "<script>
						window.location.href = '". ADMIN_HOME_URL ."Product/Index';
						</script>";
						//require_once(VENDOR_MAAN_PATH.'Adminhtml/Login/View/templates/Index.phtml');
					}
					
				} catch (PDOException $e) {
				   echo "Execute failed: " . $e->getMessage();
			   	}
			// $target_dir = "uploads/";
			// $target_file = $target_dir . basename($_FILES["product-image"]["name"]);
			// $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			// if (move_uploaded_file($_FILES["product-image"]["tmp_name"], $target_file)) {
			// 	echo "The file ". htmlspecialchars( basename( $_FILES["product-image"]["name"])). " has been uploaded.";
			// } else {
			// 	echo "Sorry, there was an error uploading your file.";
			// }
			// die(__FILE__);
		}
	}
?>