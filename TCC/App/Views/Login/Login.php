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
<!-- erros comuns -->
            <?php if (!empty($erros)): ?>
                <div class="alert alert-danger">
                    <?php foreach ($erros as $erro): ?>
                        <div><?= htmlspecialchars($erro) ?></div>  
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
<!-- erros de session -->
            <?php if (isset($_SESSION['erro'])): ?>
                <div class="alert alert-danger">
                    <?= htmlspecialchars($_SESSION['erro']) ?>
                </div>

                <?php unset($_SESSION['erro']); ?>
            <?php endif; ?>

            <form action="<?= URL_BASE ?>/login" method="post">

                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>

                    <input
                        type="email"
                        class="form-control"
                        id="email"
                        name="email"
                        value="<?= htmlspecialchars($email ?? '') ?>"
                        required>
                </div>

                <div class="mb-3">
                    <label for="senha" class="form-label">Senha</label>

                    <input
                        type="password"
                        class="form-control"
                        id="senha"
                        name="senha"
                        required>
                </div>

                <button type="submit" class="btn btn-primary w-100">
                    Entrar
                </button>

            </form>

            <div class="text-center mt-3">
                <span class="text-muted">Ainda não tem uma conta?</span>
                <a href="<?= URL_BASE ?>/usuarios/cadastrarTrabalhador">
                    Cadastre-se
                </a>
            </div>
        </div>
    </div>

</body>

</html>