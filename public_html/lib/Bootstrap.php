<?php
	/**
	 * 
	 */
	use Maan\Core\Controllers\Index\Index;
	class Bootstrap
	{
		public static function run() {
			self::init();
			self::autoLoad();
			self::dispatch();
		}

		// Initialization
		public static function init() {

			require_once(__DIR__.'/DefineRoot.php');
			require_once(__DIR__.'/Redirect.php');
			// require_once(VENDOR_MAAN_PATH.'Core/Controllers/CoreController.php');
		}

		
		// Autoloading
		public static function autoLoad() {
			spl_autoload_register(
		    	function($className)
			    {
			        $className = str_replace("_", "\\", $className);
			        $className = ltrim($className, '\\');
			        $fileName = '';
			        $namespace = '';
			        if ($lastNsPos = strripos($className, '\\'))
			        {
			            $namespace = substr($className, 0, $lastNsPos);
			            $className = substr($className, $lastNsPos + 1);
			            $fileName = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
			        }
			        $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';

			        require VENDOR_PATH.$fileName;
			    }
			);
		}

		public static function dispatch() {
			// echo "<pre>";
			// var_dump($_SERVER);
			// die('fdfdfdf');
			$platform = isset($_SERVER['REDIRECT_URL']) ?  Redirect::setPlatform() : ucfirst("ls");
			$controller = isset($_SERVER['REDIRECT_URL']) ?  Redirect::setController() : ucfirst("index");
			$action = isset($_SERVER['REDIRECT_URL']) ?  Redirect::setAction() : ucfirst("index");

			// echo "<pre>";
			// var_dump($platform);
			// var_dump($controller);
			// var_dump($action);
			// die();

			$controller_path = "\\Maan\\".ucfirst($platform)."\Controllers";
			// Instantiate the controller class and call its action method
		    $controller_path = $controller_path. "\\" . ucfirst($controller) ;
		    $controller_path = $controller_path. "\\" . ucfirst($action);
		    if (file_exists(VENDOR_PATH . str_replace("\\", "/", $controller_path) .".php")) {
		    	$controller_path = $controller_path;
		    } else $controller_path = "Maan\Error\Controllers\Index\Index";
		    return new $controller_path;
		}
	}
?>