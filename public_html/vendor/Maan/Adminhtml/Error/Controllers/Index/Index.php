<?php 
	namespace Maan\Adminhtml\Error\Controllers\Index;
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
			require_once(VENDOR_MAAN_PATH.'Adminhtml/Error/View/Index.phtml'); 
		}
	}
?>