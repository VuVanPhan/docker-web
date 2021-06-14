<?php
	namespace Maan\Adminhtml\Product\Controllers\Delete;

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
			echo "<pre>";
			var_dump($_SERVER);
			die('delete');
			require_once(VENDOR_MAAN_PATH.'Adminhtml/Product/View/templates/AddProduct.phtml'); 
		}
	}
?>