<?php
	/**
	 * 
	 */
	require_once(__DIR__.'/Validate.php');
	class Redirect extends Validate
	{
		public function init() {
			self::setPlatform();
			self::setController();
			self::setAction();
		}

		public function checkKey($arg) {

		}

		public function getPlatform()
		{
			$platform = trim( htmlentities( $_SERVER["REDIRECT_URL"] ) );
			$exp = explode( "/", $platform );
			$exp_1 = trim( $exp[1] );
			if ( isset( $exp_1 ) && !is_null( $exp_1 ) && !empty( $exp_1 )) {
				if ( strtoupper($exp_1) == 'ADMINHTML' ) {
					$exp_2 = trim( $exp[2] );
					if ( isset( $exp_2 ) && !is_null( $exp_2 ) && !empty( $exp_2 )) {
						$platform = $exp_2;
					} else $platform = 'login';
				} else $platform = $exp_1;
			} else $platform = 'core';
			return $platform;
		}


		public function setPlatform()
		{
			$platform = self::getPlatform();
			return ucfirst($platform);
		}

		public function getController()
		{
			$controller = trim( htmlentities( $_SERVER["REDIRECT_URL"] ) );
			$exp = explode( "/", $controller );
			$exp_2 = trim( $exp[2] );
			if (isset( $exp_2 ) && !is_null( $exp_2 ) && !empty( $exp_2 )) {
				$exp_1 = trim( $exp[1] );
				if ( isset( $exp_1 ) && !is_null( $exp_1 ) && !empty( $exp_1 )) {
					if ( strtoupper($exp_1) == 'ADMINHTML' ) {
						$exp_3 = trim( $exp[3] );
						if ( isset( $exp_3 ) && !is_null( $exp_3 ) && !empty( $exp_3 )) {
							$controller = $exp_3;
						} else $controller = 'index';
					} else $controller=$exp_2;
				} else $controller = 'index';
			} else $controller = 'index';
			return $controller;
		}


		public function setController()
		{
			$controller = self::getController();
			return ucfirst($controller);
		}

		public function getAction()
		{
			$action = trim(htmlentities($_SERVER["REDIRECT_URL"]));
			$exp = explode("/", $action);
			$exp_3 = trim( $exp[3] );
			if (isset( $exp_3 ) && !is_null( $exp_3 ) && !empty( $exp_3 )) {
				$exp_1 = trim( $exp[1] );
				if ( isset( $exp_1 ) && !is_null( $exp_1 ) && !empty( $exp_1 )) {
					if ( strtoupper($exp_1) == 'ADMINHTML' ) {
						$exp_4 = trim( $exp[4] );
						if ( isset( $exp_4 ) && !is_null( $exp_4 ) && !empty( $exp_4 )) {
							$action = $exp_4;
						} else $action = 'index';
					} else $action=$exp_3;
				} else $action = 'index';
			} else $action = 'index';
			return $action;
		}


		public function setAction()
		{
			$action = self::getAction();
			return ucfirst($action);
		}
	}
?>