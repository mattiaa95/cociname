<?php
header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  $mysqli = new mysqli('127.0.0.1', 'root', '', 'cociname');
  $mysqli->query("SET NAMES 'utf8'");
  if(isset($_POST["usuario"]) && isset($_POST["nombre"])&& isset($_POST["apellido"])&& isset($_POST["fecha"])&& isset($_POST["descripcion"])&& isset($_POST["password"]) ){
  	if( !empty($_POST["usuario"])  && !empty($_POST["nombre"])&& !empty($_POST["apellido"])&& !empty($_POST["fecha"])&& !empty($_POST["descripcion"])&& !empty($_POST["password"])  ){
      if (isset($_FILES["file"])){
      		    $file = $_FILES["file"];
      		    $tipo = $file["type"];
      		    $ruta_provisional = $file["tmp_name"];
      		    $size = $file["size"];
      		    $type   = exif_imagetype($ruta_provisional);
      		    $dimensiones = getimagesize($ruta_provisional);
      		    $width = $dimensiones[0];
      		    $height = $dimensiones[1];
      		    $carpeta = "../img/";
      }else {
      	$dato = array(
      		 'Error' => '1'
      		 );
      			 echo json_encode($dato, JSON_UNESCAPED_UNICODE);
      			 exit;
      }
      $usuario = $_POST['usuario'];
      $nombre = $_POST['nombre'];
      $apellido = $_POST['apellido'];
      $fecha = $_POST['fecha'];
      $descripcion = $_POST['descripcion'];
      $password = $_POST['password'];
      $email = $_POST['email'];

      $usuario = stripslashes($usuario);
      $nombre = stripslashes($nombre);
      $apellido = stripslashes($apellido);
      $fecha = stripslashes($fecha);
      $descripcion = stripslashes($descripcion);
      $password = stripslashes($password);

      $usuario = mysql_real_escape_string($usuario);
      $nombre = mysql_real_escape_string($nombre);
      $apellido = mysql_real_escape_string($apellido);
      $fecha = mysql_real_escape_string($fecha);
      $descripcion = mysql_real_escape_string($descripcion);
      $password = mysql_real_escape_string($password);

      if ($tipo != 'image/jpg' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif')
      {
        $dato = array(
           'creado' => '0',
           'Error' => '2'
           );
             echo json_encode($dato, JSON_UNESCAPED_UNICODE);
             exit;
      }
      else if ($size > 1024*1024)
      {
        $dato = array(
           'creado' => '0',
           'Error' => '3'
           );
             echo json_encode($dato, JSON_UNESCAPED_UNICODE);
             exit;
      }
      else if ($width > 700 || $height > 700)
      {
        $dato = array(
           'creado' => '0',
           'Error' => '4'
           );
             echo json_encode($dato, JSON_UNESCAPED_UNICODE);
             exit;
      }
      else if($width < 20 || $height < 20)
      {
        $dato = array(
           'creado' => '0',
           'Error' => '5'
           );
             echo json_encode($dato, JSON_UNESCAPED_UNICODE);
             exit;
      }
      else
      {
          $nombrefinal=$fecha.mt_rand(1,99999).image_type_to_extension($type);
          $src = $carpeta.$nombrefinal;
          move_uploaded_file($ruta_provisional, $src);
      }

      // Realizar una consulta SQL
      $sql = "INSERT INTO usuarios VALUES ( NULL,'$usuario','$nombre','$apellido','$fecha','$descripcion','$password','$email','$nombrefinal');";
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
