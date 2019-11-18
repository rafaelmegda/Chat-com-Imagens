<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Recebe.php</title>
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


$diretorio = "img/";
date_default_timezone_set('America/Sao_Paulo'); 
$data = date('omdHi');
$destinoimg = "<img widht=\"200px\" height=\"200px\" src=\"" . $diretorio . $data . basename($_FILES["arquivo"]["name"])."\" \>";
$destino = $diretorio . $data . basename($_FILES["arquivo"]["name"]);

if (move_uploaded_file($_FILES["arquivo"]["tmp_name"], $destino)) {

} else {
    echo "Erro no envio.";
}
    
$sql = "INSERT INTO mensagens (remetente, mensagem, sala)
        VALUES ('{$_SESSION['id']}', '$destinoimg', '{$_SESSION["idsala"]}')"; 

if ($conexao->query($sql) === TRUE) {
    $conexao->close();
     header("Location: chat.php");
} else {
    echo "Erro na criação da tabela: " . $conexao->error; 
}
?>
</body>
</html>