<?php
// db.php - Conexão e criação automática do banco (SQLite, não precisa instalar nada)

$dbFile = __DIR__ . '/clinica.db';
$novo = !file_exists($dbFile);

try {
    $pdo = new PDO('sqlite:' . $dbFile);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Erro ao conectar ao banco: ' . $e->getMessage());
}

if ($novo) {
    $pdo->exec("
        CREATE TABLE pacientes (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            nome TEXT NOT NULL,
            idade INTEGER,
            leito TEXT,
            gravidade TEXT NOT NULL,
            observacoes TEXT,
            criado_em TEXT DEFAULT CURRENT_TIMESTAMP,
            atualizado_em TEXT DEFAULT CURRENT_TIMESTAMP
        )
    ");
}
