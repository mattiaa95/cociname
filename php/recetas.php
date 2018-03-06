<?php
header('Content-Type: application/json');
$mysqli = new mysqli('localhost', 'root', '', 'cociname');
// Realizar una consulta SQL
$sql = "SELECT * FROM recetas";
if (!$resultado = $mysqli->query($sql)) {
    // ¡Oh, no! La consulta falló.
    echo "Error: La ejecución de la consulta falló.";
    exit;
}
if ($resultado->num_rows === 0) {
    echo "Lo sentimos. No se pudo encontrar una coincidencia para el ID $aid. Inténtelo de nuevo.";
    exit;
}
while ($recetas = $resultado->fetch_assoc()) {
  $datos = array(
  'estado' => 'ok',
  'id' => $recetas['id_receta'],
  'nombre' => $recetas['nombre_receta'],
  'precio' => $recetas['precio']
  );
}
$resultado->free();
$mysqli->close();
echo json_encode($datos, JSON_FORCE_OBJECT);
?>
