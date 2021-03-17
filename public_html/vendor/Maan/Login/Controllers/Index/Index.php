<?php
	namespace Maan\Login\Controllers\Index;
	/**
	 * 
	 */
	class Index
	{
		
		public function __construct()
		{
			$this->execute();
		}

		public function execute() {
			require_once(VENDOR_MAAN_PATH.'Login/View/Frontend/Index.phtml');
		}
	}
?>