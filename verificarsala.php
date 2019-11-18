<?php
session_start();

if(isset($_SESSION['id'])){
    
}else{
    header("Location: login.php");
}

$nome = $_POST['nome'];

$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "chat";

$conexao = new mysqli($servidor, $usuario, $senha, $banco);

if( $conexao->connect_error ) {
   die("A conexão falhou: " . $conexao->connect_error());
}

$sql = "INSERT INTO Sala (nome, dono)
        VALUES ('$nome', '{$_SESSION['id']}')";

if ($conexao->query($sql) === TRUE) {
    echo "<script>alert('Sala criada com sucesso!');
  location.assign('entrarsala.php');
  </script>";
} else {
    echo "Erro na criação da tabela: " . $conexao->error; 
}
$conexao->close();
?>
