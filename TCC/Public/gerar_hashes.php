<?php
$senhas = [
    'Luiza@admin'   => 'Lui',
    'Rafa@admin'    => 'rafa123',
    'Evillyn@admin' => 'Evillyn2201',
    'Sarah@admin'   => 'Sarah2201',
];

foreach ($senhas as $email => $senha) {
    $hash = password_hash($senha, PASSWORD_DEFAULT);
    echo "UPDATE Usuario SET Senha = '{$hash}' WHERE Email = '{$email}';\n";
}   