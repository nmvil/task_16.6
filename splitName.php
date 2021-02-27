<?php
	// функция делит строку с ФИО на массив с именем, фамилией и отчеством по отдельности
	function getPartsFromFullname($fullname)
	{
		$keys = ['surname', 'name', 'patronymic'];
		$nameArr = explode(' ', $fullname);
		return array_combine($keys, $nameArr);
	}

	// функция собирает ФИО в одну строку
	function getFullnameFromParts($surname, $name, $patronymic)
	{
		return $surname . ' ' . $name . ' ' . $patronymic;
	}

	// функция сокращает ФИО до имени и первой буквы фамилии
	function getShortName($fullname)
	{
		$nameArr = getPartsFromFullname($fullname);
		return $nameArr['name'] . ' ' . mb_substr($nameArr['surname'], 0, 1) . '.';
	}
	
?>