<?php
session_start();
include("product_get.php");
$products = product_get($_GET['Prod_Category']);
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
<!--Category Selection-->
    <form class="category-container" action="../php/prod_display.php" methos="get">
        <select  class= "category-item" name="Prod_Category">
            <option value="0">Tous les produits</option>
            <option value="Paninis">Paninis</option>
            <option value="Sucré">Sucré</option>
            <option value="Apéro">Apéro</option>
            <option value="Boissons">Boissons</option>
            <option value="Streetwear">Streetwear</option>
        </select>
        <input class= "button-item" type="submit" value="OK" />
    </form>
<!--Prouduits-->
<?php foreach($products as $elem){
    $total_qty = $elem['Prod_Qty'];?>
<ul class="product-grid">
    <li class="product-block">
        <div class="product-item">
            <img src="../img/logo_maurice.jpg" width=150vw height=auto alt="Product picture"/>
                <strong><?php echo $elem['Prod_Name']; ?></strong>
                <span class="desc"><?php echo $elem['Prod_Desc']; ?></span>
                <span class="desc"><?php echo "en stock : ".$elem['Prod_Qty']; ?></span>
                <span class="product-item"><?php echo $elem['Prod_Price']." €";?></span>
        </div>
                <form action="add_to_chart.php" method="post">
                    <select  name="Desired_Qty">
                        <?php while( $total_qty >= 0){?>
                        <option value="<?php echo $elem['Prod_Qty'] - $total_qty;?>"><?php echo $elem['Prod_Qty'] - $total_qty;?></option>
                        <?php $total_qty = $total_qty - 1;}?>
                    </select>
                    <input type="hidden" name="Prod_Name" value="<?php echo $elem['Prod_Name']?>"/>
                    <input type="submit" value="Ajouter" />
                </form>
    </li>
</ul>
<?php } ?>
<!--Footer-->
<div style="width=100%;border:solid;"></div>
<div class="topnav" style="position:fixed;bottom:0;">
	<a class="active" href="../html/index.html">Accueil</a>
	<a href="../html/produits.html">Nos produits</a>
	<a href="../html/index.html">Notre histoire</a>
	<a href="../html/index.html">Contacts</a>
	<a href="../html/index.html">Panier</a>
  </div>

    </body>
</html>

