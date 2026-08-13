<?php $titulo = 'Usuários - EscamBOO'; ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($titulo) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap basico só pra não ficar largado, maria e rafa arrumam depois -->
</head>

<body>
    <div class="container py-4">
        <h1 class="mb-4">Usuários cadastrados</h1>

        <?php if (empty($usuarios)): ?>
            <!-- Se tiver vazio aparece isso, é o que ta aparecendo até agora, inclusive  -->
            <p class="text-muted">Nenhum usuário cadastrado ainda.</p>
        <?php else: ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Tipo</th>
                        <th>Operações</th>

                        
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($usuarios as $usuario): ?>
                        <!-- foreach de listagem para mostrar a tabela -->
                        <tr>
                            <td><?= htmlspecialchars($usuario['IdUsuario']) ?></td>
                            <td><?= htmlspecialchars($usuario['Nome']) ?></td>
                            <td><?= htmlspecialchars($usuario['Email']) ?></td>
                            <td><?= htmlspecialchars($usuario['Tipo']) ?></td>
                            <td>
                                <a href="<?=  URL_BASE ?>/rota/?id=<?= $usuario['IdUsuario'] ?> ?>">Editar</a> I <a href="">Excluir</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</body>

</html>