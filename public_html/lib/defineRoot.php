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
	    define('ROOT', dirname(__FILE__)); 
	}
?>