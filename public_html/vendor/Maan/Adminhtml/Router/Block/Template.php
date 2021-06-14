<?php
	namespace Maan\Adminhtml\Router\Block;

	use Maan\Adminhtml\Router\Block\Redirect as Redirect;
	// use Maan\Framework\Helpers\Data as Helpers;

	/**
	 * 
	 */
	class Template extends Redirect
	{
		private $_template;
		private $_block;

		public function __construct()
		{
			$this->_template = '';
			$this->_block = '';
			$this->execute();
		}

		public function execute() {
			$template = $this->getTemplate();

			$template = (!empty($template)) ? $template : "Maan_Adminhhtml_Index::Index.phtml";
			$this->setTemplate($template);

			$this->setBlock($block);

			return $this->_toHtml();
		}

		public function getTemplate()
		{
			$platform = isset($_SERVER['REDIRECT_URL']) ?  Redirect::getPlatform() : ucfirst("index");
			$controller = isset($_SERVER['REDIRECT_URL']) ?  Redirect::getController() : ucfirst("index");
			$action = isset($_SERVER['REDIRECT_URL']) ?  Redirect::getAction() : ucfirst("index");

			$layout = strtolower($platform)."_".strtolower($controller)."_".strtolower($action).".xml";
			$config = MAAN_ADMINHTML_PATH.ucfirst($platform)."/View/layout/".$layout;

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

		public function _toHtml()
		{
			if ( file_exists( $this->_template ) && is_file( $this->_template ) && !class_exists( $this->_template ) ) {
				require_once $this->_template;
			}
		}
	}
?>