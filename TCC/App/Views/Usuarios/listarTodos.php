<?php $titulo = 'Usuários - EscamBOO'; ?>

<!DOCTYPE html>

<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($titulo) ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #D9CAB3;
            min-height: 100vh;
            color: #2b2b2b;
        }

        .container {
            max-width: 1100px;
        }

        .card-usuarios {
            border: none;
            border-radius: 24px;
            background-color: #f3ede2;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.25);
            overflow: hidden;
        }

        .cabecalho {
            background-color: #550a16;
            color: #ffffff;
            padding: 22px 30px;
            border-bottom: 2px solid #3f060f;
        }

        .cabecalho h1 {
            font-size: 1.6rem;
            margin: 0;
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        .conteudo {
            padding: 30px;
        }

        .table {
            margin-bottom: 0;
            vertical-align: middle;
            background-color: transparent;
        }

        .table thead th {
            background-color: #e2d7c5;
            color: #550a16;
            font-weight: 700;
            border-bottom: 2px solid #d1c1aa;
            padding: 14px;
        }

        .table tbody tr {
            transition: background-color 0.2s ease;
            border-bottom: 1px solid #e6dccb;
        }

        .table tbody tr:hover {
            background-color: #e9e0d1;
        }

        .tipo {
            display: inline-block;
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 0.82rem;
            font-weight: 700;
        }

        .tipo-trabalhador {
            background-color: #c08733;
            color: #ffffff;
        }

        .tipo-adm {
            background-color: #550a16;
            color: #ffffff;
        }

        .btn-editar {
            background-color: #550a16;
            border-color: #550a16;
            color: #ffffff;
            border-radius: 20px;
            padding: 6px 18px;
            font-weight: 600;
            transition: background-color 0.2s ease;
        }

        .btn-editar:hover {
            background-color: #3f060f;
            border-color: #3f060f;
            color: #ffffff;
        }

        .btn-excluir {
            background-color: #8b2635;
            border-color: #8b2635;
            color: #ffffff;
            border-radius: 20px;
            padding: 6px 18px;
            font-weight: 600;
            transition: background-color 0.2s ease;
        }

        .btn-excluir:hover {
            background-color: #6f1d2a;
            border-color: #6f1d2a;
            color: #ffffff;
        }

        .btn-ativar {
            background-color: #c08733;
            border-color: #c08733;
            color: #ffffff;
            border-radius: 20px;
            padding: 6px 18px;
            font-weight: 600;
            transition: background-color 0.2s ease;
        }

        .btn-ativar:hover {
            background-color: #a5712b;
            border-color: #a5712b;
            color: #ffffff;
        }

        .btn-voltar {
            border: 2px solid #f3ede2;
            color: #f3ede2;
            border-radius: 20px;
            padding: 6px 18px;
            font-weight: 600;
            transition: all 0.2s ease;
        }

        .btn-voltar:hover {
            background-color: #f3ede2;
            color: #550a16;
        }

        .vazio {
            text-align: center;
            padding: 40px 20px;
            color: #635343;
        }

        .vazio h5 {
            color: #550a16;
            font-weight: 700;
        }

        .badge.bg-success {
            background-color: #5c8a5a !important;
            border-radius: 20px;
            padding: 6px 14px;
            font-size: 0.82rem;
        }

        .badge.bg-danger {
            background-color: #8b2635 !important;
            border-radius: 20px;
            padding: 6px 14px;
            font-size: 0.82rem;
        }
    </style>


</head>

<body>
    <div class="container py-5">

        <div class="card card-usuarios">

            <!-- CABEÇALHO -->
            <div class="cabecalho d-flex justify-content-between align-items-center">

                <h1>Usuários cadastrados</h1>

                <a href="<?= URL_BASE ?>/adm"
                    class="btn btn-outline-light btn-voltar">
                    ← Voltar
                </a>

            </div>

            <!-- CONTEÚDO -->
            <div class="conteudo">

                <?php if (empty($usuarios)): ?>

                    <div class="vazio">

                        <h5>Nenhum usuário cadastrado</h5>

                        <p class="mb-0">
                            Ainda não existem usuários cadastrados no sistema.
                        </p>

                    </div>

                <?php else: ?>

                    <div class="table-responsive">

                        <table class="table table-hover">

                            <thead>

                                <tr>

                                    <th>ID</th>

                                    <th>Nome</th>

                                    <th>E-mail</th>

                                    <th>Tipo</th>

                                    <th>Status</th>

                                    <th class="text-center">
                                        Operações
                                    </th>

                                </tr>

                            </thead>

                            <tbody>

                                <?php foreach ($usuarios as $usuario): ?>

                                    <tr>

                                        <!-- ID -->
                                        <td>
                                            <?= htmlspecialchars($usuario['IdUsuario']) ?>
                                        </td>

                                        <!-- NOME -->
                                        <td>

                                            <strong>
                                                <?= htmlspecialchars($usuario['Nome']) ?>
                                            </strong>

                                        </td>

                                        <!-- EMAIL -->
                                        <td>
                                            <?= htmlspecialchars($usuario['Email']) ?>
                                        </td>

                                        <!-- TIPO -->
                                        <td>

                                            <?php if ($usuario['Tipo'] === 'Trabalhador'): ?>

                                                <span class="tipo tipo-trabalhador">
                                                    Trabalhador
                                                </span>

                                            <?php elseif ($usuario['Tipo'] === 'ADM'): ?>

                                                <span class="tipo tipo-adm">
                                                    Administrador
                                                </span>

                                            <?php else: ?>

                                                <span class="tipo">
                                                    <?= htmlspecialchars($usuario['Tipo']) ?>
                                                </span>

                                            <?php endif; ?>

                                        </td>

                                        <!-- STATUS -->
                                        <td>

                                            <?php if ($usuario['Ativo']): ?>

                                                <span class="badge bg-success">
                                                    Ativo
                                                </span>

                                            <?php else: ?>

                                                <span class="badge bg-danger">
                                                    Inativo
                                                </span>

                                            <?php endif; ?>

                                        </td>

                                        <!-- OPERAÇÕES -->
                                        <td class="text-center">

                                            <!-- EDITAR -->
                                            <a href="<?= URL_BASE ?>/usuarios/editar?idUsuario=<?= $usuario['IdUsuario'] ?>"
                                                class="btn btn-primary btn-sm btn-editar">

                                                Editar

                                            </a>


                                            <?php if ($usuario['Ativo']): ?>

                                                <!-- DESATIVAR / EXCLUIR -->
                                                <form method="POST"
                                                    action="<?= URL_BASE ?>/usuarios/alterar-status"
                                                    style="display: inline;">

                                                    <input type="hidden"
                                                        name="idUsuario"
                                                        value="<?= $usuario['IdUsuario'] ?>">

                                                    <input type="hidden"
                                                        name="ativo"
                                                        value="0">

                                                    <button type="submit"
                                                        class="btn btn-danger btn-sm btn-excluir"
                                                        onclick="return confirm('Tem certeza que deseja excluir este usuário?');">

                                                        Excluir

                                                    </button>

                                                </form>

                                            <?php else: ?>

                                                <!-- REATIVAR -->
                                                <form method="POST"
                                                    action="<?= URL_BASE ?>/usuarios/alterar-status"
                                                    style="display: inline;">

                                                    <input type="hidden"
                                                        name="idUsuario"
                                                        value="<?= $usuario['IdUsuario'] ?>">

                                                    <input type="hidden"
                                                        name="ativo"
                                                        value="1">

                                                    <button type="submit"
                                                        class="btn btn-success btn-sm btn-ativar"
                                                        onclick="return confirm('Deseja reativar este usuário?');">

                                                        Ativar

                                                    </button>

                                                </form>

                                            <?php endif; ?>

                                        </td>

                                    </tr>

                                <?php endforeach; ?>

                            </tbody>

                        </table>

                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>

</html>