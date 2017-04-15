<?php

include("analyse_database.php");


//$confsenha = $_POST['confsenha'];

//primeira funcao------------------------------------------ela verifica informação por informaçao
$erros = array('nameErr' => ' ','emailErr' => ' ','senhaErr' => ' ');

function analysing_post($type,$db_collun, &$erros)
{
		$key = $type."Err";

	if(empty($_POST[$type]))
	{
		$Err = "Please insert a $type !";
		$erros[$key] = $Err;
	}

	else
	{
		$search = $_POST[$type];

		if(!validate_login_information($search,$db_collun))
		{
			$Err = "$type not found!";//mensagem de erro que html deve imprimir
			$erros[$key] = $Err;
		}
	}
}
//---------------------------------------------

analysing_post('name','Nome',$erros);
analysing_post('email','Email',$erros);
analysing_post('senha','Senha',$erros);

$nameErr = $erros['nameErr'];
$emailErr = $erros['emailErr'];
$passErr = $erros['senhaErr'];

$name = $_POST['name'];
$email = $_POST['email'];
$senha = $_POST['senha'];

//echo $nameErr;
//echo $emailErr;///////////////////////////////////////////////ATENÇÃO IMPRIMINDO OS ERROS PERCEBE-SE QUE ESTOU ACESSANDO O BANCO DE DADOS E CONSEGUINDO VERIFICAR QUE TIPO DE DISCREPANCIA O USUARIO COLOCOU COMO INFORMAÇÃO

$db_colluns = array("Userid","Curso","Nome","Matricula","Email" ,"Senha", "Nascimento","Genero");

if($erros['nameErr'] == ' ' && $erros['emailErr'] == ' ' && $erros['senhaErr'] == ' ')
{
	if(validate_all_info($name, $email, $senha,$db_colluns))
	echo "sucesso!";
	
	else
	echo "informacoes incorretas";

}
//NAO ESTA NADA PRONTO PESSOAL AINDA FALTA MUITA COISA, MAS VOU COLOCAR NO GIT PRA VCS DAREM UM OLHADA.
?>
