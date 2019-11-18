<?php
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

$sql = "SELECT id, nome, email, senha FROM Usuarios WHERE email = '$email' AND senha = '$senhacriptografada'";

$result = $conexao->query($sql);

if ($result->num_rows > 0) {
    $linha = $result->fetch_assoc();
   
    session_start();
    $_SESSION["id"] = $linha['id'];
    $_SESSION["nome"] = $linha['nome'];
    
    header("Location: sala.php");

} else {
  echo "<script>alert('Usuário e senha inválidos!');
  location.assign('Login.php');
  </script>";
}
    
$conexao->close();
?>
