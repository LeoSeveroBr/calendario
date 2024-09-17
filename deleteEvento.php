<?php
require_once('config/conexao.php');

$id = $_REQUEST['id'];

try {
    $count = $pdo->exec("DELETE FROM eventoscalendar WHERE  id='" . $id . "'");
    /* echo "$count linhas afetadas."; */

} catch (PDOException $err) {
    echo $err->getMessage();
}