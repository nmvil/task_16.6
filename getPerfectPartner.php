<?php
	function getPerfectPartner($surname, $name, $patronymic, $nameArr) {


		$surname = mb_convert_case($surname, MB_CASE_TITLE_SIMPLE);
		$name = mb_convert_case($name, MB_CASE_TITLE_SIMPLE);
		$patronymic = mb_convert_case($patronymic, MB_CASE_TITLE_SIMPLE);

		$fullname = getFullnameFromParts($surname, $name, $patronymic);
		$gender = getGenderFromName($fullname);
		try {
			if ($gender == 0) {
				throw new Exception(WRONG_GENDER_ERROR);
			}			
		} catch (Exception $e) {
			return 'Не удалось определить пол';
		}




		$found = false;
		while (true) {
			$i = random_int(0, count($nameArr) - 1);
			if ($gender != getGenderFromName($nameArr[$i]['fullname'])) {
				$firstShortName = getShortName($fullname);
				$secondShortName = getShortName($nameArr[$i]['fullname']);

				$percentage = random_int(5000, 10000) / 100;
				$ans = <<<HEREDOCTEXT
				❤️🧡💛💚💙💜❤️🧡💛💚💙💜 <br>
				$firstShortName + $secondShortName = <br>
				идеально на $percentage % <br>
				❤️🧡💛💚💙💜❤️🧡💛💚💙💜 <br>
				HEREDOCTEXT;

				return $ans;

			}
		}
	}
?>