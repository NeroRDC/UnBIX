<?php

header("Content-Type: text/html; charset=ISO-8859-1", true);

include("database.php");

//$db_colluns = array("Userid","Curso","Nome","Matricula","Email" ,"Senha", "Nascimento","Genero");


function validate_login_information($to_validate, $collun_database)//to_validate(algo que deve ser verificado no banco de dados)//collundatabase(nome da coluna do banco que quero verificar)
{
	//$pdo = new Database;//objet database
	$db = Database::connect();//acesso ao banco de dados
	
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$query = "select ".$collun_database." from Users;";// consulta
	//$choosens = $unbix_database->query($query);

	foreach($db->query($query) as $row)
	{	
		if($to_validate == $row[$collun_database])//MUDEI
		{
			Database::disconnect();
			return true;
		}
	}
			
			Database::disconnect();
			return false;

}

function validate_all_info($name, $email, $senha, $db_colluns)
{
	//$pdo = new Database;//objet database
	$db = Database::connect();

	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$query = "select *from Users;";
	$choosens = $db->query($query);

	foreach($choosens as $row)
	{

		if($name == $row[$db_colluns[2]] &&  $email == $row[$db_colluns[4]] && $senha == $row[$db_colluns[5]])
		{
			Database::disconnect();
			return true;
		}	
		
		Database::disconnect();
		return false;

	}
}

?>
