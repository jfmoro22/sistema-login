<?php
// valida.php - Processa o login e inicia a sessão

session_start();

$usuarios = [
'admin' => ['senha' => '12345', 'nivel' => 'admin'],
'user' => ['senha' => '12345', 'nivel' => 'usuario']
];

$usuario = strtolower(trim($_POST['usuario'] ?? '')); 
$senha = $_POST['senha'] ?? '';

if (isset($usuarios[$usuario]) && $usuarios[$usuario]['senha'] === $senha) {
$_SESSION['logado' ] = true;
$_SESSION['usuario'] = $usuario;
$_SESSION['nivel_acesso'] = $usuarios[$usuario]['nivel']; 
$_SESSION['data_login'] = date('d/m/Y \à\s H:i:s');
    
// Redireciona
    header('Location: painel.php');
    exit;
} else {
    // Página de erro com estilo
    echo "
    <!DOCTYPE html>
    <html lang='pt-BR'>
    <head>
        <meta charset='UTF-8'>
        <title>Erro</title>
        <link rel='stylesheet' href='css/estilo.css'>
    </head>
    <body>
        <div class='container error'>
            <h2>❌ Login inválido!</h2>
            <p>Usuário ou senha incorretos.</p>
            <a href='login.html'>Tentar novamente</a>
        </div>
    </body>
    </html>";
}
?>