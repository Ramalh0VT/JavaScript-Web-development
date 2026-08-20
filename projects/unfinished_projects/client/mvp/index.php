<?php
require 'db.php';

// Ordem de prioridade para ordenação (mais grave primeiro)
$ordemGravidade = ['Crítico' => 1, 'Grave' => 2, 'Moderado' => 3, 'Leve' => 4];

$filtro = $_GET['gravidade'] ?? '';

if ($filtro && in_array($filtro, array_keys($ordemGravidade))) {
    $stmt = $pdo->prepare("SELECT * FROM pacientes WHERE gravidade = ?");
    $stmt->execute([$filtro]);
} else {
    $stmt = $pdo->query("SELECT * FROM pacientes");
}

$pacientes = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Ordena por gravidade (mais grave primeiro)
usort($pacientes, function ($a, $b) use ($ordemGravidade) {
    return $ordemGravidade[$a['gravidade']] <=> $ordemGravidade[$b['gravidade']];
});

function classeTag($gravidade) {
    switch ($gravidade) {
        case 'Crítico': return 'tag-critico';
        case 'Grave': return 'tag-grave';
        case 'Moderado': return 'tag-moderado';
        case 'Leve': return 'tag-leve';
        default: return '';
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Gestão de Gravidade de Pacientes</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h1>🏥 Gestão de Gravidade de Pacientes</h1>
</header>

<div class="container">

    <?php if (isset($_GET['msg'])): ?>
        <div class="msg msg-sucesso">
            <?php
            $mensagens = [
                'criado' => 'Paciente cadastrado com sucesso.',
                'atualizado' => 'Dados do paciente atualizados.',
                'excluido' => 'Paciente removido da lista.',
            ];
            echo htmlspecialchars($mensagens[$_GET['msg']] ?? '');
            ?>
        </div>
    <?php endif; ?>

    <div class="card">
        <h2>Cadastrar novo paciente</h2>
        <form action="salvar.php" method="post">
            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome" required>

            <label for="idade">Idade</label>
            <input type="number" id="idade" name="idade" min="0" max="130">

            <label for="leito">Leito / Local</label>
            <input type="text" id="leito" name="leito" placeholder="Ex: Leito 12, Sala de Espera">

            <label for="gravidade">Gravidade</label>
            <select id="gravidade" name="gravidade" required>
                <option value="Crítico">Crítico</option>
                <option value="Grave">Grave</option>
                <option value="Moderado" selected>Moderado</option>
                <option value="Leve">Leve</option>
            </select>

            <label for="observacoes">Observações</label>
            <textarea id="observacoes" name="observacoes" placeholder="Sintomas, histórico, etc."></textarea>

            <button type="submit">Cadastrar paciente</button>
        </form>
    </div>

    <div class="card">
        <h2>Pacientes cadastrados</h2>

        <div class="filtros">
            <a href="index.php" class="<?= $filtro === '' ? 'ativo' : '' ?>">Todos</a>
            <?php foreach (array_keys($ordemGravidade) as $g): ?>
                <a href="index.php?gravidade=<?= urlencode($g) ?>" class="<?= $filtro === $g ? 'ativo' : '' ?>"><?= htmlspecialchars($g) ?></a>
            <?php endforeach; ?>
        </div>

        <?php if (count($pacientes) === 0): ?>
            <div class="vazio">Nenhum paciente cadastrado ainda.</div>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Idade</th>
                        <th>Leito</th>
                        <th>Gravidade</th>
                        <th>Atualizado em</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pacientes as $p): ?>
                        <tr>
                            <td><?= htmlspecialchars($p['nome']) ?></td>
                            <td><?= htmlspecialchars($p['idade'] ?: '-') ?></td>
                            <td><?= htmlspecialchars($p['leito'] ?: '-') ?></td>
                            <td><span class="tag <?= classeTag($p['gravidade']) ?>"><?= htmlspecialchars($p['gravidade']) ?></span></td>
                            <td><?= htmlspecialchars($p['atualizado_em']) ?></td>
                            <td class="acoes">
                                <a href="editar.php?id=<?= $p['id'] ?>">Editar</a>
                                <a href="excluir.php?id=<?= $p['id'] ?>" onclick="return confirm('Tem certeza que deseja excluir este paciente?')">Excluir</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>

</div>

</body>
</html>
