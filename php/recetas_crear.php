<?php
header('Content-Type: application/json');
$conn = new mysqli('localhost', 'root', '', 'cociname');
$conn->query("SET NAMES 'utf8'");
if(isset($_POST["nombre"]) && isset($_POST["receta_descripcion"])&& isset($_POST["precio"])&& isset($_POST["id_user"])&& isset($_POST["porcion"]) ){
	if( !empty($_POST["nombre"])  && !empty($_POST["receta_descripcion"])&& !empty($_POST["precio"])&& !empty($_POST["id_user"])&& !empty($_POST["porcion"])  ){

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
		 'creado' => '0',
		 'Error' => '1'
		 );
			 echo json_encode($dato, JSON_UNESCAPED_UNICODE);
			 exit;
}
				$nombre = $_POST["nombre"];
				$receta_descripcion  = $_POST["receta_descripcion"];
				$precio = $_POST["precio"];
				$id_user = $_POST["id_user"];
				$porcion = $_POST["porcion"];
				$id_tipo = $_POST["id_tipo"];
				// To protect MySQL injection for Security purpose
				$nombre = stripslashes($nombre);
				$receta_descripcion = stripslashes($receta_descripcion);
				$precio = stripslashes($precio);
				$id_user = stripslashes($id_user);
				$porcion = stripslashes($porcion);
				$id_tipo = stripslashes($id_tipo);

				$nombre = mysql_real_escape_string($nombre);
				$receta_descripcion = mysql_real_escape_string($receta_descripcion);
				$precio = mysql_real_escape_string($precio);
				$id_user = mysql_real_escape_string($id_user);
				$porcion = mysql_real_escape_string($porcion);
				$id_tipo = mysql_real_escape_string($id_tipo);



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
		    else if($width < 220 || $height < 220)
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
		        $src = $carpeta.$nombre.$id_user.$id_tipo.mt_rand(1,999).image_type_to_extension($type);
		        move_uploaded_file($ruta_provisional, $src);
		    }

		//imagepng

$sql = "INSERT INTO recetas VALUES ( NULL,'$nombre', '$id_user', '$receta_descripcion', '$precio','$porcion' ,'$id_tipo' ,'$src' )";

			if ($conn->query($sql)) {
        $dato = array(
           'creado' => '1',
           'precio' => $precio,
           'id_user' => $id_user,
           'receta_descripcion' => $receta_descripcion,
           'nombre' => $nombre,
           'porcion' => $porcion,
           'id_tipo' => $id_tipo,
					 'src' => $src
           );
             echo json_encode($dato, JSON_UNESCAPED_UNICODE);
			}else {
        $dato = array(
           'creado' => '0',
					 'Error' => '6'
           );
             echo json_encode($dato, JSON_UNESCAPED_UNICODE);
      }


		$conn->close();
	}else {
    $dato = array(
       'creado' => '0',
			 'Error' => '8'

       );
         echo json_encode($dato, JSON_UNESCAPED_UNICODE);
  }
}else {
  $dato = array(
     'creado' => '0',
		 'Error' => '8'
     );
       echo json_encode($dato, JSON_UNESCAPED_UNICODE);
}
?>
