<?php

	function getGenderFromName($fullname) {
		$nameArr = getPartsFromFullname($fullname);

		if (mb_substr($nameArr['surname'], -2) == 'ва' &&
			(mb_substr($nameArr['name'], -1) == 'а' || mb_substr($nameArr['name'], -1) == 'я') &&
			mb_substr($nameArr['patronymic'], -3) == 'вна') 
		{
			return -1;
		} elseif (mb_substr($nameArr['surname'], -1) == 'в' &&
				  (mb_substr($nameArr['name'], -1) == 'й' || mb_substr($nameArr['name'], -1) == 'н') &&
				  mb_substr($nameArr['patronymic'], -2) == 'ич') {
			return 1;
		} else {
			return 0;
		}
	}

?>