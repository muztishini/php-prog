<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Doc1</title>
</head>

<?php
$pred=$rad=$date=$len=$dr=$otz=$cena=$time=$dop=$name=$age=$tel = "нет";
$uslov = ["нет"];

if(isset($_POST["prm1"])){
  
    $pred = $_POST["prm1"];
}
if(isset($_POST["prm2"])){
  
    $rad = $_POST["prm2"];
}
if(isset($_POST["prm3"])){
  
    $date = $_POST["prm3"];
}
if(isset($_POST["prm4"])){
  
    $len = $_POST["prm4"];
}
if(isset($_POST["prm12"])){
  
    $dr = $_POST["prm12"];
}
if(isset($_POST["uslov"])){
     
    $uslov = $_POST["uslov"];       
}
if(isset($_POST["prm16"])){
  
    $otz = $_POST["prm16"];
}
if(isset($_POST["prm6"]) and isset($_POST["prm7"])){
  	$time = $_POST["prm7"];
    $cena = $_POST["prm6"];
}
if(isset($_POST["prm8"])){
  
    $dop = $_POST["prm8"];
    if ($dop=="") {
    	$dop = "нет";
    }
}
if(isset($_POST["prm9"]) and isset($_POST["prm10"]) and isset($_POST["prm11"])){
  	$name = $_POST["prm9"];
    $age = $_POST["prm10"];
    $tel = $_POST["prm11"];
}

echo "Предмет: $pred <br>
	  Какая подготовка требуется: $rad"; if ($dr) {echo "$dr";}
echo "<br>";
echo "Дата начала занятий: $date <br>
	  Длина курса: $len <br>";
echo "Условия: "; foreach($uslov as $item) echo "$item "; echo "$otz <br>";
echo "Цена занятия: $cena руб. <br>
	  Время занятия: $time минут <br>
	  Дополнительные пожелания: $dop <br>
	  ФИО: $name <br>
	  Возраст: $age <br>
	  Телефон: $tel";

?>


<body>
	<form target="_blank" method="post" autocomplete="on">

	  <div style="border: 1px solid; text-align:center; width: 150px; height: 200px; float:left;">
		Предмет:
		<p>
		<select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="prm1">
			<option value="Математика">Математика</option>
			<option value="Информатика">Информатика</option>
			<option value="Русский язык">Русский язык</option>
			<option value="Физика">Физика</option>
			<option value="Обществознание">Обществознание</option>
		</select>
		</p>
	  </div>

	  <div style="border: 1px solid; width: 300px; height: 200px; float:left;">
		Требуется подготовка:	
		<p><input type="radio" name="prm2" id="" required value="ЕГЭ">ЕГЭ</p>
		<p><input type="radio" name="prm2" id="" required value="ОГЭ">ОГЭ</p>
		<p><input type="radio" name="prm2" id="" required value="школьные занятия">школьные занятия</p>
		<p><input type="radio" name="prm2" id="" required value="">другое:<input type="text" name="prm12" id=""></p>		
	  </div>

	  <div style="border: 1px solid;  text-align:center; width: 150px; height: 200px; float:left;">
		Дата начала занятий:
		<p><input type="date" name="prm3" required value="<?php echo $_POST['prm3']; ?>"></p>
	  </div>

	  <div style="border: 1px solid;  text-align:center; width: 200px; height: 200px; float:left;">
		Ориентировочная длина курса:
		<p><input type="number"  name="prm4"  id="" required value="<?php echo $_POST['prm4']; ?>" ></p>
	  </div>

	  <div class="form-check" style="border: 1px solid; width: 370px; height: 150px; clear:left;float:left;">
		Условия:		
		<p><input type="checkbox" name="uslov[]"  id="" value="репетитор с опытом">репетитор с опытом</p>
		<p><input type="checkbox" name="uslov[]"  id="" value="отличная репутация">отличная репутация</p>
		<p><input type="checkbox" name="uslov[]"  id="" value="отзывов">более<input type="number" name="prm16" id="" value="<?php echo $_POST['prm16']; ?>">отзывов в резюме</p>		
	  </div>

	  <div style="border: 1px solid; text-align:center; width: 434px; height: 150px; float:left;">
		Цена одного занятия:
		<p><label style="font-weight:bold">1000 руб.</label><input type="range" name="prm6" id="" min="1000" max="5000"><label style="font-weight:bold">5000 руб.</label></p>
		<p>Время занятия:<input type="number" name="prm7" id="" required value="<?php echo $_POST['prm7']; ?>"> минут</p>
	  </div>

	  <div style="border: 1px solid; text-align:center; width: 300px; height: 220px; clear:left; float:left;">
		Дополнительные пожелания:
		<p><textarea name="prm8" id="" cols="30" rows="10" value="<?php echo $_POST['prm8']; ?>"></textarea></p>
	  </div>

	  <div style="border: 1px solid; width: 400px; height: 220px; float:left;">
		Информация о ребенке:
		<p>ФИО:<input type="text" name="prm9" id="" required value="<?php echo $_POST['prm9']; ?>"></p>
		<p>Возраст:<input type="number" name="prm10" id="" required value="<?php echo $_POST['prm10']; ?>" ></p>
		<p>Контактный телефон:<input type="tel"  name="prm11" placeholder="+7(XXX)XXX-XXXXX" required value="<?php echo $_POST['prm11']; ?>"></p>
	  </div>

	  <div style="border: 1px solid; text-align:center; width: 102px; height: 220px; float:left;">
		<input type="submit" class="btn btn-primary" value="Искать -->">
	  </div>
	</form>
</body>
</html>