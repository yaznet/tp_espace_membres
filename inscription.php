<!DOCTYPE html>
<html>
    <head>
        <title>Page d'inscription</title>
        <meta = charset="UTF8" />
    </head>
 
    <body>
        <h1>Formulaire d'inscription</h1>
 
        <form method="post" action="inscription_cible.php">
            <p>
                <label for="pseudo">Pseudo :</label>
                <input type="text" name="pseudo" id="pseudo" required="required" autofocus placeholder="ex : Youcef" />
            </p>
            <p>
                <label for="pass">Mot de passe :</label>
                <input type="password" name="pass" id="pass" />
            </p>
            <p>
                <label for="passverifie">Retapez votre mot de passe :</label><input type="password" name="passverifie" id="passverifie" />
            </p>
            <p>
                <label for="email">Adresse e-mail :</label>
                <input type="email" name="email" id="email" placeholder="exemple@mail.fr" />
            </p>
            <p>
                <input type="submit" value="Inscription">
                <button><a href="connexion.php">Déja inscrit !</a></button>
            </p>
        </form>
        
    </body>
</html>