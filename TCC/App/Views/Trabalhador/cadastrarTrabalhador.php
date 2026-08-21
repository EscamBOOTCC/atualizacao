<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Trabalhador</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #5E0B15 !important;
            min-height: 100vh;
            padding-bottom: 40px;
            color: #2b2b2b;
        }

        .card {
            border: none !important;
            border-radius: 24px !important;
            background-color: #f3ede2 !important;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.25) !important;
        }

        .card-body h3 {
            color: #550a16;
            font-weight: 700;
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
            padding: 8px 24px;
            font-weight: 600;
        }

        .btn-primary:hover {
            background-color: #3f060f !important;
            border-color: #3f060f !important;
        }

        .btn-outline-secondary {
            color: #550a16 !important;
            border: 2px solid #550a16 !important;
            background-color: transparent !important;
            border-radius: 20px !important;
            padding: 6px 20px;
            font-weight: 600;
        }

        .btn-outline-secondary:hover {
            background-color: #550a16 !important;
            color: #ffffff !important;
        }
    </style>

</head>

<body>

    <div class="card shadow-sm col-md-8 mx-auto mt-4">
        <div class="card-body p-4">

            <h3 class="mb-4">Cadastrar Trabalhador</h3>

            <?php if (!empty($erros)): ?>
                <div class="alert alert-danger">
                    <?php foreach ($erros as $erro): ?>
                        <div><?= htmlspecialchars($erro) ?></div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <form action="<?= URL_BASE ?>/trabalhador/cadastrar" method="post">

                <!-- NOME -->
                <div class="mb-3">
                    <label for="nome" class="form-label">
                        Nome Completo <span class="text-danger">*</span>
                    </label>

                    <input
                        type="text"
                        class="form-control <?= isset($erros['nome']) ? 'is-iAnvalid' : '' ?>"
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
                        CPF <span class="text-danger">*</span>
                    </label>

                    <input
                        type="text"
                        class="form-control <?= isset($erros['cpf']) ? 'is-invalid' : '' ?>"
                        id="cpf"
                        name="cpf"
                        placeholder="000.000.000-00"
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
                        E-mail <span class="text-danger">*</span>
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


                <!-- DATA DE NASCIMENTO -->
                <div class="mb-3">
                    <label for="dataNascimento" class="form-label">
                        Data de Nascimento
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
                            value="M"
                            <?= (($usuario['Genero'] ?? '') === 'M') ? 'selected' : '' ?>>
                            Masculino
                        </option>

                        <option
                            value="F"
                            <?= (($usuario['Genero'] ?? '') === 'F') ? 'selected' : '' ?>>
                            Feminino
                        </option>

                        <option
                            value="O"
                            <?= (($usuario['Genero'] ?? '') === 'O') ? 'selected' : '' ?>>
                            Outro
                        </option>

                    </select>

                    <?php if (isset($erros['genero'])): ?>
                        <div class="invalid-feedback">
                            <?= htmlspecialchars($erros['genero']) ?>
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
                        Foto de Perfil (URL)
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


                <!-- SENHA -->
                <div class="mb-3">
                    <label for="senha" class="form-label">
                        Senha <span class="text-danger">*</span>
                    </label>

                    <input
                        type="password"
                        class="form-control <?= isset($erros['senha']) ? 'is-invalid' : '' ?>"
                        id="senha"
                        name="senha">

                    <?php if (isset($erros['senha'])): ?>
                        <div class="invalid-feedback">
                            <?= htmlspecialchars($erros['senha']) ?>
                        </div>
                    <?php endif; ?>
                </div>


                <!-- BOTÕES -->
                <div class="d-flex gap-2 justify-content-end">

                    <a
                        href="<?= URL_BASE ?>/usuarios"
                        class="btn btn-outline-secondary">
                        Cancelar
                    </a>

                    <button
                        type="submit"
                        class="btn btn-primary px-4">
                        Cadastrar
                    </button>

                </div>

            </form>

        </div>
    </div>

</body>

</html>