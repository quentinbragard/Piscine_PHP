<html>
    <head>
        <title>Premier test</title>
    </head>

    <body>
        <p>Bonjour tout le monde, bienvenue sur mon premier <strong>site</strong></p><br>

        <form action="test.php" method="post">
            <input type="password" name="pwd" />
            <input type="submit" value="Valider" />
        </form>
    </body>
</html>
<?php
if (isset($_POST['pwd']) && $_POST['pwd'] == "kangourou")
    echo "FELICITATIONS, vous avez trouvé le bon mot de passe!!\n";
?>

SELECT (REPLACE(CONCAT(`phone_number`, '42'),7 ,9) AS 'ft5')