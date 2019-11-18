<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Chat</title>
</head>
<?php
session_start(); 
if(!isset ($_SESSION["idsala"])){
    $_SESSION["idsala"] = $_GET['id'];    
}

?>   
<body>
<?php
 $nome = $_SESSION["nome"];

    if(isset($_SESSION['id'])){
    
}else{
    header("Location: login.php");
}

$servidor = "localhost";
$usuario = "root";
$senha = "toor";
$banco = "chat";

$conexao = new mysqli($servidor, $usuario, $senha, $banco);

if( $conexao->connect_error ) {
   die("A conexão falhou: " . $conexao->connect_error());
}

$sql = "SELECT id, nome, dono FROM Sala where id = ".$_SESSION['idsala'];

$result = $conexao->query($sql);

if ($result->num_rows > 0) {
    while($linha = $result->fetch_assoc()){
       echo "<h1> Sala: {$linha['nome']}<h1>";
}} else {
        echo "Nenhuma sala";
}
?>

<form method="POST" action="guardarmsg.php">
        <label>Mensagem:</label><input type="text" name="mensagem"><br>
        <input type="submit" value="Enviar">
    </form>
<form action="imagem.php" method="post" enctype="multipart/form-data">
    Selecione a imagem:
    <input type="file" name="arquivo" id="arquivo">
    <input type="submit" value="Enviar imagem" name="submit"><br><br>

<?php
  $sql = "SELECT u.nome, m.mensagem from usuarios u join mensagens m on m.remetente = u.id join sala s on s.id = m.sala where m.sala = ".$_SESSION['idsala'];


$result = $conexao->query($sql);

if ($result->num_rows > 0) {
    while($linha = $result->fetch_assoc()){
       echo "{$linha['nome']} diz = {$linha['mensagem']}<br>";
       
}} else {
        echo "Nenhuma mensagem";
}

$conexao->close(); 
?>
</body>
</html>
