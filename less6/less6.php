<?php 
/*
Форма внизу файла передает в этот же файл данные. Форма запоминает данные, вводимые в прошлый раз.
$_POST['fn'] - N-ое число ряда Фибоначчи - можно ввести только целое число от 2-256
$_POST['method'] - метод вычисления - рекурсия или цикл
$mess - результат, который выводится под формой
$fcalc - переменная, куда попадает имя нужной функкции для подсчета числа Фибоначчи

Время выполнения скрипта: какой метод быстрее можно оценить если вводить большие числа - 100 до 256
На малых числах время выполнения ничтожно мало.

*/

	$startTime=curtime(); 
	$fcalc='FibonacciOver'; 	// Первая часть имени функции
	$cyclecheck=$recurcheck=''; // переменные предустановки радио переключателей формы
								// (изначально не заданы для осознанного выбора мтода подсчета)
	$fnval=''; 					// начальное значение N-го числа до ввода в форму значения


//ОБРАБОТКА ФОРМЫ

if (isset($_POST['fn']) && !empty($_POST['fn'])) { // проверка переменной на существование и содержание
	
	$fn=$_POST['fn']; 
	
	// проверка передачи переменной метода вычисления и ее содержания
	if (isset($_POST['method']) && $_POST['method']=='recursion')
		 		{ 	$method='Recursion'; $recurcheck='checked';} // если рекурсия
		
		elseif (isset($_POST['method'])
		&& $_POST['method']=='cycle')  			
				{	$method='Cycle'; $cyclecheck='checked';} // если цикл
		
		// если ошибка передачи
		else 									{		die('	<b>Необходимо ввести 						 
															метод подсчета. </b></br>
															Вернитесь 
															на предыдущую 
															страницу и введите 
															информацию правильно');				
		}

		$fnval=$fn;			//запоминается значение для формы N-e число
		
		$fcalc.=$method; 	// добавляется вторая часть к названию функции. 
							//получается либо FibonacciOverCycle либо FibonacciOverRecursion

		$mess=$fcalc($fn);	// ВЫЧИСЛЯЕТСЯ N-e ЧИСЛО РЯДА ФИБОНАЧЧИ НУЖНЫМ МЕТОДОМ
		
		$mess='<b>'.$fn.'</b>-е число ряда = <b>'.$mess.'</b>'; // формируется выводимое сообщение внизу формы


		
}else {
	$mess=' N-ое число ряда Фибоначчи <b>не задано</b>'; // сообщение внизу формы если N-e число ряда Фибоначчи не задано
}

 ?>

<!DOCTYPE html>
<html>
<head><meta charset="utf-8"><title>Подсчет N-го числа ряда Фибоначчи</title></head>

<body>
<h3>Подсчет N-го числа ряда Фибоначчи</h3><br>

<form method="POST" action="less6.php">
	<label>Определение
				<input 	style="text-align: center;" 
						type="number" 
						min="2" max="256" 
						name="fn" 
						value="<?php echo $fnval; ?>">-го числа ряда Фибоначчи
	</label><br><br>
	
	<label>	Методом 			&nbsp;&nbsp;&nbsp;&nbsp; 
				
			рекурсии 	<input 	type='radio' 
								name='method' 
								value='recursion' 
								<?php echo $recurcheck;?> >
								
								&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
						
			цикла		<input 	type='radio' 
								name='method' 
								value='cycle' 
								<?php echo $cyclecheck;?> >
								
								&nbsp;&nbsp;&nbsp; 
	</label>
				
				<input 	type='submit' 
						value='Подсчитать'>		

</form><br>

<h4>Искомое число ряда Фибоначчи. Функция подсчета <?php echo $fcalc; ?></h4>
<div><?php echo $mess;?></div>

<?php 
	$endTime = curtime(); 										// записываем конечное время
	$sec = $endTime[1] - $startTime[1];							// разница в сек (обычно равна нулю)
	$msec = substr(round($endTime[0] - $startTime[0], 7),1);	// разница в мсек 
?>		

<div>Время выполнения скрипта <b><?php echo $sec.$msec;?> сек</b></div>


</body>

</html>

<?php 
// Functions area

function FibonacciOverCycle ($fn, $fn0=0, $fn1=1){
    $fres=0;
	for ($i=2; $i<=$fn ; $i++) { 
		$fres=$fn0+$fn1;
		$fn0=$fn1; $fn1=$fres;
	}
	return $fres;
}

function FibonacciOverRecursion ($fn, $fn0=0, $fn1=1){

		$fres=$fn0+$fn1;
		if ($fn==2) {return $fres;}
	
	return FibonacciOverRecursion ($fn-1, $fn0=$fn1, $fn1=$fres);
}

function curtime(){
				$mt = microtime();        //Считываем текущее время
				$mtime = explode(" ",$mt);    //Разделяем миллисекунды и секунды в массив
				return $mtime; //отдаем разделенное время
		}


 ?>