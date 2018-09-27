  <?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
  include "conectar.php";
  $render = "";
  $con = new Conectar;
  $sql = "SELECT * FROM formulario";
  $result = $con->consultaRetorno($sql);
  $html = file_get_contents('plantilles/table.html');
  $regex = "/<!--FILAS-->(.|\n){1,}<!--FILAS-->/";
  preg_match($regex, $html, $matches);
  $match = $matches[0];
  for($i = 0; $i < count($result); $i++){
    extract($result[$i]);
    $diccionary = array('{ID}'=>$id,
                        '{NOMBRE}'=>$nombre,
                        '{CORREO}'=>$correo,
                        '{CELULAR}'=>$celular,
                        '{HORARIO}'=>$horario,
                        '{SUCURSAL}'=>$sucursal,
                        '{CODIGO}'=>$codigo,
                        '{FECHA}'=>$reg_date,
                      );
    $render .= str_replace(array_keys($diccionary), array_values($diccionary), $match);
  }
  $render_final = str_replace($match, $render, $html);
  echo $render_final;
  ?>
