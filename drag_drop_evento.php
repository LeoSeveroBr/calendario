<?php
date_default_timezone_set("America/Sao_Paulo");
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');

include('config/conexao.php');

$idEvento = $_POST['idEvento'];
$start = $_REQUEST['start'];
$fecha_inicio = date('Y-m-d', strtotime($start));
$end = $_REQUEST['end'];
$fecha_fin = date('Y-m-d', strtotime($end));


try {

    $prepare = $conexao->prepare("UPDATE eventoscalendar SET (:fecha_inicio, :fecha_fin) WHERE id='" . $idEvento . "' ");

    $count = $prepare->execute([
        'fecha_inicio' => $fecha_inicio,
        'fecha_fin' => $fecha_fin
    ]);
    echo "$count linhas foram inseridas.";

} catch (PDOException $err) {
    echo $err->getMessage();
}



