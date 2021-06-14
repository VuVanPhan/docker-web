<?php
	namespace Maan\Index\Block;

	use Maan\Framework\Model\DbConnect as DbConnect;
	use Maan\Framework\Helpers\Data as Helpers;
	/**
	 * 
	 */
	class Index
	{
		private $_conn;
		private $_template;
		public function __construct()
		{
			$this->_conn = new DbConnect();
			$this->_helper = new Helpers();
			$this->_template = '';
			$this->execute();
		}

		public function execute() {
			$template = $this->getTemplate();
			$template = (!empty($template)) ? $template : "Maan_Index::Frontend/default.phtml";
			$this->setTemplate($template);
			// echo "<pre>";
			// var_dump($template);
			// die('fffffffffffffffffffff');
			// require_once($template);
			$conn = $this->_conn->connect();
			$products 	= $conn->query("SELECT * FROM products");
			$posts		= $conn->query("SELECT * FROM posts");
			// require_once(VENDOR_MAAN_PATH.'Index/View/templates/Frontend/Index.phtml');
			return $this->_toHtml();
		}

		public function getTemplate()
		{
			// echo "<pre>";
			// var_dump($_SERVER);
			// die('---------------');
			$config = VENDOR_MAAN_PATH."Index/View/layout/index_index_index.xml";
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
				//echo "<pre>";
				$template_path = implode( $data );
				//var_dump($template_path);
				//var_dump(file_exists( $template_path ) , is_file( $template_path ), !class_exists( $template_path ));
				if ( file_exists( $template_path ) && is_file( $template_path ) && !class_exists( $template_path ) ) {
					//var_dump($template_path);
					return $this->_template = $template_path;
				} 
				return false;
			}
		}

		public function _toHtml()
		{
			if ( file_exists( $this->_template ) && is_file( $this->_template ) && !class_exists( $this->_template ) ) {
				require_once $this->_template;
			}
		}
	}
?>