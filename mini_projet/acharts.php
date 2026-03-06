
<?php
session_start();
//reading the file json
$products = json_decode(file_get_contents("produit.json"), true);
$message="";
//check if the request is done
if($_SERVER["REQUEST_METHOD"]==="POST"){
        //stock the variables
    $produit=$_POST['produit'];
    $qte =$_POST['Qte'];
//fetch all the data from json file
    $product = $products[$produit];
    $name = $product["nom"];
    $price = $product["prix"];
    $stock = $product["stock"];
    //checking the stock
    if($qte  <= 0){
    $message="qte not valide";
    }
    //check the qte >  stock
   elseif($qte > $stock   ){
        $message="stock not enough";
   }




}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>achats</title>
</head>
<body>
    <h1>
        welcome to our site!
    </h1>
   <form method="POST">
    <label>choisir un produit</label>
    <select name="produit">
        <?php
       foreach($products as $i => $p){
 echo "<option value='$i'>".$p["nom"]."</option>";
}
?>
    </select>
    <label>saisir une quantité</label>
    <input type="text" name="Qte">
    <button type="submit">buy</button>
   </form> 
</body>
</html>
