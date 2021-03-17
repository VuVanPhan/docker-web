<?php
	namespace Maan\Adminhtml\Product\Controllers\Edit;

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
			require_once(VENDOR_MAAN_PATH.'Adminhtml/Product/View/templates/AddProduct.phtml'); 
		}
	}
?>