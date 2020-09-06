<?php
	/**
	 * 
	 */
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
			spl_autoload_register(array(__CLASS__,'load'));
		}

		// Define a custom load method
		private static function load($classname){
			die('3');
		    // Here simply autoload app’s controller and model classes
		    if (substr($classname, -10) == "Controller"){
		        // Controller
		        if (file_exists(VENDOR_PATH . str_replace("_", "/", $classname).".php")) {
		        	require_once VENDOR_PATH . str_replace("_", "/", $classname).".php";
		        } else {
		        	$classname = "Maan_Error_Controllers_IndexController";
		        	require_once VENDOR_PATH . str_replace("_", "/", $classname).".php";
		        }
		        
		    } elseif (substr($classname, -5) == "Model"){
		        // Model
		        require_once  MODEL_PATH . "$classname.php";
		    }
		}


		public static function dispatch_old() {
			$platform = isset($_SERVER['REDIRECT_URL']) ?  Redirect::setPlatform() : ucfirst("core");
			$controller = isset($_SERVER['REDIRECT_URL']) ?  Redirect::setController() : ucfirst("index");
			$action = isset($_SERVER['REDIRECT_URL']) ?  Redirect::setAction() : ucfirst("index");

			$controller_path = "Maan_".ucfirst($platform)."_Controllers_";
			// Instantiate the controller class and call its action method
		    $controller_name = $controller_path. ucfirst($controller) . "Controller";
		    if (file_exists(VENDOR_PATH . str_replace("_", "/", $controller_name).".php")) {
		    	$controller_name = $controller_name;
		    } else $controller_name = "Maan_Error_Controllers_IndexController";
		    $action_name = ucfirst($action) . "Action";
		    $controller = new $controller_name;
		    $controller->$action_name();
		}
	}
?>