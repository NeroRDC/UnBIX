<?php 
  
$email = $_POST['email']; 
$senha = MD5($_POST['senha']);
$logar = $_POST['logar'];
$conexao = mysql_connect('servidor', 'usuario', 'senha'); //preencher com servidor, usuário, senha
$banco = mysql_select_db('UnBix_database');

if (isset($logar)) 
{          
  $consulta = mysql_query("SELECT * FROM users WHERE Email = '$email' AND Senha = '$senha'") or die("Tente novamente"); // checar die
  
  if (mysql_num_rows($consulta)<=0)
  {
    header("location: login.html");
    echo "<script>alert('Email e/ou senha incorretos!');</script>";
    die(); // checar die
  }else
  {
    setcookie("login",$login); // CHECAR ISSO AQUI
    header("location:ARQUIVO UNBIX");
  }
}
?>