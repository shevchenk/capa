<?php 

for ($i=1; $i < 5; $i++){
for ($l=$i; $l < 5; $l++){
	echo $l . "\t";
}	
echo "<br>";
}


for ($i=4; $i >=1 ; $i--) {
for ($j=1; $j <=$i ; $j++) { 
    echo $j."\t";
}
echo "<br>";
}

 echo "<br>";

for ($i=4; $i >=1 ; $i--) { 
for ($j=$i; $j >=1 ; $j--) { 
    echo $j."\t";
}
echo "<br>";
}
$array=array(
    array('paterno'=>'a','materno'=>'b','nombre'=>'c')
    ,array('paterno'=>'1a','materno'=>'1b','nombre'=>'1c')
    ,array('paterno'=>'1a','materno'=>'1b','nombre'=>'1c')
    ,array('paterno'=>'2a','materno'=>'2b','nombre'=>'2c')
    ,array('paterno'=>'3a','materno'=>'3b','nombre'=>'3c')
    ,array('paterno'=>'4a','materno'=>'4b','nombre'=>'4c')
    ,array('paterno'=>'5a','materno'=>'5b','nombre'=>'5c')
    ,array('paterno'=>'6a','materno'=>'6b','nombre'=>'6c')
    ,array('paterno'=>'7a','materno'=>'7b','nombre'=>'7c')
    ,array('paterno'=>'8a','materno'=>'8b','nombre'=>'8c')
    ,array('paterno'=>'9a','materno'=>'9b','nombre'=>'9c')
    );
//  Crear Caja texto, crear textarea, crear tablas, crear botones  HTML5
echo "<table style='border: black solid 1px;'>";
echo "<tr>";
echo "<th> N° </th>";
echo "<th> Paterno</th>";
echo "<th> Materno</th>";
echo "<th> Nombre</th>";
echo "</tr>";
foreach ($array as $key => $value) {
    echo "<tr>";
        echo "<td style='border: black solid 1px;'>".($key+1)."</td>";
        echo "<td style='border: black solid 1px;'>".$value['paterno']."</td>";
        echo "<td style='border: black solid 1px;'>".$value['materno']."</td>";
        echo "<td style='border: black solid 1px;'>".$value['nombre']."</td>";
    echo "</tr>";
}
echo "</table>";
/*
while ( <= 10) {
    # code...
}
*/


// Ver crear tablas    colspan coger columnas //   rowspan coger filas
?>

<table border="1">
    <tr>
        <td>Hola</td>
    </tr>
</table>