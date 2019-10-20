<?php
session_start();?>
<html>
    <head>
        <title>Chez Maurice</title>
        <link rel="stylesheet" type="text/css" href="../css/chez_maurice.css">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    </head>
    <body style="background=pink;">
    
<!--Header-->
<a href ="../php/logout.php" class="decon">Deconnexion...</a>
		<div class="topnav">
			<a class="active" href="../php/index.php">Accueil</a>
			<a href="../php/prod_display.php">Nos produits</a>
			<a href="../html/index.html">Notre histoire</a>
			<a href="../html/index.html">Contacts</a>
            <a href="../php/display_chart.php">Panier</a>
          </div>

<div class="container">
    <form action="../php/prod_modif.php" method="post">
		<h3>Modifier, ajouer ou supprimer un article</h3>
		<div style="font-size:10%;">Entrer le nom du produit à modifier avec ces nouvelles caractéristique. Si le produit entré n'existe pas, il sera créé avec les caractéristiques associées</div>
		<input type="text" placeholder="Nom du produit"  name="Prod_Name"/>
        <input type="text" placeholder="Catégorie" name="Prod_Category" />
        <input type="text" placeholder="Prix"  name="Prod_Price"/>
        <input type="text" placeholder="Quantité disponible" name="Prod_Qty" />
        <input type="text" placeholder="Description"  name="Prod_Desc"/>
		<input class="info-validation" type="submit" name="submit" value="OK" />
    </form>
</div>
<div style ="width:100%; height:20px;"></div>
<div class="container">
    <form action="../php/prod_remove.php" method="post">
        <h3>Retirer un produit</h3>
		<div style="font-size:10%;">Veuillez entrer le nom du produit que vous souhaitez supprimer</div>
		<input type="text" placeholder="Nom du Produit"  name="Prod_Name"/>
		<input class="info-validation" type="submit" name="submit" value="OK" />
    </form>
</div>
<div style ="width:100%; height:20px;"></div>
<div class="container">
    <form action="../php/admin_add.php" method="post">
        <h3>Ajouter ou supprimer des droits d'adminstrateurs</h3>
		<div style="font-size:10%;">Veuillez entrer l'adresse mail du compte et choisir l'option qui vous convient</div>
		<input type="text" placeholder="Email"  name="Email_Address"/>
		<select name="Admin" id="Admin">
            <option value=1>Ajouter les droits d'administration</option>
            <option value=0>Retirer les droits d'administration</option>
        </select>
		<input class="info-validation" type="submit" name="submit" value="OK" />
    </form>
</div>

    </body>
</html>

