<?php
require_once __DIR__ . "/../controller/PilotoController.php";

if (!isset($_GET['categoria_id'])) {
    echo json_encode([]);
    exit;
}

$categoria_id = intval($_GET['categoria_id']);

$pilotoCont = new PilotoController();
$equipes = $pilotoCont->listarEquipesPorCategoria($categoria_id);

echo json_encode($equipes, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
