<?php
/**
 * 
 */
class Validate
{
	public function __construct() {
		self::init();
	}

	public function init() {

	}

	public function _trim ($str)
	{
		return trim( $str );
	}

	public function _htmlentities ($str) {
		return htmlentities( $str );
	}

	public function _checkKey ($str)
	{
		$str = trim( htmlentities( $_SERVER["REDIRECT_URL"] ) );

		return trim( $str );
	}

	public function _removescriptTag ($text, $tags = '', $invert = FALSE) {
		preg_match_all('/<(.+?)[\s]*\/?[\s]*>/si', trim($tags), $tags);
		$tags = array_unique($tags[1]);

		if(is_array($tags) AND count($tags) > 0) {
		if($invert == FALSE) {
		  return preg_replace('@<(?!(?:'. implode('|', $tags) .')\b)(\w+)\b.*?>.*?</\1>@si', '', $text);
		}
		else {
		  return preg_replace('@<('. implode('|', $tags) .')\b.*?>.*?</\1>@si', '', $text);
		}
		}
		elseif($invert == FALSE) {
		return preg_replace('@<(\w+)\b.*?>.*?</\1>@si', '', $text);
		}
		return $text;
	}

	public function _scriptTagHtml($str) {
		$tag = "<h1><h2>";
		return strip_tags();
	}
}
?>