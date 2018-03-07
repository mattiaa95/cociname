<?php
  header('Content-Type: application/json');
  $mysqli = new mysqli('127.0.0.1', 'root', '', 'cociname');
  $mysqli->query("SET NAMES 'utf8'");
  if(isset($_POST["usuario"]) && isset($_POST["nombre"])&& isset($_POST["apellido"])&& isset($_POST["fecha"])&& isset($_POST["descripcion"])&& isset($_POST["password"]) ){
  	if( !empty($_POST["usuario"])  && !empty($_POST["nombre"])&& !empty($_POST["apellido"])&& !empty($_POST["fecha"])&& !empty($_POST["descripcion"])&& !empty($_POST["password"])  ){
      $usuario = $_POST['usuario'];
      $nombre = $_POST['nombre'];
      $apellido = $_POST['apellido'];
      $fecha = $_POST['fecha'];
      $descripcion = $_POST['descripcion'];
      $password = $_POST['password'];
      // Realizar una consulta SQL
      $sql = "INSERT INTO usuarios VALUES ( NULL,'$usuario','$nombre','$apellido','$fecha','$descripcion','$password');";
      if ($mysqli->query($sql)) {
        $datos = array(
           'creado' => '1'
           );
      }else {
        $datos = array(
           'creado' => '0'
           );
      }
    }
    else {
      $datos = array(
        'creado' => '0'
      );
    }
  }
  else {
    $datos = array(
       'creado' => '0'
       );
  }
  $mysqli->close();
  echo json_encode($datos, JSON_UNESCAPED_UNICODE);
?>
