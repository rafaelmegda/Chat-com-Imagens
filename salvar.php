<?php
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$senhacriptografada = hash('sha256', $senha);

$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "chat";

$conexao = new mysqli($servidor, $usuario, $senha, $banco);

if( $conexao->connect_error ) {
   die("A conexão falhou: " . $conexao->connect_error());
}

$sql = "INSERT INTO Usuarios (nome, email, senha)
        VALUES ('$nome', '$email', '$senhacriptografada')"; 

if ($conexao->query($sql) === TRUE) {
    $conexao->close();
    header("Location: login.php");
} else {
    echo "Erro na criação da tabela: " . $conexao->error; 
}
$conexao->close();
?>
