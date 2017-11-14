<?php 
$ttl="PHP внедрен в HTML ";
$text="Этот документ является HTML документом со вставками PHP";
?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo $ttl?></title>
</head>
<body>
<h3 style="	text-align: center;"> 			<?php echo $text?>
</h3>

<p style="	width: 400px; 
			margin: auto; 
			text-align: center;
			font: 1.3em/1em Serif;">
											Иногда сервер не читает PHP вставки в документе с расширением *.html. Это зависит от настроек сервера. Поэтому расширение этого документа *.php
</p>

</body>
</html>