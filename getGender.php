<?php
	
	// функция по определённым признакам возвращает пол человека
	// -1 - женский пол, 0 - пол не удалось определить, 1 - мужской пол
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

	// функция возвращает половой состав аудитории
	function getGenderDescription($arr) {
		$male = 0;
		$female = 0;
		$unspecified = 0;
		$all = count($arr);

		foreach ($arr as $key => $value) {
			switch (getGenderFromName($value['fullname'])) {
				case -1:
					$female++;
					break;
				case 1:
					$male++;
					break;
				default:
					$unspecified++;
					break;
			}
		}
		$percentage = [
			'male' => round(($male / $all) * 100, 1),
			'female' => round(($female / $all) * 100, 1),
			'unspecified' => round(($unspecified / $all) * 100, 1),

		];

		return $percentage;
	}

?>