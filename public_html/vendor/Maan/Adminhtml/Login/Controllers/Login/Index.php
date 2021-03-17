<?php
	namespace Maan\Adminhtml\Login\Controllers\Login;

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
			$this->_execute();
		}

		public function _execute() {
			// 109.899.000 vnd
			// echo "<pre>";
			// var_dump($_POST);
			// var_dump($_POST["username"]);
			// var_dump($this->validata( $_POST["username"] ));
			// die(__FILE__);
			if ( ($this->validata( $_POST["username"] )) && ($this->validata( $_POST["password"] )) ) {
				try {
					ob_start();
					$conn = $this->_db->connect();
					// username 
					$username = $this->validata( $_POST["username"] );

					// password
					$password = $this->validata( $_POST["password"] );
					$options = [
					    'cost' => 15,
					    'salt' => '0gud0fgfdgheihgfgfffffffffff', // more than 22 character
					];
					// $password = sha256( $options['salt'] . $password );
					$password = password_hash( $password, PASSWORD_DEFAULT, $options );

					// echo "<pre>";
					// var_dump($options);
					// var_dump($hashed_password);
					// var_dump($date);
					// var_dump(sha256($options['salt'].$password));
					// die(__FILE__);

					//$sql = 'insert into users value("' . $_POST["username"] . '","' . $_POST["password"] . '","A", '.strtotime("now").') ';
					
					//$sql = "INSERT INTO users (username, password, is_active, dt_create) VALUES ('". $username ."', '". $_POST["password"] ."', 'A', '2021-01-25')";
					
					$data = [
						'username' 	=> $username,
						'password' 	=> $password,
						'is_active' => 'A',
						'dt_create'	=> '2021-01-25'
					];

					// $sql 	= "INSERT INTO users (username, password, is_active, dt_create) VALUES ('".$username."', '".$password."', 'A', '2021-01-25')";
					$sql 	= "INSERT INTO users (username, password, is_active, dt_create) VALUES (:username, :password, :is_active, :dt_create)";
					// $sql 	= "INSERT INTO users (username, password, is_active, dt_create) VALUES (?, ?, ?, ?)";
					$conn 	= $conn->prepare( $sql );

					$conn->bindValue(":username", $username);
					$conn->bindValue(":password", $password);
					$conn->bindValue(":is_active", "A");
					$conn->bindValue(":dt_create", "2021-01-25");
					// echo "<pre>";
					// var_dump($conn);

					// var_dump($conn);
					// var_dump($data);
					// var_dump($conn->execute($data));
					// var_dump($conn);
					// var_dump([$username, $password, "A", "NOW()"]);
					// var_dump($conn->execute([$username, $password, "A", "NOW()"]));
					// var_dump($result);
					// die('fdfd');

					if ( $conn->execute() )
					{
						// var_dump($_SESSION);
						// die();
						echo "<script>
						window.location.href = '". ADMIN_HOME_URL ."Index';
						</script>";
						//require_once(VENDOR_MAAN_PATH.'Adminhtml/Login/View/templates/Index.phtml');
					}
					
				} catch (PDOException $e) {
				   echo "Execute failed: " . $e->getMessage();
			   	}
			}
		}

		public function validata($value = '')
		{
			$value = trim($value);
			// var_dump($value);
			$value = $this->strip_tags_content($value);
			// var_dump($value);
			// die('ffffffff');
			$value = htmlentities($value);
			if ( !is_null($value) && !empty($value) ) {
				return $value;
			} else return false;
		}

		public function strip_tags_content($value = '')
		{
			// ----- remove HTML TAGs ----- 
			$value = preg_replace ('/<[^>]*>/', ' ', $value); 
			// ----- remove control characters ----- 
			$value = str_replace("\r", '', $value);
			$value = str_replace("\n", ' ', $value);
			$value = str_replace("\t", ' ', $value);
			// ----- remove multiple spaces ----- 
			$value = trim(preg_replace('/ {2,}/', ' ', $value));
			return $value; 
		}
	}
?>