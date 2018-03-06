<?php
function listar_usuarios(){
  header('Content-Type: application/json');
  $mysqli = new mysqli('127.0.0.1', 'root', '', 'cociname');
  // Realizar una consulta SQL
  $sql = "SELECT * FROM usuarios";
  if (!$resultado = $mysqli->query($sql)) {
      // ¡Oh, no! La consulta falló.
      echo "Error: La ejecución de la consulta falló.";
      exit;
  }
  if ($resultado->num_rows === 0) {
      echo "Lo sentimos. No se pudo encontrar una coincidencia para el ID $aid. Inténtelo de nuevo.";
      exit;
  }
  while ($usuario = $resultado->fetch_assoc()) {
    $datos = array(
    'estado' => 'ok',
    'usuario' => $usuario['usuario'],
    'nombre' => $usuario['nombre'],
    'apellidos' => $usuario['apellido'],
    'password' => $usuario['password'],
    'descripcion' => $usuario['descripcion'],
    'fecha' => $usuario['fecha_nacimiento'],
    );
  }
  $resultado->free();
  $mysqli->close();
  return json_encode($datos, JSON_FORCE_OBJECT);
}
echo listar_usuarios();
?>
