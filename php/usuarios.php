<?php
  header('Content-Type: application/json');
  $mysqli = new mysqli('127.0.0.1', 'root', '', 'cociname');
  $mysqli->query("SET NAMES 'utf8'");
  // Realizar una consulta SQL
  $sql = "SELECT * FROM usuarios";
  if (!$resultado = $mysqli->query($sql)) {
      // ¡Oh, no! La consulta falló.
      echo "Error: La ejecución de la consulta falló.";
      exit;
  }
  if ($resultado->num_rows === 0) {
      echo "Lo sentimos. No se pudo encontrar una coincidencia para el ID.";
      exit;
  }
  $datos = array();
  while ($usuario = $resultado->fetch_assoc()) {
    $row = array(
      'estado' => 'ok',
      'usuario' => $usuario['usuario'],
      'nombre' => $usuario['nombre'],
      'apellidos' => $usuario['apellido'],
      'password' => $usuario['password'],
      'descripcion' => $usuario['descripcion'],
      'fecha' => $usuario['fecha_nacimiento']
    );
    array_push($datos, $row);
  }
  $resultado->free();
  $mysqli->close();
  echo json_encode($datos, JSON_UNESCAPED_UNICODE);
?>
