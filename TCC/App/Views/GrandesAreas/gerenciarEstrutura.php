<?php $titulo = 'Grandes Áreas - EscamBOO'; ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= htmlspecialchars($titulo) ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap"
        rel="stylesheet">

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

        /* Card principal */

        .card-areas {
            border: none;
            border-radius: 24px;
            background-color: #f3ede2;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.25);
            overflow: hidden;
        }

        /* Cabeçalho */

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

        /* Conteúdo */

        .conteudo {
            padding: 30px;
        }

        /* Área de cadastro */

        .formulario-cadastro {
            background-color: #e2d7c5;
            border-radius: 18px;
            padding: 22px;
            margin-bottom: 30px;
        }

        .formulario-cadastro h4 {
            color: #550a16;
            font-weight: 700;
            margin-bottom: 18px;
        }

        .form-control {
            border: 1px solid #d1c1aa;
            border-radius: 12px;
            padding: 10px 14px;
        }

        .form-control:focus {
            border-color: #550a16;
            box-shadow: 0 0 0 0.2rem rgba(85, 10, 22, 0.15);
        }

        /* Tabela */

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

        .table td {
            padding: 14px;
        }

        /* Botões */

        .btn-principal {
            background-color: #550a16;
            border-color: #550a16;
            color: #ffffff;
            border-radius: 20px;
            padding: 7px 18px;
            font-weight: 600;
            transition: background-color 0.2s ease;
        }

        .btn-principal:hover {
            background-color: #3f060f;
            border-color: #3f060f;
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
            background-color: #c08733;
            border-color: #c08733;
            color: #ffffff;
            border-radius: 20px;
            padding: 6px 18px;
            font-weight: 600;
            transition: background-color 0.2s ease;
        }

        .btn-excluir:hover {
            background-color: #a66f25;
            border-color: #a66f25;
            color: #ffffff;
        }

        .btn-cancelar {
            background-color: #6c6258;
            border-color: #6c6258;
            color: #ffffff;
            border-radius: 20px;
            padding: 6px 18px;
            font-weight: 600;
        }

        .btn-cancelar:hover {
            background-color: #554d46;
            border-color: #554d46;
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

        /* Mensagens */

        .alert {
            border-radius: 15px;
            border: none;
        }

        /* Estado vazio */

        .vazio {
            text-align: center;
            padding: 40px 20px;
            color: #635343;
        }

        .vazio h5 {
            color: #550a16;
            font-weight: 700;
        }
    </style>
</head>

<body>

    <div class="container py-5">

        <div class="card card-areas">

            <!-- Cabeçalho -->

            <div class="cabecalho d-flex justify-content-between align-items-center">

                <h1>Grandes Áreas</h1>

                <a href="<?= URL_BASE ?>/adm"
                    class="btn btn-outline-light btn-voltar">
                    ← Voltar
                </a>

            </div>


            <div class="conteudo">

                <!-- Mensagens -->

                <?php if (!empty($erros)): ?>

                    <div class="alert alert-danger">

                        <?php foreach ($erros as $erro): ?>

                            <div>
                                <?= htmlspecialchars($erro) ?>
                            </div>

                        <?php endforeach; ?>

                    </div>

                <?php endif; ?>


                <!-- Cadastro -->

                <div class="formulario-cadastro">

                    <h4>Nova Grande Área</h4>

                    <form
                        method="POST"
                        action="<?= URL_BASE ?>/grandes-areas/salvar">

                        <div class="row align-items-end">

                            <div class="col-md-9">

                                <label
                                    for="nome"
                                    class="form-label fw-semibold">
                                    Nome
                                </label>

                                <input
                                    type="text"
                                    id="nome"
                                    name="nome"
                                    class="form-control"
                                    maxlength="255"
                                    placeholder="Digite o nome da grande área"
                                    value="<?= htmlspecialchars($nome ?? '') ?>">

                            </div>

                            <div class="col-md-3 mt-3 mt-md-0">

                                <button
                                    type="submit"
                                    class="btn btn-principal w-100">
                                    Cadastrar
                                </button>

                            </div>

                        </div>

                    </form>

                </div>


                <!-- Lista -->

                <?php if (empty($grandesAreas)): ?>

                    <div class="vazio">

                        <h5>Nenhuma grande área cadastrada</h5>

                        <p class="mb-0">
                            Ainda não existem grandes áreas cadastradas no sistema.
                        </p>

                    </div>

                <?php else: ?>

                    <div class="table-responsive">

                        <table class="table table-hover">

                            <thead>

                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th class="text-center">
                                        Operações
                                    </th>
                                </tr>

                            </thead>

                            <tbody>

                                <?php foreach ($grandesAreas as $grandeArea): ?>

                                    <tr>

                                        <td>
                                            <?= htmlspecialchars($grandeArea['IdGrandeArea']) ?>
                                        </td>

                                        <td>

                                            <?php if (
                                                isset($idEdicao) &&
                                                (int) $idEdicao === (int) $grandeArea['IdGrandeArea']
                                            ): ?>

                                                <!-- EDIÇÃO -->

                                                <form
                                                    method="POST"
                                                    action="<?= URL_BASE ?>/grandes-areas/atualizar"
                                                    class="d-flex gap-2">

                                                    <input
                                                        type="hidden"
                                                        name="idGrandeArea"
                                                        value="<?= $grandeArea['IdGrandeArea'] ?>">

                                                    <input
                                                        type="text"
                                                        name="nome"
                                                        class="form-control"
                                                        maxlength="255"
                                                        value="<?= htmlspecialchars($nomeEdicao ?? $grandeArea['Nome']) ?>"
                                                        required>

                                                    <button
                                                        type="submit"
                                                        class="btn btn-editar">
                                                        Salvar
                                                    </button>

                                                    <a
                                                        href="<?= URL_BASE ?>/grandes-areas"
                                                        class="btn btn-cancelar">
                                                        Cancelar
                                                    </a>

                                                </form>

                                            <?php else: ?>

                                                <strong>
                                                    <?= htmlspecialchars($grandeArea['Nome']) ?>
                                                </strong>

                                            <?php endif; ?>

                                        </td>


                                        <td class="text-center">

                                            <?php if (
                                                !isset($idEdicao) ||
                                                (int) $idEdicao !== (int) $grandeArea['IdGrandeArea']
                                            ): ?>

                                                <!-- Editar -->

                                                <a
                                                    href="<?= URL_BASE ?>/grandes-areas?id=<?= $grandeArea['IdGrandeArea'] ?>"
                                                    class="btn btn-editar">
                                                    Editar
                                                </a>


                                                <!-- Excluir -->

                                                <form
                                                    method="POST"
                                                    action="<?= URL_BASE ?>/grandes-areas/excluir"
                                                    class="d-inline"
                                                    onsubmit="return confirm(
                                            'Tem certeza que deseja excluir esta grande área?'
                                        );">

                                                    <input
                                                        type="hidden"
                                                        name="idGrandeArea"
                                                        value="<?= $grandeArea['IdGrandeArea'] ?>">

                                                    <button
                                                        type="submit"
                                                        class="btn btn-excluir">
                                                        Excluir
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