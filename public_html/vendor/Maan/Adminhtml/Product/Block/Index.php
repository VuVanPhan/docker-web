<?php
	namespace Maan\Adminhtml\Product\Block;

	use Maan\Framework\Model\DbConnect as DbConnect;
	use Maan\Adminhtml\Router\Block\Template as Template;

	/**
	 * 
	 */
	class Index extends Template
	{
		private $_conn;
		public $_product;

		public function __construct()
		{
			$this->_conn = new DbConnect();
			parent::__construct();
		}

		public function execute() {
			$template = $this->getTemplate();
			$template = (!empty($template)) ? $template : "Maan_Adminhtml_Product::default.phtml";
			$this->setTemplate($template);

			$conn = $this->_conn->connect();
			$this->_product = $conn->query("SELECT * FROM products");

			return $this->_toHtml();
		}

		public function validata($str = null) {
			if ( !is_null( $str ) && !empty( $str ) && isset( $str ) ) { return $str; }
				return false;
		}
	}
?>