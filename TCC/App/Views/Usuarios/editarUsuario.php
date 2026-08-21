<?php
$usuario = $usuario ?? [];
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Editar Usuário</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #615243 !important;
            min-height: 100vh;
            color: #2b2b2b;
        }

        .card {
            border: none !important;
            border-radius: 24px !important;
            background-color: #f3ede2 !important;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.25) !important;
            overflow: hidden;
        }

        .card-header {
            background-color: #550a16 !important;
            color: #ffffff !important;
            padding: 20px 25px !important;
            border-bottom: 2px solid #3f060f !important;
        }

        .card-header h4 {
            font-weight: 700;
            color: #ffffff;
        }

        .card-body {
            padding: 30px !important;
        }

        .form-label {
            color: #550a16;
            font-weight: 600;
        }

        .form-control,
        .form-select {
            border-radius: 12px;
            border: 1px solid #d1c1aa;
            background-color: #ffffff;
            padding: 10px 14px;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #550a16;
            box-shadow: 0 0 0 0.25rem rgba(85, 10, 22, 0.25);
        }

        .btn-primary {
            background-color: #550a16 !important;
            border-color: #550a16 !important;
            color: #ffffff !important;
            border-radius: 20px !important;
            padding: 8px 22px;
            font-weight: 600;
        }

        .btn-primary:hover {
            background-color: #3f060f !important;
            border-color: #3f060f !important;
        }

        .btn-secondary {
            background-color: #c08733 !important;
            border-color: #c08733 !important;
            color: #ffffff !important;
            border-radius: 20px !important;
            padding: 8px 22px;
            font-weight: 600;
        }

        .btn-secondary:hover {
            background-color: #a37025 !important;
            border-color: #a37025 !important;
        }
    </style>

</head>

<body class="bg-light">

    <div class="container mt-5">

        <div class="card shadow-sm">

            <div class="card-header">

                <?php if (!empty($erros)): ?>
                    <div class="alert alert-danger">
                        <?php foreach ($erros as $erro): ?>
                            <div><?= htmlspecialchars($erro) ?></div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <h4 class="mb-0">
                    Editar Usuário
                </h4>

            </div>

            <div class="card-body">

                <form action="<?= URL_BASE ?>/usuarios/editar" method="post">

                    <input
                        type="hidden"
                        name="idUsuario"
                        value="<?= htmlspecialchars($usuario['IdUsuario'] ?? '') ?>">


                    <!-- NOME -->
                    <div class="mb-3">
                        <label for="nome" class="form-label">
                            Nome
                        </label>

                        <input
                            type="text"
                            class="form-control <?= isset($erros['nome']) ? 'is-invalid' : '' ?>"
                            id="nome"
                            name="nome"
                            value="<?= htmlspecialchars($usuario['Nome'] ?? '') ?>">

                        <?php if (isset($erros['nome'])): ?>
                            <div class="invalid-feedback">
                                <?= htmlspecialchars($erros['nome']) ?>
                            </div>
                        <?php endif; ?>
                    </div>


                    <!-- CPF -->
                    <div class="mb-3">
                        <label for="cpf" class="form-label">
                            CPF
                        </label>

                        <input
                            type="text"
                            class="form-control <?= isset($erros['cpf']) ? 'is-invalid' : '' ?>"
                            id="cpf"
                            name="cpf"
                            maxlength="11"
                            value="<?= htmlspecialchars($usuario['CPF'] ?? '') ?>">

                        <?php if (isset($erros['cpf'])): ?>
                            <div class="invalid-feedback">
                                <?= htmlspecialchars($erros['cpf']) ?>
                            </div>
                        <?php endif; ?>
                    </div>


                    <!-- EMAIL -->
                    <div class="mb-3">
                        <label for="email" class="form-label">
                            E-mail
                        </label>

                        <input
                            type="email"
                            class="form-control <?= isset($erros['email']) ? 'is-invalid' : '' ?>"
                            id="email"
                            name="email"
                            value="<?= htmlspecialchars($usuario['Email'] ?? '') ?>">

                        <?php if (isset($erros['email'])): ?>
                            <div class="invalid-feedback">
                                <?= htmlspecialchars($erros['email']) ?>
                            </div>
                        <?php endif; ?>
                    </div>


                    <!-- GENERO -->
                    <div class="mb-3">
                        <label for="genero" class="form-label">
                            Gênero
                        </label>

                        <select
                            class="form-select <?= isset($erros['genero']) ? 'is-invalid' : '' ?>"
                            id="genero"
                            name="genero">

                            <option value="">Selecione</option>

                            <option
                                value="Masculino"
                                <?= ($usuario['Genero'] ?? '') === 'Masculino' ? 'selected' : '' ?>>
                                Masculino
                            </option>

                            <option
                                value="Feminino"
                                <?= ($usuario['Genero'] ?? '') === 'Feminino' ? 'selected' : '' ?>>
                                Feminino
                            </option>

                            <option
                                value="Outro"
                                <?= ($usuario['Genero'] ?? '') === 'Outro' ? 'selected' : '' ?>>
                                Outro
                            </option>

                        </select>

                        <?php if (isset($erros['genero'])): ?>
                            <div class="invalid-feedback">
                                <?= htmlspecialchars($erros['genero']) ?>
                            </div>
                        <?php endif; ?>
                    </div>


                    <!-- DATA DE NASCIMENTO -->
                    <div class="mb-3">
                        <label for="dataNascimento" class="form-label">
                            Data de nascimento
                        </label>

                        <input
                            type="date"
                            class="form-control <?= isset($erros['dataNascimento']) ? 'is-invalid' : '' ?>"
                            id="dataNascimento"
                            name="dataNascimento"
                            value="<?= htmlspecialchars($usuario['DataNascimento'] ?? '') ?>">

                        <?php if (isset($erros['dataNascimento'])): ?>
                            <div class="invalid-feedback">
                                <?= htmlspecialchars($erros['dataNascimento']) ?>
                            </div>
                        <?php endif; ?>
                    </div>


                    <!-- ENDEREÇO -->
                    <div class="mb-3">
                        <label for="endereco" class="form-label">
                            Endereço
                        </label>

                        <input
                            type="text"
                            class="form-control <?= isset($erros['endereco']) ? 'is-invalid' : '' ?>"
                            id="endereco"
                            name="endereco"
                            value="<?= htmlspecialchars($usuario['Endereco'] ?? '') ?>">

                        <?php if (isset($erros['endereco'])): ?>
                            <div class="invalid-feedback">
                                <?= htmlspecialchars($erros['endereco']) ?>
                            </div>
                        <?php endif; ?>
                    </div>


                    <!-- FOTO DE PERFIL -->
                    <div class="mb-3">
                        <label for="fotoPerfil" class="form-label">
                            Foto de perfil
                        </label>

                        <input
                            type="url"
                            class="form-control <?= isset($erros['fotoPerfil']) ? 'is-invalid' : '' ?>"
                            id="fotoPerfil"
                            name="fotoPerfil"
                            value="<?= htmlspecialchars($usuario['FotoPerfil'] ?? '') ?>">

                        <?php if (isset($erros['fotoPerfil'])): ?>
                            <div class="invalid-feedback">
                                <?= htmlspecialchars($erros['fotoPerfil']) ?>
                            </div>
                        <?php endif; ?>
                    </div>


                    <!-- BOTÕES -->
                    <div class="d-flex gap-2">

                        <button type="submit" class="btn btn-primary">
                            Salvar alterações
                        </button>

                        <a
                            href="<?= URL_BASE ?>/usuarios"
                            class="btn btn-secondary">
                            Cancelar
                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>

</body>

</html>