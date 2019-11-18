<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Criar Lista</title>
</head>
<body>
<?php
session_start();
if(isset($_SESSION['id'])){
    
}else{
    header("Location: login.php");
}
?>

<h1>Criar Sala</h1>
    <form method="POST" action="verificarsala.php">
        <label>Nome da Sala:</label><input type="text" name="nome" id="nome"><br><br>
        <input type="submit" value="Enviar" id="enviar" name="enviar">
    </form><br><br>

</body>
</html>