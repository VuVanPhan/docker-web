<?php
namespace Maan\Core\Controllers;
/**
 * Class CoreController
 */
class Maan_Core_Controllers_CoreController
{
	protected $loader;
	public function __construct()
	{
		die('fffffffffffffff');
		$this->loader = new Loader();
	}

	public function redirect($url, $message, $wait=0) 
	{
		die('fffffff');
		if ($wait == 0) {
			header("Location: $url");
		} else {

		}
		exit;
	}
}
?>