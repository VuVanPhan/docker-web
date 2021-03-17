<?php
	namespace Maan\Adminhtml\Login\Controllers\Index;

	use Maan\Adminhtml\Login\Model\Login as LoginModel;
	/**
	 * 
	 */
	class Index
	{
		private $_db;
		public function __construct()
		{
			$this->_db = new LoginModel();
			$this->execute();
		}

		public function execute () {
			require_once(VENDOR_MAAN_PATH.'Adminhtml/Login/View/templates/Login.phtml'); 
		}
	}
?>