<?php
	namespace Maan\Ls\Controllers\Index;
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
			require_once(VENDOR_MAAN_PATH.'Ls/View/Frontend/Lskep.php'); 
			// require_once(CURR_VIEW_PATH.'Frontend/Index.php'); 
		}

		// public function kyhangui()
		// {
		// 	$kyhan = ["1W" => ""];
		// 	return $kyhan;
		// }
	}
?>