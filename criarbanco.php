<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Criar Banco de Dados</title>
</head>
<body>
    <?php

$servidor = "localhost";
$usuario = "root";
$senha = "";

$conexao = new mysqli($servidor, $usuario, $senha);
if( $conexao->connect_error ) {
   die("A conexão falhou: " . $conexao->connect_error());
}
echo "Conexão realizada com sucesso!";
$sql = "CREATE DATABASE chat";
    
if ($conexao->query($sql) === TRUE) {
    echo "<br>Banco de dados criado com sucesso";
} else {
   echo "<br>Erro na criação do banco: " . $conexao->error; 
}
$conexao->close();
?>

</body>
</html>


