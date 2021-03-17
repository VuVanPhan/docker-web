<?php
	namespace Maan\Adminhtml\Index\Controllers\Index;
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
			require_once(VENDOR_MAAN_PATH.'Adminhtml/Index/View/templates/Index.phtml'); 
		}
	}
?>