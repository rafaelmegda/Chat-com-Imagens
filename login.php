<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>

<body>

<?php
$servidor = "localhost";
$usuario = "root";
$senha = "toor";
$banco = "chat";

$conexao = new mysqli($servidor, $usuario, $senha, $banco);

if( $conexao->connect_error ) {
   die("A conexão falhou: " . $conexao->connect_error());
}

$conexao->close();
?>
<h1>Login</h1>
    <form method="POST" action="verificarlogin.php">
        <label>Email:</label><input type="text" name="email" id="email"><br><br>
        <label>Senha:</label><input type="password" name="senha" id="senha"><br><br>
        <input type="submit" value="Enviar" id="enviar" name="enviar">
    </form>
</body>

</html>