<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>php</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<?php 
		// подключаем все функции
		include 'example_persons.php';
		include 'splitName.php';
		include 'getGender.php';

		// выбираем рандомное имя из массива
		$fullname = $example_persons_array[random_int(0, count($example_persons_array) - 1)]['fullname'];
	?>
	<div class="person-card">
		<h3>Полное имя:</h3>
		<p> <?php echo $fullname; ?> </p>

		<h3>getPartsFromFullname:</h3>
		<code> <?php print_r(getPartsFromFullname($fullname)); ?> </code>

		<h3>getShortName:</h3>
		<p> <?php echo getShortName($fullname); ?> </p>

		<h3>getGenderFromName:</h3>
		<p> <?php echo getGenderFromName($fullname); ?> </p>

		<h3>Гендерный состав аудитории:</h3>
		<div class="genderD">
			<?php 
				$genderDesc = getGenderDescription($example_persons_array);

				echo 'Мужчины - ' . $genderDesc['male'] . '<br>';
				echo 'Женщины - ' . $genderDesc['female'] . '<br>';
				echo 'Не удалось определить - ' . $genderDesc['unspecified'] . '<br>';
			?>
		</div>
	</div>
</body>
</html>