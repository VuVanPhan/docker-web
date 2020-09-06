<?php
	/**
	 * Form register user
	 */
	use Maan\Core\Model\Users as Users;
	class Maan_Core_Controllers_FormuserController
	{
		
		public function indexAction()
		{
			$result=[];
			if (isset($_POST["user"]) && isset($_POST["pass"])) {
				$result["success"]="Request success";
				$model = new Users;
				$model = $model->load('insert', $result);
			} else {
				$result["error"]="Request not success";
			}
			return $result;
		}
	}
?>