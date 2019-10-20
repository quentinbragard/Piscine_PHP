<?php
session_start();
$chart = $_SESSION['chart'];
$length = count($chart['Prod_Name']);
$count = 0;
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
			<a class="active" href="../php/index.php">Accueil</a>
			<a href="../php/prod_display.php">Nos produits</a>
			<a href="../html/index.html">Notre histoire</a>
            <a href="../html/index.html">Contacts</a>
            <a href="../php/display_chart.php">Panier</a>
		  </div>

<!--Produits-->
<?php $total = 0?>
<?php while ($length > 0){
    if ($chart['Prod_Qty'][$length - 1] > 0){
        $count += 1;?>
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
                    <input type="submit" value="Retirer"/>
                    <?php $article_total = $chart['Prod_Price'][$length - 1] * $chart['Prod_Qty'][$length - 1]; ?>
                    <span class="article_total"><?php echo $article_total." €"; ?></span>
            </form>
        </li>
    </ul>
    <?php
    } 
    $length = $length - 1;
    $total = $total + $article_total;
    $_SESSION['Order_Price'] =  $total;
}?>
<?php if ($total > 0) { ?> 
<div class ="total">
    <span class="total_text"><?php echo "Total " .$total." €";?></span>
    <a href="chart_validation.php">Passer Votre commande</a>;
</div>
<?php }
    if ($count == 0){?>
    <div class="container">Votre Panier est vide! Pour séléctionner d'autres produits, rendez-vous <a href = "../php/prod_display.php">ici</a></div> <?php } ?>

<!--Footer-->

<div style ="width:100%; height:200px;"></div>
<div class="topnav" style="position:fixed;bottom:0;">
	<a href="../html/produits.html">Contacts</a>
	<a href="../php/admin_home.php">Espace Administrateur</a>
</div>

    </body>
</html>
