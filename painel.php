<?php
// painel.php - Página de boas-vindas

session_start();

// Protege a página
if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header('Location: login.html');
    exit;
}

$usuario = htmlspecialchars($_SESSION['usuario'], ENT_QUOTES, 'UTF-8');
$nivel_acesso = $_SESSION['nivel_acesso'] ?? 'usuario';
$data_login = $_SESSION['data_login'] ?? 'Data não registrada';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Painel</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <div class="container painel">
        <h2>✅ Bem-vindo, <?php echo $usuario; ?>!</h2>
        <p>Você está logado com sucesso no sistema.</p>
        
        
<?php if ($nivel_acesso === "admin"): ?>
        <p><strong>Nivel de Acesso :</strong> Administrador</p>
        <p>Voce tem controle total sobre o sistema.</p>
        <p><a href="perfil.php">Acessar Area Exclusiva do Admin</a></p>
<?php else: ?>
<p><strong>Nivel de Acesso :</strong> Usuario Padrão</p>
<p>Voce possui acesso limitado aos recursos .</p>
<?php endif; ?>


<hr style="margin: 15px 0; border-color: #333;">
<p><small> <strong>Data de Login:</strong> <?php echo $data_login; ?>
</small></p>


        <div class="logout">
            <a href="logout.php">Sair do sistema</a>
        </div>
    </div>
</body>
</html>