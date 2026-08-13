<?php
require 'db.php';

$id = (int)($_GET['id'] ?? 0);

$stmt = $pdo->prepare("SELECT * FROM pacientes WHERE id = ?");
$stmt->execute([$id]);
$paciente = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$paciente) {
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Paciente</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h1>🏥 Gestão de Gravidade de Pacientes</h1>
</header>

<div class="container">
    <div class="card">
        <h2>Editar paciente</h2>
        <form action="atualizar.php" method="post">
            <input type="hidden" name="id" value="<?= $paciente['id'] ?>">

            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome" value="<?= htmlspecialchars($paciente['nome']) ?>" required>

            <label for="idade">Idade</label>
            <input type="number" id="idade" name="idade" min="0" max="130" value="<?= htmlspecialchars($paciente['idade']) ?>">

            <label for="leito">Leito / Local</label>
            <input type="text" id="leito" name="leito" value="<?= htmlspecialchars($paciente['leito']) ?>">

            <label for="gravidade">Gravidade</label>
            <select id="gravidade" name="gravidade" required>
                <?php foreach (['Crítico', 'Grave', 'Moderado', 'Leve'] as $g): ?>
                    <option value="<?= $g ?>" <?= $paciente['gravidade'] === $g ? 'selected' : '' ?>><?= $g ?></option>
                <?php endforeach; ?>
            </select>

            <label for="observacoes">Observações</label>
            <textarea id="observacoes" name="observacoes"><?= htmlspecialchars($paciente['observacoes']) ?></textarea>

            <button type="submit">Salvar alterações</button>
            <a href="index.php" class="btn btn-secundario">Cancelar</a>
        </form>
    </div>
</div>

</body>
</html>
