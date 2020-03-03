<?php
	function removeBadCharacters($s)
	{
	   return str_replace(array('\\','"',"'",'?','+'), '', $s);
	}
?>