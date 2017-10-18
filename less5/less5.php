
<?php

//Проверка входных параметров
if (!isset($_GET['degree']) || !is_numeric($_GET['degree']))	{
	echo "Необходимый параметр <b>degree</b> не задан или задан не верно.<br><b>Повторите ввод</b>";
	exit();
} else {
	$TValue=$_GET['degree'];
	}

$type = !isset($_GET['type']) ?  "c" : $_GET['type'];

if ($type!="c" && $type!="f"){
	echo "Необходимый параметр <b>type</b> задан не верно.<br><b>Повторите ввод</b>";
	exit();
}

//Подсчет
$T_ByType = calctemperature($TValue,$type);
$T_Sens = calcsens($T_ByType['degree']);

// Вывод на экран
echo "<h2> Погода сейчас..</h2>";
echo "Температура <b>".$T_ByType['degree']."°C / ".$T_ByType['fahrenheit']."°F </b> </br>";
echo "По ощущению - <b>".$T_Sens."</b></br>";

//===== END OF RUN ================================



//===== FUNCTION AREA ===========================

function calctemperature ($tval, $ttype){
	
	$tdegree = $ttype=="c" ? $tval : round(($tval-32)*(5/9),1); //Подсчет температуры в Цельсиях
	$tfahrenheit = $ttype=="f" ?  $tval :  round($tval*9/5+32,1);  //Подсчет температуры в Фарингейтах
	
	return ['degree'=>$tdegree, 
			'fahrenheit'=>$tfahrenheit] ;
}

function calcsens($tval_c){
$RangeTemperature = [	'мороз'=>-1,
						'заморозки'=>3,
						'холодно'=>10,
						'прохладно'=>20,
						'тепло'=>30,
						'жарко'=>30,
						];

					foreach ($RangeTemperature as $key => $value) 
							{
								if($tval_c<$value) {return $key;} //Перебор массива с возвратом ключа "ощущения"
							}						
return $key; // Если ни один ключ не сработал значит "Жарко" - возвращаем последний ключ
}

?>

