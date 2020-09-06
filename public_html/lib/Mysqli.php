<?php
	/**
	 * 
	 */
	require_once (__DIR__.'/defineRoot.php');
	require_once (__DIR__.'/Config.php');

	class ConnectDb extends Config
	{
		private $conn;

		public function __construct()
		{
			// call function parent in class extends
			parent::__construct();
			$this->OpenConnect();
		}

		public function OpenConnect() {
			$this->conn = new mysqli ($this->getDbHost(), $this->getDbUser(), $this->getDbPass(), $this->getDbName()) or die("Connect failed: %s\n". $conn -> error);

			if (!$this->conn) {
				die("Connect fail : %s\n". mysqli_connect_error());
			 	// die("Connect fail : %s\n". $conn->error);
			 }

			// $this->conn = new mysqli ($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname) or die("Connect fail : %s\n". $this->conn->error);

			// return $this->conn;
			 return $conn;
		}

		public function CloseConnect($conn) {
			mysql_close($conn);
			// return $conn->close();
			// $this->conn->close();
		}
	}
?>