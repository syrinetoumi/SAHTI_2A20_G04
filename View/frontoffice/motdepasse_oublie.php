<!-- motdepasse_oublie.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../asset/frontoffice/css/formulaire.css">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mot de passe oublié</title>
</head>
<style>
    body{
        background-color: gray;
    }
    </style>
<body>
    <center>
    <h2>Mot de passe oublié</h2>
    <form action="traitement_motdepasse_oublie.php" method="post">
        <label for="email_or_phone">Adresse e-mail ou numéro de téléphone :</label>
        <input type="text" name="email_or_phone" required><br>
        <input type="submit" value="Réinitialiser le mot de passe">
    </form>
</center>
</body>


</html>
