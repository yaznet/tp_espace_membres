<?php

	session_start();

    setcookie('pseudo', $pseudo, time() + 365*24*3600, null, null, false, true);
    setcookie('pass', $pass_hache, time() + 365*24*3600, null, null, false, true);
    
?>

<!DOCTYPE html>
<html>
<head>
    <title>Page de connexion</title>
    <meta charset="UTF8" />
</head>

<body>
    <form action="connexion_cible.php" method="POST">
        <p>
            <label for="pseudo">Pseudo :</label>
            <input type="text" name="pseudo" id="pseudo" autofocus>
        </p>
        <p>
            <label for="pass">Mot de passe :</label>
            <input type="password" name="pass" id="pass">
        </p>
        <p>
        <label for="auto">Connexion automatique</label>
            <input type="checkbox" name="auto" id="auto">

        </p>
        <p>
            <input type="submit" value="Se connecter">
            <button><a href="inscription.php">Créer un compte !</a></button>
        </p>

    </form>
</body>
</html>
