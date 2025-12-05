<?php
require_once __DIR__ . "/controller/PilotoController.php";
$controller = new PilotoController();
$action = $_GET['action'] ?? 'index';
$id = $_GET['id'] ?? null;
switch ($action) {
    case 'index':
        $controller->index();
        break;
    case 'create':
        $controller->create();
        break;
    case 'store':
        $controller->store($_POST);
        break;
    case 'edit':
        if ($id) $controller->edit($id);
        break;
    case 'update':
        if ($id) $controller->update($id, $_POST);
        break;
    case 'delete':
        if ($id) $controller->delete($id);
        break;
    default:
        $controller->index();
}
