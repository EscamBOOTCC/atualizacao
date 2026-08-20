<?php $titulo = 'Usuários - EscamBOO'; ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= htmlspecialchars($titulo) ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f4f6f9;
            min-height: 100vh;
        }

        .container {
            max-width: 1100px;
        }

        .card-usuarios {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }

        .cabecalho {
            background-color: #212529;
            color: white;
            padding: 20px 25px;
        }

        .cabecalho h1 {
            font-size: 1.6rem;
            margin: 0;
            font-weight: 600;
        }

        .conteudo {
            padding: 25px;
        }

        .table {
            margin-bottom: 0;
            vertical-align: middle;
        }

        .table thead th {
            background-color: #f8f9fa;
            color: #495057;
            font-weight: 600;
            border-bottom: 2px solid #dee2e6;
        }

        .table tbody tr {
            transition: background-color 0.2s;
        }

        .table tbody tr:hover {
            background-color: #f8f9fa;
        }

        .tipo {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .tipo-trabalhador {
            background-color: #e7f1ff;
            color: #0d6efd;
        }

        .tipo-adm {
            background-color: #e8f5e9;
            color: #198754;
        }

        .btn-editar {
            border-radius: 7px;
        }

        .btn-voltar {
            border-radius: 7px;
        }

        .vazio {
            text-align: center;
            padding: 40px 20px;
            color: #6c757d;
        }
    </style>
</head>

<body>

    <div class="container py-5">

        <div class="card card-usuarios">

            <div class="cabecalho d-flex justify-content-between align-items-center">
                <h1>Usuários cadastrados</h1>

                <a href="<?= URL_BASE ?>/adm"
                    class="btn btn-outline-light btn-voltar">
                    ← Voltar
                </a>
            </div>

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
                                    <th class="text-center">Operações</th>
                                </tr>
                            </thead>

                            <tbody>

                                <?php foreach ($usuarios as $usuario): ?>

                                    <tr>

                                        <td>
                                            <?= htmlspecialchars($usuario['IdUsuario']) ?>
                                        </td>

                                        <td>
                                            <strong>
                                                <?= htmlspecialchars($usuario['Nome']) ?>
                                            </strong>
                                        </td>

                                        <td>
                                            <?= htmlspecialchars($usuario['Email']) ?>
                                        </td>

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

                                        <td class="text-center">

                                            <a href="<?= URL_BASE ?>/usuarios/editar?idUsuario=<?= $usuario['IdUsuario'] ?>"
                                                class="btn btn-primary btn-sm btn-editar">
                                                Editar
                                            </a>

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