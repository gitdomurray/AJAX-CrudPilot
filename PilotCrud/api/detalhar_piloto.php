<?php

require_once(__DIR__ . "/../controller/PilotoController.php");

//
$idPiloto = 0;
if (isset($_GET['idPiloto'])) {
    $idPiloto = $_GET['idPiloto'];
}

if ($idPiloto == 0) {
 
    echo json_encode([
        'status' => 'erro',
        'mensagem' => 'ID do piloto não informado ou inválido.'
    ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    exit;
}

$pilotoCont = new PilotoController();
$piloto = $pilotoCont->buscarPorId($idPiloto);

if ($piloto) {

    echo json_encode($piloto, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
} else {
    echo json_encode([
        'status' => 'erro',
        'mensagem' => 'Piloto não encontrado.'
    ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
}

?>
