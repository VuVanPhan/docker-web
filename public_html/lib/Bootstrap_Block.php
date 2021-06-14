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
			spl_autoload_extensions('.php, .inc');
			spl_autoload_register(array(__CLASS__,'load'));
		}

		private static function load($className)
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
	        if (file_exists(VENDOR_PATH . $fileName)) {
		    	require_once(VENDOR_PATH.$fileName);
		    } 
		    else {
		    	return;
		    }
	    }

		public static function dispatch() {
			// echo "<pre>";
			// // var_dump($_SERVER);
			// var_dump(Redirect::setPlatform());
			// var_dump(Redirect::setController());
			// var_dump(Redirect::setAction());
			// die('fdfdfdf');

			$platform = isset($_SERVER['REDIRECT_URL']) ?  Redirect::setPlatform() : ucfirst("index");
			$block = isset($_SERVER['REDIRECT_URL']) ?  Redirect::setController() : ucfirst("index");
			$action = isset($_SERVER['REDIRECT_URL']) ?  Redirect::setAction() : ucfirst("index");

			// echo "<pre>";
			// var_dump($platform);
			// var_dump($block);
			// var_dump($action);
			// die();
			$adminhtml = trim( htmlentities( $_SERVER["REDIRECT_URL"] ) );
			$exp = explode( "/", $adminhtml );
			$exp_1 = trim( $exp[1] );
			if ( isset( $exp_1 ) && !is_null( $exp_1 ) && !empty( $exp_1 ) && ( strtoupper( $exp_1 ) == 'ADMINHTML' ) ) {
				$block_path = "\\Maan\\"."Adminhtml\\".ucfirst($platform)."\Block";
				// Instantiate the block class and call its action method
			    $block_path = $block_path. "\\" . ucfirst($block) ;
			    if (file_exists(VENDOR_PATH . str_replace("\\", "/", $block_path) .".php")) {
			    	$block_path = $block_path;
			    } elseif (true) {
			    	$block_path = "Maan\Adminhtml\Router\Block\Router";
			    } else $block_path = "Maan\Adminhtml\Error\Controllers\Index\Index";
			} else {
				$block_path = "\\Maan\\".ucfirst($platform)."\Block";
				// Instantiate the block class and call its action method
			    $block_path = $block_path. "\\" . ucfirst($block) ;
			    if (file_exists(VENDOR_PATH . str_replace("\\", "/", $block_path) .".php")) {
			    	$block_path = $block_path;
			    } else $block_path = "Maan\Error\Controllers\Index\Index";
			}

		    return new $block_path;
		}
	}
?>