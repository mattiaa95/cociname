<?php
//Obtenemos los datos de los input
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$edad = $_POST["edad"];

//Hacemos las comprobaciones que sean necesarias... (sanitizar los textos para evitar XSS e inyecciones de código, comprobar que la edad sea un número, etc.)
//Omitido para la brevededad del código
//PERO NO OLVIDES QUE ES ALGO IMPORTANTE.

//Seteamos el header de "content-type" como "JSON" para que jQuery lo reconozca como tal
header('Content-Type: application/json');
//Guardamos los datos en un array
$datos = array(
'estado' => 'ok',
'nombre' => $nombre,
'apellido' => $apellido,
'edad' => $edad
);
//Devolvemos el array pasado a JSON como objeto
echo json_encode($datos, JSON_FORCE_OBJECT);
?>
