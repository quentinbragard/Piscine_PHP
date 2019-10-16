<?php
session_start();
$chart = $_SESSION['chart'];
$length = count($chart['Prod_Name']);
?>
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
			<a class="active" href="../html/index.html">Accueil</a>
			<a href="../php/prod_display.php">Nos produits</a>
			<a href="../html/index.html">Notre histoire</a>
            <a href="../html/index.html">Contacts</a>
            <a href="../php/display_chart.php">Panier</a>
		  </div>

<!--Produits-->
<?php if ($length == 0){?>
    <div class="container">Votre Panier est vide! Pour séléctionner d'autres produits, rendez-vous <a href = "../php/prod_display.php">ici</a></div>  
<?php
}
while ($length > 0){
    if ($chart['Prod_Qty'][$length - 1] > 0){?>
    <ul class="product-grid">
        <li class="product-block">
            <div class="product-item">
                <img src="../img/logo_maurice.jpg" width=150vw height=auto alt="Product picture"/>
                <strong><?php echo $chart['Prod_Name'][$length - 1]; ?></strong>
                <span class="desc"><?php echo $chart['Prod_Desc'][$length - 1]; ?></span>
                <span class="product-item"><?php echo $chart['Prod_Price'][$length - 1]." €";?></span>
            </div>
            <div class="product-item">
                <span class="qty"><?php echo $chart['Prod_Qty'][$length - 1]; ?></span>
            </div>
            <form action="remove_one_article_from_chart.php" method="post">
                    <input type="hidden" name="Prod_Name" value="<?php echo $chart['Prod_Name'][$length - 1]?>"/>
                    <input type="submit" value="Retirer" />
                </form>
        </li>
    </ul>
    <?php
    } 
    $length = $length - 1;
} ?>
<!--Footer-->
<div class="topnav" style="position:fixed;bottom:0;">
	<a class="active" href="../html/index.html">Accueil</a>
	<a href="../html/produits.html">Nos produits</a>
	<a href="../html/index.html">Notre histoire</a>
	<a href="../html/index.html">Contacts</a>
	<a href="../html/index.html">Panier</a>
  </div>

    </body>
</html>
