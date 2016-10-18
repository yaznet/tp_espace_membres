<?php

try
{
	$bdd = new pdo('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root');
}

catch(Exception $e)
{
	die('Erreur : '.$e->getMessage());
}

$_POST['pseudo'] = htmlspecialchars($_POST['pseudo']);
$_POST['pass'] = htmlspecialchars($_POST['pass']);
$_POST['passverifie'] = htmlspecialchars($_POST['passverifie']);
$_POST['email'] = htmlspecialchars($_POST['email']);

$pass_hache = sha1($_POST['pass']);

if (preg_match("#^[a-zA-Z0-9]{3,15}$#", $_POST['pseudo']) AND preg_match("#^[a-zA-Z0-9!_]{4,}$#", $_POST['pass']) AND preg_match("#^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['email']))
{
	if ($_POST['pass'] === $_POST['passverifie'])
	{
		$req_pseudo = $bdd->prepare('SELECT * FROM membres WHERE pseudo = ?');
		$req_pseudo->execute(array($_POST['pseudo']));
		$pseudo_exist = $req_pseudo->rowCount();

		$req_mail = $bdd->prepare('SELECT * FROM membres WHERE email = ?');
		$req_mail->execute(array($_POST['email']));
		$mail_exist = $req_mail->rowCount();

		if ($pseudo_exist)
		{
			echo 'Cet identifiant est déjà utilisé !';
		}
		elseif ($mail_exist)
		{
			echo 'Cet email est déjà utilisé !';
		}
		else
		{
			$req = $bdd->prepare('INSERT INTO membres(pseudo, pass, email, date_inscription) VALUES(:pseudo, :pass, :email, CURDATE())');
			$req->execute(array(
				'pseudo' => $_POST['pseudo'],
				'pass' => $pass_hache,
				'email' => $_POST['email']));

			header('Location: connexion.php');
		}
	}
	else
	{
		echo 'Vos mots de passe ne sont pas identique !';
	}
}
else
{
	echo 'Veuillez utiliser un pseudo entre 2 et 15 caractére, un mot de passe de 4 caractére minimum et ou une adresse mail valide !';
}
?>