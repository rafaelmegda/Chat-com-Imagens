<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sala</title>
</head>

<body>
<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "chat";

$conexao = new mysqli($servidor, $usuario, $senha, $banco);


if( $conexao->connect_error ) {
   die("A conexão falhou: " . $conexao->connect_error());
}

$conexao->close();
?>
    <form action="entrarsala.php">
        <input type="submit" value="Entrar na sala">
    </form><br><br>

    <form action="criarsala.php">
        <input type="submit" value="Criar sala">
    </form>

</body>

</html>
