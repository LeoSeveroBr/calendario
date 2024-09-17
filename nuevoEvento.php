<?php
date_default_timezone_set("America/Sao_Paulo");
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
/* setlocale(LC_ALL, "es_ES"); */
//$hora = date("g:i:A");

require("config/conexao.php");
$evento = ucwords($_REQUEST['evento']);
$f_inicio = $_REQUEST['fecha_inicio'];
$fecha_inicio = date('Y-m-d', strtotime($f_inicio));

$f_fin = $_REQUEST['fecha_fin'];
$seteando_f_final = date('Y-m-d', strtotime($f_fin));
$fecha_fin1 = strtotime($seteando_f_final . "+ 1 days");
$fecha_fin = date('Y-m-d', ($fecha_fin1));
$color_evento = $_REQUEST['color_evento'];


try {

  $prepare = $conexao->prepare("INSERT INTO eventoscalendar(evento, fecha_inicio, fecha_fin, color_evento)
  VALUES (:evento, :fecha_inicio, :fecha_fin, :color_evento)");

  $count = $prepare->execute([
    'evento' => $evento,
    'fecha_inicio' => $fecha_inicio,
    'fecha_fin' => $fecha_fin,
    'color_evento' => $color_evento
  ]);
  echo "$count linhas foram inseridas.";

} catch (PDOException $err) {
  echo $err->getMessage();
}

header("Location:index.php?e=1");
