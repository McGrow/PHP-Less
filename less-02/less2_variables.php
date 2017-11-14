

<?php
class tools {
	public function typetool ()	{
			return "power tool";
	}
}

$varclbl = function () {
	return "simple data";
} ;

$arrvar = 		[
					NULL,
					TRUE,
					27,
					27/2,
					'Типы данных PHP', 
					new tools(), 
					$varclbl,
					array(1,2,3,4,5)
				];

$arrassocvar = 	[
					"NULL"=>$arrvar [0],
					"Boolean"=>$arrvar [1],
					"Integer"=>$arrvar [2],
					"Float"=>$arrvar [3],
					"String"=>$arrvar [4],
					"Object"=>$arrvar [5],
					"Callable"=>$arrvar [6],
					"Array"=>$arrvar [7],
				];



?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo $arrvar ['4']; ?></title>
</head>
<body>

<h1><?php echo $arrvar ['4'];?></h1>

<table border="1" width="80%" style="font-size: 18px;">
	
	<thead><td>		Типы переменных
	</td><td>		Их значения
	</td></thead>
	
	<tr><td>		Null
	</td><td>		<?php echo $arrvar ['0']; ?>
	</td></tr>

	<tr><td>		boolean
	</td><td>		<?php echo $arrvar ['1']; ?>
	</td></tr>

	<tr><td>		integer
	</td><td>		<?php echo $arrvar [2]; ?>
	</td></tr>
	<tr><td>		float
	</td><td>		<?php echo $arrvar [3]; ?>
	</td></tr>
	
	<tr><td>		String
	</td><td>		<?php echo $arrvar [4]; ?>
	</td></tr>

	<tr><td>		Obgect
	</td><td>		<?php echo var_dump($arrvar [5]); ?>
	</td></tr>

	<tr><td>		Callable
	</td><td>		<?php 	var_dump($arrvar [6]); 
				  	echo "<br> выводит результат выполнения функции и соответственно получившийся тип переменной" ?>
  	</td></tr>

	<tr><td>		Array
	</td><td>		<?php var_dump($arrvar [7]); ?>
	</td></tr>							   

</table>
<br><br>

<table border="1" width="80%" style="font-size: 18px;">
	
	<thead><td>		Типы переменных
	</td><td>		Их значения
	</td></thead>
	
	<tr><td>		<?php echo gettype($arrassocvar ['NULL']); ?>
	</td><td>		<?php echo $arrassocvar ['NULL']; ?>
	</td></tr>

	<tr><td>		<?php echo gettype($arrassocvar ['Boolean']); ?>
	</td><td>		<?php echo $arrassocvar ['Boolean']; ?>
	</td></tr>

	<tr><td>		<?php echo gettype($arrassocvar ['Integer']); ?>
	</td><td>		<?php echo $arrassocvar ['Integer']; ?>
	</td></tr>

	<tr><td>		<?php echo gettype($arrassocvar ['Float']); ?>
	</td> <td>		<?php echo $arrassocvar ['Float']; ?>
	</td></tr>

	<tr><td>		<?php echo gettype($arrassocvar ['String']); ?>
	</td> <td>		<?php echo $arrassocvar ['String']; ?>
	</td></tr>

	<tr><td>		<?php echo gettype($arrassocvar ['Object']); ?>
	</td><td>		<?php echo var_dump($arrassocvar ['Object']); ?>
	</td></tr>

	<tr><td>		<?php echo gettype($arrassocvar ['Callable']); ?>
	</td><td>		<?php var_dump($arrassocvar ['Callable']); 
							echo "<br> выводит результат выполнения функции и соответственно получившийся тип переменной" ?>
	</td></tr>
	<tr><td>		<?php echo gettype($arrassocvar ['Array']); ?>
	</td><td>		<?php var_dump($arrassocvar ['Array']); ?>
	</td></tr>							   

</table>

</body>
</html>


