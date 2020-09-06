<?php
	session_start();
	// echo '<pre>';
	// var_dump($_GET);
	// var_dump($_POST);
	// var_dump($_REQUEST);
	// var_dump($_SERVER);
	// var_dump($_COOKIE);
	// echo '</pre>';
	// enable show error
	// ini_set('display_errors', 1);
	// ini_set('display_startup_errors', 1);
	// error_reporting(E_ALL);

	// them __DIR__ de lay chinh xac duong link, neu vao server nao bat buoc chinh xac duong link nhu linux
	// su dung require_once load nhanh hon include
	require_once(__DIR__.'/lib/Bootstrap.php');
	Bootstrap::run();
	// require_once(__DIR__.DS.'lib/DbPdo.php');
	// $ConnectDb = new ConnectDb;
?>