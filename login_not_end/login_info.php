<?php

include("analyse_database.php");


//$Err mensagem de erro que html deve imprimir

$erros = array('matriculaErr' => ' ','passErr' => ' ');

function analysing_post($type, $db_collun, &$erros)
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
			$Err = "$type not found!";
			$erros[$key] = $Err;
		}
	}
}

analysing_post('matricula','Matricula', $erros);
analysing_post('pass','Senha', $erros);

$matriculaErr = $erros['matriculaErr'];
$passErr = $erros['passErr'];

$pass = $_POST['pass'];
$matricula = $_POST['matricula'];

echo $matriculaErr. "\n" . " ". $passErr. "\n";///ATENÇÃO IMPRIMINDO OS ERROS PERCEBE-SE QUE ESTOU ACESSANDO O BANCO DE DADOS E CONSEGUINDO VERIFICAR QUE TIPO DE DISCREPANCIA O USUARIO COLOCOU COMO INFORMAÇÃO//Faça o teste tire o cometario antes do echo.

$db_colluns = array("Userid","Curso","Nome","Matricula","Email" ,"Senha", "Nascimento","Genero");

if($erros['matriculaErr'] == ' ' && $erros['passErr'] == ' ')
{
	if(validate_all_info($matricula, $pass, $db_colluns))
	echo "sucesso!";
	
	else
	echo "informacoes incorretas";

}

//NAO ESTA NADA PRONTO PESSOAL AINDA FALTA MUITA COISA, MAS VOU COLOCAR NO GIT PRA VCS DAREM UM OLHADA.
//coisas que tirei da versao anterior:

//analysing_post('name','Nome',$erros);
//analysing_post('email','Email',$erros);
//$nameErr = $erros['nameErr'];
//$emailErr = $erros['emailErr'];
//$name = $_POST['name'];
//$email = $_POST['email'];

?>