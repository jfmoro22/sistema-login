<?php

session_start();

if (!isset($_SESSION['logado' ]) || $_SESSION['nivel_acesso'] !== 'admin') {
header('Location: painel.php'); 
exit; 
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Perfil Admin</title>
<link rel="stylesheet" href="css/estilo.css">
</head>
<body>
<div class="container">
<h2> Perfil do Administrador</h2>
<p>Pagina de acesso exclusivo do usuario <strong> <?php echo
$_SESSION['usuario']; ?></strong> .</p>

<br>
<a href="painel.php">< Voltar ao Painel</a>
</div>
</body>
</html>