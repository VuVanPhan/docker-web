<?php
	namespace Maan\Adminhtml\Product\Block\Product;

	use Maan\Framework\Model\DbConnect as DbConnect;
	use Maan\Framework\Helpers\Data as Helpers;
	use Maan\Adminhtml\Product\Model\Product as ProductModel;
	/**
	 * 
	 */
	class Edit
	{
		private $_conn;
		private $_template;
		private $_db;

		public function __construct()
		{
			$this->_db = new ProductModel();
			$this->_conn = new DbConnect();
			$this->_helper = new Helpers();
			$this->_template = '';
			$this->execute();
		}

		public function execute() {
			die('fffffffff');
			$conn = $this->_conn->connect();
			$conn = $conn->query("SELECT * FROM products");
			$template = $this->getTemplate();

			$template = (!empty($template)) ? $template : "Maan_Adminhtml_Product::edit.phtml";
			$this->setTemplate($template);
			// echo "<pre>";
			// foreach($conn as $row) {
		 //        var_dump($row);
		 //    }
			// die('fdffd');
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
			$config = MAAN_ADMINHTML_PATH."Product/View/layout/product_edit_index.xml";
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
				// echo "<pre>";
				$template_path = implode( $data );
				// var_dump($template_path);
				// die();
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

		public function validata($str = null) {
			if ( !is_null( $str ) && !empty( $str ) && isset( $str ) ) { return $str; }
				return false;
		}
	}
?>