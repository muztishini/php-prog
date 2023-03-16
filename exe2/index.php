<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="styles.css" />
	<title>Doc2</title>
</head>
<body>
	<form action="" target="_blank" method="post">
	<p>Номер записи:<input type="number" name="number" id="" value="" required></p>
	  <div style="border: 1px solid; text-align:center; width: 150px; height: 200px; float:left;">
		Предмет:
		<p>
		<select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="prm1">
			<option value="Математика">Математика</option>
			<option value="Информатика">Информатика</option>
			<option value="Русский">Русский</option>
			<option value="Физика">Физика</option>
			<option value="Обществознание">Обществознание</option>
		</select>
		</p>
	  </div>

	  <div style="border: 1px solid; width: 300px; height: 200px; float:left;">
		Требуется подготовка:	
		<p><input type="radio" name="prm2" id=""  value="ЕГЭ">ЕГЭ</p>
		<p><input type="radio" name="prm2" id="" value="ОГЭ">ОГЭ</p>
		<p><input type="radio" name="prm2" id="" value="школьные занятия">школьные занятия</p>
		<p><input type="radio" name="prm2" id="" value="">другое:<input type="text" name="prm12" id=""></p>		
	  </div>

	  <div style="border: 1px solid;  text-align:center; width: 150px; height: 200px; float:left;">
		Дата начала занятий:
		<p><input type="date" name="prm3" value=""></p>
	  </div>

	  <div style="border: 1px solid;  text-align:center; width: 200px; height: 200px; float:left;">
		Ориентировочная длина курса:
		<p><input type="number"  name="prm4"  id="" value="" ></p>
	  </div>

	  <div class="form-check" style="border: 1px solid; width: 370px; height: 150px; clear:left;float:left;">
		Условия:		
		<p><input type="checkbox" name="uslov[]"  id="" value="репетитор с опытом">репетитор с опытом</p>
		<p><input type="checkbox" name="uslov[]"  id="" value="отличная репутация">отличная репутация</p>
		<p><input type="checkbox" name="uslov[]"  id="" value="отзывов">более<input type="number" name="prm16" id="" value="">отзывов в резюме</p>		
	  </div>

	  <div style="border: 1px solid; text-align:center; width: 434px; height: 150px; float:left;">
		Цена одного занятия:
		<p><label style="font-weight:bold">1000 руб.</label><input type="range" name="prm6" id="" min="1000" max="5000"><label style="font-weight:bold">5000 руб.</label></p>
		<p>Время занятия:<input type="number" name="prm7" id="" value=""> минут</p>
	  </div>

	  <div style="border: 1px solid; text-align:center; width: 300px; height: 220px; clear:left; float:left;">
		Дополнительные пожелания:
		<p><textarea name="prm8" id="" cols="30" rows="10" value=""></textarea></p>
	  </div>

	  <div style="border: 1px solid; width: 400px; height: 220px; float:left;">
		Информация о ребенке:
		<p>ФИО:<input type="text" name="prm9" id="" value=""></p>
		<p>Возраст:<input type="number" name="prm10" id="" value="" ></p>
		<p>Контактный телефон:<input type="tel"  name="prm11" placeholder="+7(XXX)XXX-XXXXX" value=""></p>
	  </div>

	  <div style="border: 1px solid; text-align:center; width: 102px; height: 220px; float:left;">
		<input type="submit" name="send" value="Добавить">
		<input type="submit" name="del" value="Удалить">
		<input type="submit" name="update" value="Обновить">
	  </div>
	  
	</form>
</body>

<?php
	function add()
	{
		$number=$pred=$date=$cena=$otz = "";
		$uslov = ["нет"];

		if(isset($_POST["number"])){  
			$number = $_POST["number"];}
		if(isset($_POST["prm1"])){	
			$pred = $_POST["prm1"];}
		if(isset($_POST["prm3"])){
    		$date = $_POST["prm3"];}
		if(isset($_POST["prm6"])){
  			$cena = $_POST["prm6"];}
		if(isset($_POST["uslov"])){
     		$uslov = $_POST["uslov"];}
		if(isset($_POST["prm16"])){
			$otz = $_POST["prm16"];}
		$arr = array();
		$lines = file('databases.txt');
		foreach($lines as $line){			
			$val = explode("#", $line);
			array_push($arr, $val[0]);		
		}

		$fd = fopen("databases.txt", 'a') or die("не удалось создать файл");
		$us = "";
		foreach($uslov as $item){
			$us = $us." ".$item;
		};
		$str = $number."#".$pred."#".$date."#".$cena."#".$us."#".$otz."\n";

		if (in_array($number, $arr)) {
			echo "<h1>Запись с таким номером уже существует!</h1>";
			
		} else {
			echo "<h1>Запись добавлена в базу данных</h1>";

			fwrite($fd, $str);
			fclose($fd);

			
		}		
	}

	function del(){
		if(isset($_POST["number"])){  
			$number = $_POST["number"];			
		}
		$lines = file('databases.txt');
		foreach ($lines as $key => $value) {
			
			$val = explode("#", $value);
			if ($number == $val[0]) {				
				unset($lines[$key]);
				$fp=fopen("databases.txt","w"); 
				fputs($fp,implode("",$lines)); 
				fclose($fp);
				echo "<h1>Запись с номером $number удалена</h1>";
				return;
			}
		}
		echo "<h1>Записи с номером $number нет</h1>";
	}

	
	function update()
	{
		$number=$pred=$date=$cena=$otz = "";
		$uslov = ["нет"];

		if(isset($_POST["number"])){  
			$number = $_POST["number"];}
		if(isset($_POST["prm1"])){	
			$pred = $_POST["prm1"];}
		if(isset($_POST["prm3"])){
    		$date = $_POST["prm3"];}
		if(isset($_POST["prm6"])){
  			$cena = $_POST["prm6"];}
		if(isset($_POST["uslov"])){
     		$uslov = $_POST["uslov"];}
		if(isset($_POST["prm16"])){
			$otz = $_POST["prm16"];}

		$lines = file('databases.txt');
		foreach ($lines as $key => $value) {
			$val = explode("#", $value);
			if ($number == $val[0]) {				
				
				$us = "";
				foreach($uslov as $item){
					$us = $us." ".$item;};
				$str = $number."#".$pred."#".$date."#".$cena."#".$us."#".$otz."\n";

				$lines[$key] = $str;

				$fp=fopen("databases.txt","w"); 
				fputs($fp,implode("",$lines)); 
				fclose($fp);
				echo "<h1>Запись с номером $number обновлена</h1>";
				return;
			}	
		}
		echo "<h1>Записи с номером $number нет</h1>";
	}

	$number=$pred=$date=$cena=$otz = "";
	$uslov = ["нет"];

	if(isset($_POST["del"])){
		del();
		}

	if(isset($_POST["send"])){
		add();
		}

	if(isset($_POST["update"])){
		update();
		}


	$lines = file('databases.txt');
	if ($lines){
		echo '<table>';
		echo '<tr><th>Номер записи</th><th>Предмет</th><th>Дата начала занятий</th><th>Цена занятия</th><th>Условия</th></tr>';
		foreach($lines as $line){
						
			$val = explode("#", $line);
			if ($val[5]) {
				$val[5] = $val[5];
			} else {
				$val[5] = " ";
			}			
			echo '<tr><td>'."$val[0]".'</td><td>'."$val[1]".'</td><td>'."$val[2]".'</td><td>'."$val[3]".'</td><td>'."$val[4]$val[5]".'</td></tr>';
		}
		echo '</table>';
	}
?>
</html>
