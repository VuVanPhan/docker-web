<?php
	namespace Maan\Adminhtml\Router\Block;

	use Maan\Framework\Model\DbConnect as DbConnect;
	use Maan\Framework\Helpers\Data as Helpers;
	use Maan\Adminhtml\Product\Model\Product as ProductModel;
	use Maan\Adminhtml\Router\Block\Redirect as Redirect;

	/**
	 * 
	 */
	class Router
	{
		private $_conn;
		private $_template;
		private $_block;
		private $_db;

		public function __construct()
		{
			$this->_db = new ProductModel();
			$this->_conn = new DbConnect();
			$this->_helper = new Helpers();
			$this->_template = '';
			$this->_block = '';
			$this->execute();
		}

		public function execute() {
			$conn = $this->_conn->connect();
			$conn = $conn->query("SELECT * FROM products");
			$template = $this->getTemplate();

			$block = $this->getBlock();
			// echo "<pre>";
			// var_dump($block);
			// var_dump($template);
			// echo "</pre>";
			// die('dd');

			// $template = (!empty($template)) ? $template : "Maan_Adminhtml_Product::default.phtml";
			// $this->setTemplate($template);

			$this->setBlock($block);
			// echo "<pre>";
			// foreach($conn as $row) {
		 //        var_dump($row);
		 //    }
			// // die('fdffd');
			// $conn = $this->_conn->connect();
			// $products 	= $conn->query("SELECT * FROM products");
			// $posts		= $conn->query("SELECT * FROM posts");
			// require_once(VENDOR_MAAN_PATH.'Index/View/templates/Frontend/Index.phtml');
			// return $this->_toHtml();
			if ( class_exists($this->_block) )
				return new $this->_block;

			return false;
		}

		public function getTemplate()
		{
			$platform = isset($_SERVER['REDIRECT_URL']) ?  Redirect::getPlatform() : ucfirst("index");
			$controller = isset($_SERVER['REDIRECT_URL']) ?  Redirect::getController() : ucfirst("index");
			$action = isset($_SERVER['REDIRECT_URL']) ?  Redirect::getAction() : ucfirst("index");

			$layout = strtolower($platform)."_".strtolower($controller)."_".strtolower($action).".xml";
			// echo "<pre>";
			// var_dump($platform);
			// var_dump($controller);
			// var_dump($action);
			// die('---------------');
			$config = MAAN_ADMINHTML_PATH.ucfirst($platform)."/View/layout/".$layout;
			// var_dump($config);
			// die("..555.");
			$data = simplexml_load_file($config);
			$template = '';
			foreach ($data->children() as $children) {
				$blocks = $children->referenceContainer->block;
				if ($blocks) {
					$template = $blocks['template'];
				}
			}

			return $template;
		}

		
		public function setTemplate($str)
		{
			if (!is_null( $str ) && !empty( $str ) && isset( $str )) {
				$data = explode("::", $str);
				$data[0] = str_replace("_", "/", $data[0]);
				$data[0] = str_replace("\\", "/", VENDOR_PATH . $data[0]) . DS . 'View' . DS . 'templates' . DS;

				$template_path = implode( $data );
				if ( file_exists( $template_path ) && is_file( $template_path ) && !class_exists( $template_path ) ) {
					return $this->_template = $template_path;
				} 
				return false;
			}
		}

		public function getBlock()
		{
			$platform = isset($_SERVER['REDIRECT_URL']) ?  Redirect::getPlatform() : ucfirst("index");
			$controller = isset($_SERVER['REDIRECT_URL']) ?  Redirect::getController() : ucfirst("index");
			$action = isset($_SERVER['REDIRECT_URL']) ?  Redirect::getAction() : ucfirst("index");

			$layout = strtolower($platform)."_".strtolower($controller)."_".strtolower($action).".xml";
			// echo "<pre>";
			// var_dump($_SERVER);
			// die('---------------');
			$config = MAAN_ADMINHTML_PATH.ucfirst($platform)."/View/layout/".$layout;
			$data = simplexml_load_file($config);
			$block = '';
			foreach ($data->children() as $children) {
				$blocks = $children->referenceContainer->block;
				if ($blocks) {
					$block = $blocks['class'];
				}
			}

			return $block;
		}

		public function setBlock($str)
		{
			if (!is_null( $str ) && !empty( $str ) && isset( $str )) {
				$data = get_object_vars($str);
				$block_path = implode( $data );

				if ( class_exists( $block_path ) ) {
					return $this->_block = $block_path;
				} 
				return false;
			}
		}

		public function obj2array ( &$Instance ) {
			$clone = (array) $Instance;
			$rtn = array ();
			// $rtn['___SOURCE_KEYS_'] = $clone;

			while ( list ($key, $value) = each ($clone) ) {
				var_dump($key);
				var_dump($value);
				$aux = explode ("\0", $key);
				$newkey = $aux[count($aux)-1];
				$rtn[$newkey] = &$value;
				var_dump($aux);
			}

			return $rtn;
		}

		public function _toHtml()
		{
			var_dump($this->_template);
			die();
			if ( file_exists( $this->_template ) && is_file( $this->_template ) && !class_exists( $this->_template ) ) {
				require_once $this->_template;
			}
		}

		public function validata($str = null) {
			if ( !is_null( $str ) && !empty( $str ) && isset( $str ) ) { return $str; }
				return false;
		}
	}
?>