<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Chat</title>
</head>
<?php
session_start(); 
?>
<body>
<?php
if(isset($_SESSION['id'])){
    
}else{
    header("Location: login.php");
}
$msg = $_POST['mensagem'];


$servidor = "localhost";
$usuario = "root";
$senha = "toor";
$banco = "chat";

$conexao = new mysqli($servidor, $usuario, $senha, $banco);

if( $conexao->connect_error ) {
   die("A conexão falhou: " . $conexao->connect_error());
}

$sql = "INSERT INTO mensagens (remetente, mensagem, sala)
        VALUES ('{$_SESSION['id']}', '$msg', '{$_SESSION["idsala"]}')"; 

if ($conexao->query($sql) === TRUE) {
    $conexao->close();
     header("Location: chat.php");
} else {
    echo "Erro na criação da tabela: " . $conexao->error; 
}
    
$sql = "SELECT id, nome, dono FROM mensagens where id = ".$_SESSION['idsala'];

$result = $conexao->query($sql);

if ($result->num_rows > 0) {
    while($linha = $result->fetch_assoc()){
       echo "<h1>{$linha['nome']}<h1>";
}} else {
        echo "Nenhuma sala";
}


$conexao->close();
?>
</body>
</html>
