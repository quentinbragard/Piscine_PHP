<?php
session_start();
if ($_GET["submit"] == "OK")
{
    $_SESSION["login"]= $_GET["login"];
    $_SESSION["passwd"] = $_GET["passwd"];
}
?>
<html>
    <body>
        <form action="index.php" method="get">
            <div><span style="float:left;">Identifiant :</span><input type="text" name="login" value="<?php echo $_SESSION['login']?>" /></div>
            <div><span style="float:left;">Mot de Passe :</span><input type="password" name="passwd" value="<?php echo $_SESSION['passwd']?>" /></div><br>
            <input type="submit" value="OK" />
        </form>
    </body>
</html>