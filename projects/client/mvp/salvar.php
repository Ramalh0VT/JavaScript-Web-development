<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$nome = trim($_POST['nome'] ?? '');
$idade = $_POST['idade'] !== '' ? (int)$_POST['idade'] : null;
$leito = trim($_POST['leito'] ?? '');
$gravidade = $_POST['gravidade'] ?? 'Moderado';
$observacoes = trim($_POST['observacoes'] ?? '');

$gravidadesValidas = ['Crítico', 'Grave', 'Moderado', 'Leve'];
if (!in_array($gravidade, $gravidadesValidas)) {
    $gravidade = 'Moderado';
}

if ($nome === '') {
    header('Location: index.php');
    exit;
}

$stmt = $pdo->prepare("INSERT INTO pacientes (nome, idade, leito, gravidade, observacoes) VALUES (?, ?, ?, ?, ?)");
$stmt->execute([$nome, $idade, $leito, $gravidade, $observacoes]);

header('Location: index.php?msg=criado');
exit;
