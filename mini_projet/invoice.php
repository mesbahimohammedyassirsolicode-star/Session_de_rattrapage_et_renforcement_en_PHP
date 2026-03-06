<?php
session_start();

// check if the cart is empty
if(empty($_SESSION["panier"])){
    echo "Your cart is empty";
    exit; 
}

// variable to calculate the total price
$total = 0;
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Invoice</title>
<link rel="stylesheet" href="style.css">
</head>

<body>

<div class="invoice">
    <div class="invoice-header">
        <h1>My Shop</h1>
        <div class="invoice-meta">
            <span>Invoice #: <?php echo date('YmdHis'); ?></span><br>
            <span>Date: <?php echo date('Y-m-d'); ?></span>
        </div>
    </div>

    <h2>Invoice</h2>

    <table class="invoice-table">
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Unit Price</th>
            <th>Total</th>
        </tr>

<?php

foreach($_SESSION["panier"] as $p){

$ligne = $p["prix"] * $p["qte"];

// add the line total to the global total
$total += $ligne;
// tabl
echo "<tr>";
echo "<td>".$p["nom"]."</td>";
echo "<td>".$p["qte"]."</td>";
echo "<td>".$p["prix"]."</td>";
echo "<td>".$ligne."</td>";
echo "</tr>";

}

?>

<tr class="total-row">
    <td colspan="3" style="text-align:right;font-weight:bold;">Total to pay</td>
    <td><?php echo $total ?></td>
</tr>

</table>
   <a href="shop.php" class="shop-link">View Shop</a>
   

</body>
</html>