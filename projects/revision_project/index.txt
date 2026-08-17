<?php
require_once 'conexao.php';

$idUsuario = 1;

try {
    $sqlPessoa = "SELECT * FROM dados_pessoais WHERE id = :id LIMIT 1";
    $stmtPessoa = $pdo->prepare($sqlPessoa);
    $stmtPessoa->execute(['id' => $idUsuario]);
    $pessoa = $stmtPessoa->fetch();

    if (!$pessoa) {
        die("Nenhum registro de currículo encontrado.");
    }

    $sqlContatos = "SELECT tipo, valor FROM contatos WHERE dados_pessoais_id = :id";
    $stmtContatos = $pdo->prepare($sqlContatos);
    $stmtContatos->execute(['id' => $idUsuario]);
    $contatos = $stmtContatos->fetchAll();

    $sqlExp = "SELECT empresa, funcao, periodo, descricao FROM experiencias WHERE dados_pessoais_id = :id ORDER BY id DESC";
    $stmtExp = $pdo->prepare($sqlExp);
    $stmtExp->execute(['id' => $idUsuario]);
    $experiencias = $stmtExp->fetchAll();

    $sqlForm = "SELECT instituicao, curso, periodo FROM formacao WHERE dados_pessoais_id = :id ORDER BY id DESC";
    $stmtForm = $pdo->prepare($sqlForm);
    $stmtForm->execute(['id' => $idUsuario]);
    $formacoes = $stmtForm->fetchAll();

} catch (PDOException $e) {
    die("Erro ao consultar os dados: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currículo Digital - <?= htmlspecialchars($pessoa['nome']) ?></title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>

    <main class="curriculo-container">
        
        <header class="topo-curriculo">
            <h1><?= htmlspecialchars($pessoa['nome']) ?></h1>
            <p class="subtitulo"><?= htmlspecialchars($pessoa['cargo']) ?></p>
        </header>

        <section class="bloco-info">
            <h2>Resumo Profissional</h2>
            <p><?= nl2br(htmlspecialchars($pessoa['resumo'])) ?></p>
        </section>

        <section class="bloco-info">
            <h2>Canais de Contato</h2>
            <ul class="grade-contatos">
                <?php foreach ($contatos as $c): ?>
                    <li>
                        <strong><?= htmlspecialchars($c['tipo']) ?>:</strong> 
                        <span><?= htmlspecialchars($c['valor']) ?></span>
                    </li>
                <?php endforeach; ?>
            </ul>
        </section>

        <section class="bloco-info">
            <h2>Experiência Profissional</h2>
            <?php if (empty($experiencias)): ?>
                <p>Nenhuma experiência cadastrada.</p>
            <?php else: ?>
                <?php foreach ($experiencias as $exp): ?>
                    <article class="item-lista">
                        <div class="linha-titulo">
                            <h3><?= htmlspecialchars($exp['funcao']) ?> — <span class="destaque-empresa"><?= htmlspecialchars($exp['empresa']) ?></span></h3>
                            <span class="tag-periodo"><?= htmlspecialchars($exp['periodo']) ?></span>
                        </div>
                        <?php if (!empty($exp['descricao'])): ?>
                            <p class="descricao-item"><?= htmlspecialchars($exp['descricao']) ?></p>
                        <?php endif; ?>
                    </article>
                <?php endforeach; ?>
            <?php endif; ?>
        </section>

        <section class="bloco-info">
            <h2>Formação Acadêmica</h2>
            <?php if (empty($formacoes)): ?>
                <p>Nenhuma formação registrada.</p>
            <?php else: ?>
                <?php foreach ($formacoes as $f): ?>
                    <article class="item-lista">
                        <div class="linha-titulo">
                            <h3><?= htmlspecialchars($f['curso']) ?></h3>
                            <span class="tag-periodo"><?= htmlspecialchars($f['periodo']) ?></span>
                        </div>
                        <p class="nome-instituicao"><?= htmlspecialchars($f['instituicao']) ?></p>
                    </article>
                <?php endforeach; ?>
            <?php endif; ?>
        </section>

    </main>

</body>
</html>
