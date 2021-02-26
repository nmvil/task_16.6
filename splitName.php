<?php

	function getPartsFromFullname($fullname)
	{
		$keys = ['surname', 'name', 'patronymic'];
		$nameArr = explode(' ', $fullname);
		return array_combine($keys, $nameArr);
	}

	function getFullnameFromParts($surname, $name, $patronymic)
	{
		return $surname . ' ' . $name . ' ' . $patronymic;
	}
	
?>