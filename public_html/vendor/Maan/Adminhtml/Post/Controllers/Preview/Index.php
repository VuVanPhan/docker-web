<?php
	namespace Maan\Adminhtml\Post\Controllers\Preview;

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
			require_once(VENDOR_MAAN_PATH.'Adminhtml/Post/View/templates/Preview.phtml'); 
		}
	}
?>