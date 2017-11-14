<?php 
$ttl="HTML внедрен в PHP ";
$text="Этот документ является PHP документом с внедренным HTML";

echo "<!DOCTYPE html><html><head><title> $ttl </title></head><body>";
echo "<h3 style='	text-align: center;'> $text </h3>";
echo "
		<p style='	width: 400px; 
					margin: auto; 
					text-align: center;
					font: 1.3em/1em Serif;'>
												В этом документе PHP выводит HTML код через код <b>echo</b>
		</p>

		</body>
		</html>
"
?>