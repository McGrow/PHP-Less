<?php 

//передаем в строке запроса название переменной и ее значение 
// по типу http://mysite.com/file.php?varname=VariableName&varval=VariableValue
// передача названия переменной, для поработать с "переменными переменых"

$varname=$_GET['varname'];
$$varname=$_GET['varval'];
@$varval=(string)$$varname; // для того, чтобы не ругалась при передаче массива и др. преобразованиях

$vartype=gettype( 
	is_array($$varname) ? $$varname : type_of_var ($$varname) // корректно определяем тип переменной
	);

setcookie($vartype, "Переменная $".$varname." имеет значение - ".$varval, time()+120);

//Выводим полученные данные
echo "<br> Получена переменная <b>$".$varname."</b> с значением = <b>"."$varval"."</b> Тип переменной определен как <b><i>".$vartype."</i></b><br>";
echo '<pre><br>';
var_dump($_GET['varval']);
echo '</pre><br>';

//выводим COOKIE
echo "<br><br>Содержимое COOKIES <br>";
echo '<pre>';
var_dump($_COOKIE);
echo '</pre><br>';


//функции ============================================================================

function type_of_var($var) {
	// Если полученная переменная передавалась в строке запроса как число (или первые ее символы есть число) то преобразуем ее в число
	
	return $var*1!=0 || $var=="0" ? $var=$var*1: $var;

}

?>