<?php 
session_start();

require "data.php";

if(!isset($_SESSION["panier"])){
$_SESSION["panier"]=[];
}

if(isset($_POST['ok'])){
    $name_products=$_POST['nom'];
    $qte=$_POST['stock'];

}




?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <table border="2">
        <tr>
            <th>
                nom
            </th>
            <th>
                prix
            </th>
            <th>
                stock
            </th>
        </tr>
        <?php  
foreach($produits as $produit){
echo "<tr>";
echo "<td>".$produit["nom"]. "</td>";
echo "<td>".$produit["prix"]. "</td>";
echo "<td>".$produit["stock"]. "</td>";
echo "</tr>";
}
 ?>
    </table>
   <label>choisir un produit</label>
    <select name="produit">
   <?php
foreach($produits as $p){
    echo "<option value='".$p["nom"]."'>".$p["nom"]."</option>";
}
?>
    </select>
       <form method="POST" class="shop-form">
    <label>saisir une quantité</label>
    <input type="number" name="Qte" required>
    <button type="submit">buy</button>
   </form>
</body>
</html>
