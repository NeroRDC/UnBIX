	
<?php
     
    require 'database.php';
 
    if ( !empty($_POST)) {
         
        $nome = $_POST['nome'];
        $curso = $_POST['curso'];
	$email = $_POST['email'];
        $matricula = $_POST['matricula'];
	$genero = $_POST['genero'];
	$senha = $_POST['senha'];

            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO Users (Nome,Curso,Email,Matricula,Genero,Senha) values(?, ?, ?, ?, ?, ?);";
            $q = $pdo->prepare($sql);
            $q->execute(array($nome,$curso,$email,$matricula,$genero,$senha));
            Database::disconnect();
        }
    
?>

<html>
<p style=" text-align:center;">
Registro incluído com sucesso!
</p>
</html>
