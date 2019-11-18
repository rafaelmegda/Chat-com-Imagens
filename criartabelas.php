<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Criar Tabelas</title>
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

$sqli = "CREATE TABLE Usuarios (
	id INT NOT NULL AUTO_INCREMENT,
	nome varchar(255) NOT NULL,
	email varchar(255) NOT NULL,
	senha varchar(64) NOT NULL,
	PRIMARY KEY (id)
)";

$sqli = "CREATE TABLE Sala (
	id INT NOT NULL AUTO_INCREMENT,
	nome varchar(255) NOT NULL,
	dono INT(255) NOT NULL,
	PRIMARY KEY (id)
)";

$sqli = "CREATE TABLE Mensagens (
	id INT NOT NULL AUTO_INCREMENT,
	remetente INT NOT NULL,
	mensagem varchar(255) NOT NULL,
	sala INT(255) NOT NULL,
	PRIMARY KEY (id)
)";

$sqli = " ALTER TABLE Sala ADD CONSTRAINT Sala_fk0 FOREIGN KEY (dono) REFERENCES Usuarios (id)";

$sqli = " ALTER TABLE Mensagens ADD CONSTRAINT Mensagens_fk0 FOREIGN KEY (remetente) REFERENCES Usuarios (id)";

$sqli = " ALTER TABLE Mensagens ADD CONSTRAINT Mensagens_fk1 FOREIGN KEY (sala) REFERENCES Sala (id)";
    
if ($conexao->query($sqli) === TRUE) {
    echo "<br>Tabelas criadas com sucesso";
} else {
   echo "<br>Erro na criação das tabelas: " . $conexao->error; 
}
$conexao->close();
?>

</body>
</html>


