<?php echo "Привет Мир <br><br>"; ?>
<?php 	$text1="Hello "; 
		$text2="Big ";
		$text3="World ";
		$ttl="Урок 1"
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $ttl; ?></title>
</head>
<body>
<h1><?php echo $text1.$text2.$text3?><br><br></h1>
<h3>Системные переменные PHP</h3>
Папка документа - <?php echo $_SERVER['REQUEST_URI']; ?><br>
Локальный путь сервера к папке Localhost  - <?php echo $_SERVER['DOCUMENT_ROOT']; ?><br>
Полный путь к папке программы - <?php echo $_SERVER['HTTP_HOST']; ?><br>
<strong>Полный путь впапку документа - <?php echo $_SERVER['DOCUMENT_ROOT']."/".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?></strong>
</body>
</html>
<?php phpinfo() ;?>

