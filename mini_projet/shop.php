
<?php
session_start();
//reading the file json
$products = json_decode(file_get_contents("produit.json"), true);
$message="";
//save th panier
if(!isset($_SESSION["panier"])){
     $_SESSION["panier"] = [];
}
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
    // fetch the data to our array
    else{
    $_SESSION["panier"][]=[
        "nom"=>$name,
        "prix"=>$price,
        "qte"=>$qte
    ];

    $products[$produit]["stock"] -= $qte;

    file_put_contents("produit.json", json_encode($products, JSON_PRETTY_PRINT));

    $message="Produit added succeseded";
}

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>achats</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="shop">
    <h1>
        Welcome to our shop!
    </h1>
   <form method="POST" class="shop-form">
    <label>choisir un produit</label>
    <select name="produit">
        <?php
       foreach($products as $i => $p){
 echo "<option value='$i'>".$p["nom"]."</option>";
}
?>
    </select>
    <label>saisir une quantité</label>
    <input type="number" name="Qte">
    <button type="submit">buy</button>
   </form> 
   <p>

   <?php echo $message ?>
   </p>
   <H3>
    panier
   </H3>
   <table border="1">
        <tr>
            <th>
                Produit
            </th>
            <th>
                quantité
            </th>
            <th>
                Prix
            </th>
        </tr>
        <?php
        foreach($_SESSION['panier'] as $p){
            // skip malformed entries lacking required keys
            if(!isset($p['nom'], $p['prix'], $p['qte'])){
                continue;
            }

            echo "<tr>";
            echo "<td>".htmlspecialchars($p['nom'])."</td>";
            echo "<td>".$p['qte'] ."</td>";
            echo "<td>".htmlspecialchars($p['prix'])."</td>";
            echo "</tr>";


        }





        ?>


    
   </table>
   <a href="invoice.php" class="invoice-link">View Invoice</a>
    </div> <!-- .shop -->
</body>
</html>
