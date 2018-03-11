<?php
header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  $mysqli = new mysqli('127.0.0.1', 'root', '', 'cociname');
  $mysqli->query("SET NAMES 'utf8'");
  @$usuario = $_POST['username'];
  @$password = $_POST['password'];
  // Realizar una consulta SQL
  $sql = "SELECT * FROM usuarios WHERE usuario LIKE \"".$usuario."\" AND password LIKE \"".$password."\";";
  if (!$resultado = $mysqli->query($sql)) {
    $dato = array(
       'estado' => '0'
       );
      echo json_encode($dato, JSON_UNESCAPED_UNICODE);;
      exit;
  }
  if ($resultado->num_rows === 0) {
    $dato = array(
       'estado' => '0'
       );
      echo json_encode($dato, JSON_UNESCAPED_UNICODE);;
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
      'fecha' => $usuario['fecha_nacimiento'],
      'email' => $usuario['email']
    );
    array_push($datos, $row);
  }
  $resultado->free();
  $mysqli->close();
  echo json_encode($datos, JSON_UNESCAPED_UNICODE);
?>
