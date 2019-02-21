<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>
<?php
for ($i=1; $i < 5; $i++) { 
    for ($j=1; $j < $i+1 ; $j++) {
        echo $j . "\t";
    }
    echo "<br>";
}
	
echo"<br>";

for ($i=5; $i > 1; $i--) { 
    for ($j=1; $j < $i ; $j++) {
        echo $j . "\t";
    }
    echo "<br>";
}

echo"<br>";

for ($i=5; $i > 1; $i--) { 
    for ($j=$i-1; $j > 0 ; $j--) {
        echo $j . "\t";
    }
    echo "<br>";
}
	?>
<body>
</body>
</html>