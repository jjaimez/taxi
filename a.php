<?php
$mysqli = new mysqli("localhost", "root", "", "taxi");
if ($mysqli->connect_errno) {
    echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

$resultado = $mysqli->query("SELECT id FROM test ORDER BY id ASC");

echo "Orden inverso...\n";
for ($num_fila = $resultado->num_rows - 1; $num_fila >= 0; $num_fila--) {
    $resultado->data_seek($num_fila);
    $fila = $resultado->fetch_assoc();
    echo " id = " . $fila['id'] . "\n";
}

echo "Orden del conjunto de resultados...\n";
$resultado->data_seek(0);
while ($fila = $resultado->fetch_assoc()) {
    echo " id = " . $fila['id'] . "\n";
}
?>