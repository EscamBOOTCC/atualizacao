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

            <div class="card-header">
                <h4 class="mb-0">Editar Usuário</h4>
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
                            required>
                    </div>

                    <div class="mb-3">
                        <label for="cpf" class="form-label">CPF</label>

                        <input type="text"
                            class="form-control"
                            id="cpf"
                            name="cpf"
                            value="<?= htmlspecialchars($usuario['CPF'] ?? '') ?>"
                            required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>

                        <input type="email"
                            class="form-control"
                            id="email"
                            name="email"
                            value="<?= htmlspecialchars($usuario['Email'] ?? '') ?>"
                            required>
                    </div>

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