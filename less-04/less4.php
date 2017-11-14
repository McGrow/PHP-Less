
<?php
!isset($_GET['a']) ? $a="0" : $a=$_GET['a'];
!isset($_GET['b']) ? $b="0" : $b=$_GET['b'];

$operation =	$_GET['operation']=="-"
			||	$_GET['operation']=="/"
			||	$_GET['operation']=="*"
			||	$_GET['operation']=="%"
			||	$_GET['operation']=="^" 	
	
								?  $_GET['operation'] : "+" ;


$MathString = $a." ".$operation." ".$b;
$operation=="^" ? @eval('$Value='.pow($a, $b).';') : @eval('$Value='.$MathString.';') ;

echo "<h2>Калькулятор</h2></br></br>";
echo $MathString." = ".$Value."</br></br>";
?>