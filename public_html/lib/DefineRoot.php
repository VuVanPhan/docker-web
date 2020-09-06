<?php
	
	/**
	* Use the DS to separate the directories (just a shortcut)
	*/
	if (!defined('DS')) {
	   define('DS', DIRECTORY_SEPARATOR);
	}

	/**
	* The full path to the directory which holds application files, without a trailing DS.
	*/
	if (!defined('ROOT')) {
	    define('ROOT', getcwd().DS); 
	}

	/**
	* The full path to the app directory 
	*/
	if (!defined('APP_PATH')) {
	    define('APP_PATH', ROOT.'app'.DS); 
	}

	/**
	* The full path to the js directory 
	*/
	if (!defined('JS_PATH')) {
	    define('JS_PATH', ROOT.'js'.DS); 
	}

	/**
	* The full path to the lib directory 
	*/
	if (!defined('LIB_PATH')) {
	    define('LIB_PATH', ROOT.'lib'.DS); 
	}

	/**
	* The full path to the skin directory 
	*/
	if (!defined('SKIN_PATH')) {
	    define('SKIN_PATH', ROOT.'skin'.DS); 
	}

	/**
	* The full path to the vendor directory 
	*/
	if (!defined('VENDOR_PATH')) {
	    define('VENDOR_PATH', ROOT.'vendor'.DS); 
	}

	/**
	* The full path to the app/code directory 
	*/
	if (!defined('APP_CODE_PATH')) {
	    define('APP_CODE_PATH', APP_PATH.'code'.DS); 
	}

	/**
	* The full path to the app/code/core directory 
	*/
	if (!defined('APP_CORE_PATH')) {
	    define('APP_CORE_PATH', APP_CODE_PATH.'core'.DS); 
	}

	/**
	* The full path to the vendor/Maan directory 
	*/
	if (!defined('ROOT_MAAN_DIR')) {
	    define('ROOT_MAAN_DIR', VENDOR_PATH.'Maan'.DS); 
	}

	/**
	* The full path to the vendor/Maan directory 
	*/
	if (!defined('VENDOR_MAAN_PATH')) {
	    define('VENDOR_MAAN_PATH', VENDOR_PATH.'Maan'.DS); 
	}

	/**
	* The full path to the vendor/Maan/Core directory 
	*/
	if (!defined('MAAN_CORE_PATH')) {
	    define('MAAN_CORE_PATH', VENDOR_MAAN_PATH.'Core'.DS); 
	}

	// Define platform, controller, action
 //    if (!defined('PLATFORM')) {
	//     define('PLATFORM', isset($_SERVER['REQUEST_URI']) ?  $_SERVER['REQUEST_URI'] : 'core'); 
	// }

	// if (!defined('CONTROLLER')) {
	//     define('CONTROLLER', isset($_SERVER['REQUEST_URI']) ? $_REQUEST['c'] : 'Index'); 
	// }

	// if (!defined('ACTION')) {
	//     define('ACTION', isset($_SERVER['REQUEST_URI']) ? $_REQUEST['a'] : 'index'); 
	// }

	/**
	* The full path to the vendor/Maan/Core directory 
	*/
	if (!defined('CURR_CONTROLLER_PATH')) {
	    define('CURR_CONTROLLER_PATH', MAAN_CORE_PATH.'Controllers'.DS); 
	}

	/**
	* The full path to the vendor/Maan/Core directory 
	*/
	if (!defined('CURR_VIEW_PATH')) {
	    define('CURR_VIEW_PATH', MAAN_CORE_PATH.'View'.DS); 
	}

	/**
	* Use the HOME_URL
	*/
	if (!defined('HOME_URL')) {
	   define('HOME_URL', (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] .  DS);
	}

	/**  
	* Use the JS_URL
	*/
	if (!defined('JS_URL')) {
	   define('JS_URL', (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] .  DS . "js" . DS);
	}

	/**  
	* Use the SKIN_URL
	*/
	if (!defined('SKIN_URL')) {
	   define('SKIN_URL', (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] .  DS . "skin" . DS);
	}

	/**  
	* Use the SKIN_URL
	*/
	if (!defined('VENDOR_MAAN_URL')) {
	   define('VENDOR_MAAN_URL', (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] .  DS . "vendor" . DS ."Maan" . DS);
	}
?>