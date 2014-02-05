<?php

class Get_Encoding {

	var $check_string;
	var $default;
	var $encodings = array('UTF-8', 'EUCJP-win', 'SJIS-win');

	function Get_Encoding($check_string, $default='auto') {
	
		$this->check_string = $check_string;
		$this->default = $default;
	
	}
	
	function setEncodings($encodings) {
	
		$this->encodings = $encodings;
	
	}
	
	function getResult() {
	
		$check_string = $this->check_string;
	
		foreach($this->encodings as $charset) {
		
			if ($check_string == mb_convert_encoding($check_string, $charset, $charset)) {
			
				return $charset;
				
			}
			
		}
	
		return $this->default;
	
	}

}

/*** Sample Source

	require('get_encoding.php');
	
	$ge = new Get_Encoding('テスト文字', 'auto');
	$ge->setEncodings(array('UTF-8', 'EUCJP-win', 'SJIS-win'));	// 省略可
	echo $ge->getResult();

***/

?>
