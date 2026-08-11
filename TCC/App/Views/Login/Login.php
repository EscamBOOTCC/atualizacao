<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EscamBOO - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="card shadow-sm col-md-5 mx-auto mt-5">
        <div class="card-body p-4">

            <h4 class="text-center mb-4">EscamBOO</h4>

            <?php if (!empty($erros)): ?>
                <div class="alert alert-danger">
                    <?php foreach ($erros as $erro): ?>
                        <div><?= htmlspecialchars($erro) ?></div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <ul class="nav nav-tabs nav-fill mb-4" id="tipoLoginTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button
                        class="nav-link active"
                        id="trabalhador-tab"
                        data-bs-toggle="tab"
                        data-bs-target="#trabalhador-pane"
                        type="button"
                        role="tab">
                        Sou Trabalhador
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button
                        class="nav-link"
                        id="adm-tab"
                        data-bs-toggle="tab"
                        data-bs-target="#adm-pane"
                        type="button"
                        role="tab">
                        Sou ADM
                    </button>
                </li>
            </ul>

            <div class="tab-content" id="tipoLoginTabContent">

                <div class="tab-pane fade show active" id="trabalhador-pane" role="tabpanel">
                    <form action="<?= URL_BASE ?>/login" method="post">
                        <div class="mb-3">
                            <label for="email-trabalhador" class="form-label">E-mail</label>
                            <input
                                type="email"
                                class="form-control"
                                id="email-trabalhador"
                                name="email"
                                value="<?= htmlspecialchars($email ?? '') ?>"
                                required>
                        </div>

                        <div class="mb-3">
                            <label for="senha-trabalhador" class="form-label">Senha</label>
                            <input
                                type="password"
                                class="form-control"
                                id="senha-trabalhador"
                                name="senha"
                                required>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Entrar como Trabalhador</button> 
                        <!-- guys eu real estou com preguiça de fazer o redirecionamento pra cadastrar caso não tenha logim, depois eu vejo isso hehehehehe -->
                    </form>
                </div>

                <div class="tab-pane fade" id="adm-pane" role="tabpanel">
                    <form action="<?= URL_BASE ?>/login" method="post">
                        <div class="mb-3">
                            <label for="email-adm" class="form-label">E-mail</label>
                            <input
                                type="email"
                                class="form-control"
                                id="email-adm"
                                name="email" 
                                value="<?= htmlspecialchars($email ?? '') ?>"
                                required>
                        </div>

                        <div class="mb-3">
                            <label for="senha-adm" class="form-label">Senha</label>
                            <input
                                type="password"
                                class="form-control"
                                id="senha-adm"
                                name="senha"
                                required>
                        </div>

                        <button type="submit" class="btn btn-dark w-100">Entrar como ADM</button>
                        <!-- dicutir com o grupo: eu acredito que seja melhor os ADMS virem pré definidos no banco de dados, pra qualquer um nao poder logar como adm e ter acessos
                         exclusivos do adm, enfim, teria que ver o que vocês acham -->
                    </form>
                </div>

            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>