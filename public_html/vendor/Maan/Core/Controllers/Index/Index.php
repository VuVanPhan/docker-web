<?php
	namespace Maan\Core\Controllers\Index;
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
			require_once(CURR_VIEW_PATH.'Frontend/Lskep.php'); 
			// require_once(CURR_VIEW_PATH.'Frontend/Index.php'); 
		}
	}
?>