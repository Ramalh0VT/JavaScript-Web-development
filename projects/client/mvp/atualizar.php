<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$id = (int)($_POST['id'] ?? 0);
$nome = trim($_POST['nome'] ?? '');
$idade = $_POST['idade'] !== '' ? (int)$_POST['idade'] : null;
$leito = trim($_POST['leito'] ?? '');
$gravidade = $_POST['gravidade'] ?? 'Moderado';
$observacoes = trim($_POST['observacoes'] ?? '');

$gravidadesValidas = ['Crítico', 'Grave', 'Moderado', 'Leve'];
if (!in_array($gravidade, $gravidadesValidas)) {
    $gravidade = 'Moderado';
}

if ($id <= 0 || $nome === '') {
    header('Location: index.php');
    exit;
}

$stmt = $pdo->prepare("UPDATE pacientes SET nome=?, idade=?, leito=?, gravidade=?, observacoes=?, atualizado_em=CURRENT_TIMESTAMP WHERE id=?");
$stmt->execute([$nome, $idade, $leito, $gravidade, $observacoes, $id]);

header('Location: index.php?msg=atualizado');
exit;
