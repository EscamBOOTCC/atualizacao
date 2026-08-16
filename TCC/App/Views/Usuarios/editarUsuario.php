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
</head>

<body class="bg-light">

    <div class="container mt-5">

        <div class="card shadow-sm">

        <!-- mds oq q ta errado nessa budega -->

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

                <form action="<?= URL_BASE ?>/usuarios/atualizar" method="post">
                    <input type="hidden"
                        name="idUsuario"
                        value="<?= htmlspecialchars($usuario['IdUsuario']) ?>">

                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome</label>

                        <input type="text"
                            class="form-control"
                            id="nome"
                            name="nome"
                            value="<?= htmlspecialchars($usuario['Nome'] ?? '') ?>"
                            >
                    </div>

                    <div class="mb-3">
                        <label for="cpf" class="form-label">CPF</label>

                        <input type="text"
                            class="form-control"
                            id="cpf"
                            name="cpf"
                            maxlength="11"
                            value="<?= htmlspecialchars($usuario['CPF'] ?? '') ?>"
                            >
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>

                        <input type="email"
                            class="form-control"
                            id="email"
                            name="email"
                            value="<?= htmlspecialchars($usuario['Email'] ?? '') ?>"
                            >
                    </div>

                    <div class="mb-3">
                        <label for="genero" class="form-label">Gênero</label>

                        <select class="form-select" id="genero" name="genero">

                            <option value="">Selecione</option>

                            <option value="Masculino"
                                <?= ($usuario['Genero'] ?? '') === 'Masculino' ? 'selected' : '' ?>>
                                Masculino
                            </option>

                            <option value="Feminino"
                                <?= ($usuario['Genero'] ?? '') === 'Feminino' ? 'selected' : '' ?>>
                                Feminino
                            </option>

                            <option value="Outro"
                                <?= ($usuario['Genero'] ?? '') === 'Outro' ? 'selected' : '' ?>>
                                Outro
                            </option>

                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="dataNascimento" class="form-label">
                            Data de nascimento
                        </label>

                        <input type="date"
                            class="form-control"
                            id="dataNascimento"
                            name="dataNascimento"
                            value="<?= htmlspecialchars($usuario['DataNascimento'] ?? '') ?>">
                    </div>

                    <div class="mb-3">
                        <label for="endereco" class="form-label">
                            Endereço
                        </label>

                        <input type="text"
                            class="form-control"
                            id="endereco"
                            name="endereco"
                            value="<?= htmlspecialchars($usuario['Endereco'] ?? '') ?>">
                    </div>

                    <div class="mb-3">
                        <label for="fotoPerfil" class="form-label">
                            Foto de perfil
                        </label>

                        <input type="text"
                            class="form-control"
                            id="fotoPerfil"
                            name="fotoPerfil"
                            value="<?= htmlspecialchars($usuario['FotoPerfil'] ?? '') ?>">
                    </div>

                    <div class="d-flex gap-2">

                        <button type="submit" class="btn btn-primary">
                            Salvar alterações
                        </button>

                        <a href="<?= URL_BASE ?>/usuarios"
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