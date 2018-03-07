<?php
  header('Content-Type: application/json');
  $mysqli = new mysqli('127.0.0.1', 'root', '', 'cociname');
  $mysqli->query("SET NAMES 'utf8'");
  $usuario = $_POST['username'];
  $password = $_POST['password'];
  // Realizar una consulta SQL
  $sql = "SELECT * FROM usuarios WHERE usuario LIKE \"".$usuario."\" AND password LIKE \"".$password."\";";
  if (!$resultado = $mysqli->query($sql)) {
      // ¡Oh, no! La consulta falló.
      echo "Error: La ejecución de la consulta falló.";
      exit;
  }
  if ($resultado->num_rows === 0) {
      echo "0";
      exit;
  }
  $datos = array();
  while ($usuario = $resultado->fetch_assoc()) {
    $row = array(
      'id' => $usuario['id_user'],
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
