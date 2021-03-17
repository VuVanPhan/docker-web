<?php 
	namespace Maan\Error\Controllers\Index;
	/**
	 * 
	 */
	class Index
	{
		public function __construct()
		{
			$this->execute();
		}

		public function execute () {
			require_once(VENDOR_MAAN_PATH.'Error/View/templates/Frontend/Index.php'); 
		}
	}
?>