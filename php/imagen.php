<?php
header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
if (isset($_FILES["file"]))
{
    $file = $_FILES["file"];
    $nombre = $file["name"];
    $tipo = $file["type"];
    $ruta_provisional = $file["tmp_name"];
    $size = $file["size"];
    $type   = exif_imagetype($ruta_provisional);
    $dimensiones = getimagesize($ruta_provisional);
    $width = $dimensiones[0];
    $height = $dimensiones[1];
    $carpeta = "../img/";

    if ($tipo != 'image/jpg' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif')
    {
      echo "Error, el archivo no es una imagen";
    }
    else if ($size > 1024*1024)
    {
      echo "Error, el tamaño máximo permitido es un 1MB";
    }
    else if ($width > 700 || $height > 700)
    {
        echo "Error la anchura y la altura maxima permitida es 500px";
    }
    else if($width < 220 || $height < 220)
    {
        echo "Error la anchura y la altura mínima permitida es 60px";
    }
    else
    {
        $src = $carpeta.'nombredelarchivobien'.image_type_to_extension($type);
        move_uploaded_file($ruta_provisional, $src);
        echo "<img src='$src'>";
    }
}
?>
