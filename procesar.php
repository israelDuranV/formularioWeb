<?php
const PRODUCCION = True;
if(!PRODUCCION) {
  ini_set('error_reporting', E_ALL | E_NOTICE | E_STRICT);
  ini_set('display_errors', '1');
} else {
  ini_set('display_errors', '0');
}
$uri_donde_muestras_tu_form = 'http://localhost/ejercicio/index.html';
if(isset($_SERVER['HTTP_REFERER'])) {
    if($_SERVER['HTTP_REFERER'] != $uri_donde_muestras_tu_form) {
      list($nombre, $email, $celular, $horario, $sucursales, $codigo) = array_fill(0, 6, "");
      list($aleatorio, $num_aleatorio) = array_fill(0, 2, 0);
      include "conectar.php";
          $codigos = array(
              'Polanco' => array("DT0001p", "DT0002p", "DT0003p"),
              'La Condesa'=> array("DT0001c"),
              'La Roma'=>array("DT0001r","DT0002r"),
          );
          extract($_POST);
          $nombre = strip_tags($nombre);
          $nombre = htmlentities($nombre);

          $email = strip_tags($email);
          $email = htmlentities($email);

          $celular = strip_tags($celular);
          $celular = htmlentities($celular);

          $horario = strip_tags($horario);
          $horario = htmlentities($horario);

          $sucursales = strip_tags($sucursales);
          $sucursales = htmlentities($sucursales);

          if($sucursales == "condesa"){
            $sucursal = 'La Condesa';
            $aleatorio = 0;
          }
          if($sucursales == "polanco"){
            $aleatorio = 2;
            $sucursal = 'Polanco';
          }
          if($sucursales == "roma"){
            $aleatorio = 1;
            $sucursal = 'La Roma';
          }
          if(($sucursales == 'polanco') OR ($sucursales == 'roma')){
            $num_aleatorio = mt_rand(0,$aleatorio);
          }

          $codigo = $codigos[$sucursal][$num_aleatorio];
           $sql = 'INSERT INTO formulario (nombre,correo,celular,horario,sucursal,codigo)
          VALUES ("'.$nombre.'","'.$email.'","'.$celular.'","'.$horario.'","'.$sucursales.'","'.$codigo.'")';
           $con = new Conectar();
           if($con->consultaSimple($sql)){
             echo "Formulario envíado correctamente";
           }else{
             echo "Ha ocurrido un error";
           }
    }
}
 ?>
