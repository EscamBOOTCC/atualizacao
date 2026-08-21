<!DOCTYPE html>

<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EscamBOO - Login</title>

    ```
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #D9CAB3;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }

        .bg-dark {
            background-color: #D9CAB3 !important;
        }

        .card {
            border: none;
            border-radius: 16px;
            width: 100%;
            max-width: 500px;
            box-shadow: 0 10px 30px #130507 !important;
        }

        .card-body h2,
        .card-body .form-label {
            text-align: center;
        }

        .form-label {
            font-weight: 500;
            color: #333;
        }

        .btn-primary {
            background-color: #5e0b15;
            border-color: #681010;
            border-radius: 8px;
            font-weight: 600;
        }

        .btn-primary:hover {
            background-color: #a93226;
            border-color: #a93226;
        }

        .btn.btn-dark {
            background-color: #5e0b15;
            border-color: #681010;
            border-radius: 8px;
            font-weight: 600;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #c0392b;
            box-shadow: 0 0 0 0.25rem rgba(192, 57, 43, 0.25);
        }

        .text-danger {
            color: #c0392b !important;
        }

        .nav-tabs .nav-link {
            color: #888 !important;
            font-weight: 500;
            border: none;
            border-bottom: 3px solid transparent;
        }

        .nav-tabs .nav-link.active {
            color: #5e0b15 !important;
            background-color: transparent;
            border-bottom: 3px solid #5e0b15;
        }
    </style>
    ```

</head>

<body>

    ```
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

                    <label for="email" class="form-label">
                        E-mail
                    </label>

                    <input
                        type="email"
                        class="form-control"
                        id="email"
                        name="email"
                        value="<?= htmlspecialchars($email ?? '') ?>">

                </div>

                <div class="mb-3">

                    <label for="senha" class="form-label">
                        Senha
                    </label>

                    <input
                        type="password"
                        class="form-control"
                        id="senha"
                        name="senha">

                </div>

                <button type="submit" class="btn btn-primary w-100">
                    Entrar
                </button>

            </form>

            <div class="text-center mt-3">

                <span class="text-muted">
                    Ainda não tem uma conta?
                </span>

                <a href="<?= URL_BASE ?>/trabalhador/cadastrar">
                    Cadastre-se
                </a>

            </div>

        </div>

    </div>

</body>

</html>