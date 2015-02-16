<?php
class Security
{
	public function SqlSecurity($text){
		 $danger = array('"','insert','delete','from','update','truncate','select','*','<','>','&');	
		 $clear = array('+','+','+','+','+','+','+','+','+','+','+');
		 str_replace($danger, $clear, $text);
		 //$text = stripslashes($text);
		 $text = addslashes($text);
		 $text = strip_tags($text);
 		 return $text;
	}
}
?>