<?php
	
	// файл уже подключен в index.php
	// include 'splitName.php';

	function getShortName($fullname)
	{
		$nameArr = getPartsFromFullname($fullname);
		return $nameArr['name'] . ' ' . mb_substr($nameArr['surname'], 0, 1) . '.';
	}

?>