<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include('./app/services/cestaService.php');
    session_start();

    $json = file_get_contents('php://input');
    $data = json_decode($json, true);
    $produtosIds = $data['ids'];

    $userId = $_SESSION['id'];
    $cestaService = new CestaService();

    for ($i = 0; $i < count($produtosIds); $i++) {
        $cestaService->create($_SESSION['id'], $produtosIds[$i]);
    }

    echo json_encode(1);
}
