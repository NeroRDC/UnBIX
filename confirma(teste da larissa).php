	
<?php
     
    require 'database.php';
 
    if ( !empty($_POST))       // vou comentar tudo viu.... se o suario tver digitado algo
    {         
       $nome = $_POST['nome'];   
       $curso = $_POST['curso'];
	   $email = $_POST['email'];
       $matricula = $_POST['matricula'];
	   $genero = $_POST['genero'];
	   $senha = $_POST['senha'];

       $checaremail = mysql_query("SELECT Email FROM Users WHERE Email = $email");     //cria-se uma variavel para comparar com emails exixtentes
       $checarmatricula = mysql_query("SELECT Matricula FROM Users WHERE Matricula = $matricula");  //e uma para comparar matriculas, coisas que nao podem existir duas iguais

       if (mysql_num_rows($checaremail)>0)   //se existir algum email ja cadastrado
       {
            echo "<script>alert('Email já cadastrado!');</script>"; // ele fala que não pode e tecnicamente volta pra página de cadastro
       }
       if (mysql_num_rows($checarmatricula)>0) // mesma coisa pra matricula
       {
            echo "<script>alert('Matrícula já cadastrada!');</script>";
       }

       if (mysql_num_rows($checaremail)<=0 && mysql_num_rows($checarmatricula)<=0) // caso nao exista nem email ou maricula igual, 
       {
            require 'Validação.js'; // ele faz as validações do javascript ... espero q funcione assim 
            if (erro == false) // a variavel erro dentro do arquivo do js retorna false ou true se existir erros. Se não existirem
            {

            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO Users (Nome,Curso,Email,Matricula,Genero,Senha) values(?, ?, ?, ?, ?, ?);";
            $q = $pdo->prepare($sql);
            $q->execute(array($nome,$curso,$email,$matricula,$genero,$senha));
            Database::disconnect();   //essa é a parte do Andre, ess eu sei que funciona kkk se nao existir erro, ele te coloca no banco e imprimi esse html ai embaixo. agora, não sei se ja retorna pro index.php
?>
<html>
<p style=" text-align:center;">
Registro incluído com sucesso!
</p>
</html> 
<?
            header ("Location:index.php");   //entao coloquei esse header aqui so pra garantir 
            }
       }

    }else 
    {
        header("Location:cadastro.php");
    } // caso tdo esteja vazio, a pessoa nao digitou nada, eu mando ela de volta pro cdastro. 

?>
