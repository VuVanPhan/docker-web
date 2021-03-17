<?php
	namespace Maan\Ls\Controllers\Lskep;

	use Maan\Framework\Controllers\Redirect\Redirect as Redirect;
	/**
	 * 
	 */
	class Index extends Redirect
	{
		
		public function __construct()
		{
			$this->execute();
		}

		public function execute()
		{
			$post = $this->validatePost();
			if ( $post ) {
				$total = [];
				// echo "<pre>";
				// var_dump($post["lannhapgocnam"]);
				$kyhan = $post["sonam"];
				$lannhapgoc = $post["lannhapgocnam"]*$kyhan;
				if ( $lannhapgoc > 1 ) {
					for ($lannhapgoc; $lannhapgoc > 0; $lannhapgoc--) { 
							$total[$lannhapgoc] = $post["sotien"]*pow((1+(($post["laisuat"]/100)/$post["lannhapgocnam"])),$lannhapgoc);
					}
				} else {
					$total[] = $post["sotien"]*pow((1+(($post["laisuat"]/100)/$post["lannhapgocnam"])),($post["lannhapgocnam"]*$kyhan));
				}
				$post["label"] = $this->labelLai($post["kyhan"]);
				// var_dump($total);
				// echo "</pre>";
				// die('ff');
				$post["total"] = $total;
				return $this->redirect("*/*/result", $post);
			} else return $this->redirect("*/*/");
		}

		public function labelLai($kyhan) {
			$kyhan = trim($kyhan);
			$kyhan = strtoupper($kyhan);
			$label = "Lãi ";
			if ( substr($kyhan, -1) == "W" && strlen($kyhan) < 3 ) {
				$label .= "tuần";
			} else {
				if ( substr($kyhan, -1) == "M" && strlen($kyhan) < 3 ) {
					$label .= "tháng";
				} else $label .= "năm";
			}
			return $label;
		}

		public function validatePost()
		{
			$post = $_POST;
			if (isset($post["kyhan"]) && !is_null($post["kyhan"]) && !empty($post["kyhan"])) {
					switch ($post["kyhan"]) {
						case '1W':
							$post["lannhapgocnam"] = "52";
							break;
						case '2W':
							$post["lannhapgocnam"] = "26";
							break;
						case '3W':
							$post["lannhapgocnam"] = "17";
							break;
						case '1M':
							$post["lannhapgocnam"] = "12";
							break;
						case '2M':
							$post["lannhapgocnam"] = "6";
							break;
						case '3M':
							$post["lannhapgocnam"] = "4";
							break;
						case '6M':
							$post["lannhapgocnam"] = "2";
							break;
						case '9M':
							$post["lannhapgocnam"] = "1";
							break;
						case '12M':
							$post["lannhapgocnam"] = "1";
							break;
						case '18M':
							$post["lannhapgocnam"] = "1";
							break;
						case '24M':
							$post["lannhapgocnam"] = "1";
							break;
						case '36M':
							$post["lannhapgocnam"] = "1";
							break;
						default:
							$post["lannhapgocnam"] = "1";
							break;
						}
				return $post;
			} else return false;
		}
	}
?>