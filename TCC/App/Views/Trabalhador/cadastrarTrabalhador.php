<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Trabalhador</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="card shadow-sm col-md-8 mx-auto mt-4">
        <div class="card-body p-4">

            <h3 class="mb-4">Cadastrar Trabalhador</h3>

            <form action="<?= URL_BASE ?>/usuarios/salvarTrabalhador" method="post">

                <!-- NOME -->
                <div class="mb-3">
                    <label for="nome" class="form-label">
                        Nome Completo <span class="text-danger">*</span>
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
                        CPF <span class="text-danger">*</span>
                    </label>

                    <input
                        type="text"
                        class="form-control <?= isset($erros['cpf']) ? 'is-invalid' : '' ?>"
                        id="cpf"
                        name="cpf"
                        placeholder="000.000.000-00"
                        maxlength="14"
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
                        class="form-control"
                        id="dataNascimento"
                        name="dataNascimento"
                        value="<?= htmlspecialchars($usuario['DataNascimento'] ?? '') ?>">
                </div>


                <!-- GENERO -->
                <div class="mb-3">
                    <label for="genero" class="form-label">
                        Gênero
                    </label>

                    <select
                        class="form-select"
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
                </div>


                <!-- ENDEREÇO -->
                <div class="mb-3">
                    <label for="endereco" class="form-label">
                        Endereço
                    </label>

                    <input
                        type="text"
                        class="form-control"
                        id="endereco"
                        name="endereco"
                        value="<?= htmlspecialchars($usuario['Endereco'] ?? '') ?>">
                </div>


                <!-- FOTO DE PERFIL -->
                <div class="mb-3">
                    <label for="fotoPerfil" class="form-label">
                        Foto de Perfil (URL)
                    </label>

                    <input
                        type="url"
                        class="form-control"
                        id="fotoPerfil"
                        name="fotoPerfil"
                        value="<?= htmlspecialchars($usuario['FotoPerfil'] ?? '') ?>">
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