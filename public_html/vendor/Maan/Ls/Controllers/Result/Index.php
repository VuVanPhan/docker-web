<?php
namespace Maan\Ls\Controllers\Result;
/**
 * 
 */
use Maan\Framework\Controllers\Redirect\Redirect as Redirect;
class Index extends Redirect
{
	
	public function __construct()
	{
		$this->execute();
	}

	public function execute()
	{
		require_once(VENDOR_MAAN_PATH.'Ls/View/Frontend/Result.php'); 
	}	
}
?>