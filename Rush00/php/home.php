<?php
session_start();
if (!isset($_SESSION['loggued_on_user']))
    header('Location:../html/index.html');
else
{?>
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
			<a class="active" href="../php/home.php">Accueil</a>
			<a href="../php/prod_display.php">Nos produits</a>
			<a href="../html/index.html">Notre histoire</a>
			<a href="../html/index.html">Contacts</a>
            <a href="../php/display_chart.php">Panier</a>
          </div>
          
<p>Bonjour <?php echo $_SESSION['loggued_on_user'];?> <br>Welcome Back mon ami :)</p>
<!--Footer-->

<div style ="width:100%; height:200px;"></div>
<div class="topnav" style="position:fixed;bottom:0;">
	<a href="../html/produits.html">Contacts</a>
	<a href="../php/admin_home.php">Espace Administrateur</a>
</div>

    </body>
</html>
<?php } ?>