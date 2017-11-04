<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="style.css" />
		<title>Угадай число</title>
	</head>
	<body>  
		<div class="container">
		  <h1>Добро пожаловать!</h1> <p> Введите число от 1 до 10.</p>
			<form method="post">
				<p><input name="user_num"  placeholder="Введите число"></p>
				<p><input type="submit" value="Отправить"></p>
				<p><input type="submit" name='destroy' value="Начать заново"></p>		
			</form>
			<?php

				if (isset($_POST['destroy'])) {
					session_unset();
			 		session_destroy();
			 	}

			 if(!isset($_SESSION['rnd_number']))
				{$_SESSION['rnd_number'] = rand(1, 10);
				$_SESSION['count'] = 0;}

			 if(!empty($_POST['user_num']))
				{$_SESSION['count']++;
				if ($_POST['user_num']>$_SESSION['rnd_number'])
					{echo "Задуманное число меньше!";}
				elseif($_POST['user_num']<$_SESSION['rnd_number'])
					{echo "Задуманное число больше!";}
				else
					{echo "Поздравляем, вы угадали число!"; 
					 unset($_SESSION['rnd_number']);
					 $_SESSION['stat'][] = $_SESSION['count'];
					}
				}

				echo "<p>Количество ходов:" . $_SESSION['count'] . "</p>";
				
				if (isset($_SESSION['stat'])) {
				foreach ($_SESSION['stat'] as $key => $value) {
					echo "<p>Игра:", ++$key, "ходов", $value, "</p>";
				}
				}
			?>
		 </div>
	 </body>
</html>

