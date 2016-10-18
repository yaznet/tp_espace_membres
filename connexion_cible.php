<?php

session_start();

if (isset($_SESSION['pseudo']) && isset($_SESSION['pass'])) 
{
    header("Location: espacemembre.php");
}

if (isset($_COOKIE['pseudo']) && isset($_COOKIE['pass'])) 
{	
	header("Location: espacemembre.php");
}

try
{
	$bdd = new pdo('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root');
}

catch(Exception $e)
{
	die('Erreur : '.$e->getMessage());
}

$pass_hache = sha1($_POST['pass']);

$req = $bdd->prepare('SELECT * FROM membres WHERE pseudo = :pseudo AND pass = :pass');
$req->execute(array(
    'pseudo' => $pseudo,
    'pass' => $pass_hache));

$resultat = $req->fetch();

if (!$resultat) 
{
	session_start();
	$_SESSION['pseudo'] = $pseudo;
	$_SESSION['pass'] = $pass_hache;

  if (isset($_POST['auto'])) 
  {
    setcookie('pseudo', $pseudo, time() + 365*24*3600, null, null, false, true);
    setcookie('pass', $pass_hache, time() + 365*24*3600, null, null, false, true);
  }
  header("Location: espacemembre.php");
}
else 
{
  echo "Ce compte n'existe pas, vérifiez votre pseudonyme et votre mot de passe";
}

?>