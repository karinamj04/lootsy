<?php
session_start();
include("conexao.php");

// SE VOCÊ QUISER APENAS ADMIN VER OS LOGS, DESCOMENTE:
// if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] !== 'admin') {
//     header("Location: login.php");
//     exit();
// }

$logs = $conexao->query("
    SELECT 
        l.id_log,
        l.cpf,
        c.nome AS nome_usuario,
        l.segunda_autenticacao,
        l.status,
        l.ip,
        l.data_login
    FROM log l
    LEFT JOIN cadastro c ON c.cpf = l.cpf
    ORDER BY l.data_login DESC
");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Logs de Autenticação</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body class="bg-light">

<div class="container mt-5">
    <h2 class="mb-4">🔐 Logs de Autenticação 2FA</h2>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>CPF</th>
                <th>Nome</th>
                <th>Pergunta</th>
                <th>Status</th>
                <th>IP</th>
                <th>Data/Hora</th>
            </tr>
        </thead>

        <tbody>
            <?php while ($row = $logs->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id_log'] ?></td>
                <td><?= $row['cpf'] ?></td>
                <td><?= $row['nome_usuario'] ?? '<i>Não encontrado</i>' ?></td>
                <td><?= $row['segunda_autenticacao'] ?></td>

                <td>
                    <?php if ($row['status'] === "sucesso"): ?>
                        <span class="badge bg-success">Sucesso</span>
                    <?php else: ?>
                        <span class="badge bg-danger">Falha</span>
                    <?php endif; ?>
                </td>

                <td><?= $row['ip'] ?></td>
                <td><?= $row['data_login'] ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

</div>

</body>
</html>
