<?php session_start();
    include("db_connect.php");
    function check_if_admin($Email_address, $Password, $is_loggued)
    {
        $pwd = hash('whirlpool', $Password);
        try 
        {
            $conn = db_connect("localhost", "chez_maurice", "root", "123456");
            $stmt = $conn->prepare("SELECT *
                FROM customers as a
                INNER JOIN passwords as b ON a.ID = b.ID WHERE a.Email_Address = '$Email_address'"); 
            $stmt->execute(); 
            while ($row = $stmt->fetch())
            {
                if ($is_loggued == 0 && $row['Email_Address'] == $Email_address && $row['Password'] == $pwd && $row['Admin'] == 1)
                    return (TRUE);
                if ($is_loggued == 1 && $row['Email_Address'] == $Email_address && $row['Admin'] == 1)
                    return (TRUE);
            }
        }
        catch(PDOException $e)
        {
            echo "Error: " . $e->getMessage();
            return (FALSE);
        }
        $conn = null;
        return (FALSE);
    }

    if($_SESSION['loggued_on_user'])
        {
            if(check_if_admin($_SESSION['loggued_on_user'], "", 1) == TRUE)
                header('Location:../php/admin_space.php');
        }?> 
<html>

    <head>
        <title>Chez Maurice</title>
        <link rel="stylesheet" type="text/css" href="../css/chez_maurice.css">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    </head>

    <body>
<!--Header-->
<a href ="../php/logout.php" class="decon">Deconnexion...</a>
		<div class="topnav">
			<a class="active" href="../php/index.php">Accueil</a>
			<a href="../php/prod_display.php">Nos produits</a>
			<a href="../html/index.html">Notre histoire</a>
			<a href="../html/index.html">Contacts</a>
            <a href="../php/display_chart.php">Panier</a>
		  </div>

<!--Formuaire de connexion-->
		<h2>Bienvenue dans l'espace administrateur. Merci de vous connecter avec vos identifiants: </h2>
		<div class="container">
			<div class="form-container">
				<form action="../php/admin_connexion.php" method="post">
					<h1>Connexion</h1>
					<input type="text" placeholder="Email"  name="login"/>
					<input type="password" placeholder="Password" name="passwd" />
					<a href="#">Mot  de passe oublié</a>
					<input class="info-validation" type="submit" name="submit" value="OK" />
				</form>
  			</div>
		</div>


<!--Footer-->

<div style ="width:100%; height:200px;"></div>
<div class="topnav" style="position:fixed;bottom:0;">
	<a href="../html/produits.html">Contacts</a>
	<a href="../php/admin_home.php">Espace Administrateur</a>
</div>

    </body>
</html>
