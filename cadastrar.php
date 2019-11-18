<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>
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
<h1>Cadastro</h1>
    <form method="POST" action="salvar.php">
        <label>Nome:</label><input type="text" name="nome"><br><br>
        <label>Email:</label><input type="text" name="email"><br><br>
        <label>Senha:</label><input type="password" name="senha"><br><br>
        <input type="submit" value="Cadastrar">
    </form>
</body>

</html>