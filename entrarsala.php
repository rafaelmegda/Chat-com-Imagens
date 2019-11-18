<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Selecionar Sala</title>
</head>
<body>
<h1>Selecionar Sala</h1>
    <?php
session_start();

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

$sql = "SELECT id, nome, dono FROM Sala";

$result = $conexao->query($sql);

if ($result->num_rows > 0) {
    while($linha = $result->fetch_assoc()){
       echo "<a href= 'chat.php?id={$linha['id']}'><ul><li>{$linha['nome']}</li></ul></a>";
}} else {
        echo "Nenhuma sala";
}
     
$conexao->close();
?>
    

</body>
</html>