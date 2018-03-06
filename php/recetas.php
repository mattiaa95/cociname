<?php
header('Content-Type: application/json');
$mysqli = new mysqli('localhost', 'root', '', 'cociname');
$mysqli->query("SET NAMES 'utf8'");
// Realizar una consulta SQL
$sql = "SELECT * FROM recetas";

if (!$resultado = $mysqli->query($sql)) {
    // ¡Oh, no! La consulta falló.
    echo "Error: La ejecución de la consulta falló.";
    exit;
}
if ($resultado->num_rows === 0) {
    echo "Lo sentimos. No se pudo encontrar una coincidencia.";
    exit;
}
$datos= array();
while ($receta = $resultado->fetch_assoc()) {
 $row = array(
    'id' => $receta['id_receta'],
    'precio' => $receta['precio'],
    'id_user' => $receta['id_user'],
    'receta_descripcion' => $receta['receta_descripcion'],
    'nombre' => $receta['nombre']
    );
array_push($datos, $row);
}
$resultado->free();
$mysqli->close();
echo json_encode($datos, JSON_UNESCAPED_UNICODE);
?>
