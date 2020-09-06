<?php 
	namespace Maan\Framework\Controllers\Redirect;
	/**
	 * 
	 */
	class Redirect
	{
		
		public function __construct()
		{
			parent::__construct();
		}

		public function redirect($url, $params = null)
		{
			$url = $this->validate($url);
			if ( $url ) {
				$exp = explode( "/" , trim( $url ) );
				// echo "<pre>";
				// var_dump($exp);
				$exp_1 = $this->validate( trim( $exp[0] ) );
				$exp_2 = $this->validate( trim( $exp[1] ) );
				$exp_3 = $this->validate( trim( $exp[2] ) );
				$exp_4 = $this->validate( trim( $exp[3] ) );
				// var_dump($_SERVER);
				// var_dump(explode( "/", trim( htmlentities( $_SERVER["REDIRECT_URL"] ) ) ) );
				// var_dump($exp_3 <> "*" && $exp_2 == "*" && $exp_1 == "*");
				if ( $exp_4 ) {
					$url = $this->processUrl( $url, $_SERVER["REDIRECT_URL"] );
				} elseif ( $exp_3 <> "*" && $exp_2 == "*" && $exp_1 == "*" ) {
					if ( strtoupper( $exp_3 ) <> strtoupper( "index" ) ) {
						$platform = $this->setPlatform();
						$url = $platform . '/' . $exp_3;
						$url = $this->fullUrl( $url );
					} else {

					}

				} elseif ($exp_3 == '/' && $exp_2 == '/' && $exp_1 == '/' && isset( $exp_1 ) && !is_null( $exp_1 ) && !empty( $exp_1 )) {
					$platform = $this->setPlatform();
					$controller = $this->setController();
					$url = $platform . $controller;
				} else {

				}
				
				if ( count( $params ) ) {
				// 	echo "<pre>";
				// var_dump($params);
				// die("pppppppppp");
					$this->setParams($params);
				}
				// die('fdfd');
				echo "<script>
				window.location.href = '". $url ."';
				</script>";
			}
			die("This's ".__FILE__);
		}

        public function setParams( $params )
        {
            if ( count( $params ) ) {
                $_SESSION["data"] = $this->arraysToObject( $params );//$params;
            }
            return $_SESSION;
        }

        public function getParams( $data )
		{
			$data = $this->validate( $data );
			if ( $data ) {
				return $_SESSION[ $data ];
			} else {
				return $_SESSION;
			}
		}

        public function arrayToObj( $params, $object ) 
        {
            if ( count( $params ) ) {
                foreach ($params as $key => $value)
                {
                    if ( is_array($value) )
                    {
                    	$object->$key = new \stdClass();
                        $this->arraysToObject($value, $object->$key);
                    }
                    else
                    {
                        $object->$key = $value;
                    }
                }
            }
            return $object;
        }

        public function arraysToObject( $params , $object = null)
        {
        	if (is_null( $object )) {
        		$object = new \stdClass();
        	} else $object = $object;
            
            return $this->arrayToObj( $params, $object );
        }

		/**
		 * Redirect with POST data.
		 *
		 * @param string $url URL.
		 * @param array $post_data POST data. Example: array('foo' => 'var', 'id' => 123)
		 * @param array $headers Optional. Extra headers to send.
		 */
		public function redirect_post($url, array $data, array $headers = null) {
		    $params = array(
		        'http' => array(
		            'method' => 'POST',
		            'content' => http_build_query($data)
		        )
		    );
		    if (!is_null($headers)) {
		        $params['http']['header'] = '';
		        foreach ($headers as $k => $v) {
		            $params['http']['header'] .= "$k: $v\n";
		        }
		    }
		    $ctx = stream_context_create($params);
		    $fp = @fopen($url, 'rb', false, $ctx);
		    if ($fp) {
		        echo @stream_get_contents($fp);
		        die();
		    } else {
		        // Error
		        throw new Exception("Error loading '$url', $php_errormsg");
		    }
		}

		

		public function processUrl($url, $requestUri)
		{
			$exps = explode( "/" , trim( $url ) );
			$arrExps = [];
			$i = 0;
			foreach ( $exps as $exp ) {
				if ( $this->validate($exp) ) {
					if ( $exp == "*" ) {
						$i++;
					} else $i=0;
					if ( $exp <> "*"  ) {
						$arrExps[] = $exp;
					}
				}
			}

			$uris = explode( "/" , trim( $requestUri ) );
			$arrUris = [];
			$y = 0;
			foreach ( $uris as $uri ) {
				if ( $this->validate($uri) ) {
					$y++;
					if ($y > $i) {
						$arrUris[] = $uri;
					} else $arrUris = [];
				}
			}

			echo "<pre>";
			var_dump($arrExps);
			var_dump($i);
			var_dump($arrUris);
			var_dump($y);
			die(__FILE__);
			if ( count($arrUris) ) {
				$newUrl = implode("/", $arrExps);
			}
			return $this->fullUrl($newUrl);
		}

		public function urlOrigin( $use_forwarded_host = false )
		{
		    $ssl      = ( ! empty( $_SERVER['HTTPS'] ) && $_SERVER['HTTPS'] == 'on' );
		    $sp       = strtolower( $_SERVER['SERVER_PROTOCOL'] );
		    $protocol = substr( $sp, 0, strpos( $sp, '/' ) ) . ( ( $ssl ) ? 's' : '' );
		    $port     = $_SERVER['SERVER_PORT'];
		    $port     = ( ( ! $ssl && $port=='80' ) || ( $ssl && $port=='443' ) ) ? '' : ':'.$port;
		    $host     = ( $use_forwarded_host && isset( $_SERVER['HTTP_X_FORWARDED_HOST'] ) ) ? $_SERVER['HTTP_X_FORWARDED_HOST'] : ( isset( $_SERVER['HTTP_HOST'] ) ? $_SERVER['HTTP_HOST'] : null );
		    $host     = isset( $host ) ? $host : $_SERVER['SERVER_NAME'] . $port;
		    return $protocol . '://' . $host . '/';
		}

		public function fullUrl( $str, $use_forwarded_host = false )
		{
		    return $this->urlOrigin( $use_forwarded_host ) . $str;
		}

		public function validate($str)
		{
			$url = trim( htmlentities( $str ) );
			if (isset($str) && !is_null($str) && !empty($str)) {
				return $str;
			} else return false;
		}

		public function getPlatform()
		{
			$platform = trim( htmlentities( $_SERVER["REDIRECT_URL"] ) );
			$exp = explode( "/", $platform );
			$exp_1 = trim( $exp[1] );
			if ( isset( $exp_1 ) && !is_null( $exp_1 ) && !empty( $exp_1 )) {
				$platform = $exp_1;
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
				$controller = $exp_2;
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
				$action = $exp_3;
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