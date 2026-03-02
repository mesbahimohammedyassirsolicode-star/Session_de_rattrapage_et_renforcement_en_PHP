<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ex1</title>
</head>
<body>
    <form method="POST">
        <label for="nb1">note</label>
        <input type="text" name="note" placeholder="put note here">
        <button type="submit" name="push">send</button>
    </form>
</body>
</html>
<?php 
if($_SERVER["REQUEST_METHOD"  ] === "POST"
)
{
$note=$_POST["note"];
if(empty($note)){
        echo "<p> The input is empty...</p>";
}
else{
    if(is_numeric($note) && $note >= 0 && $note <= 20 )
        {
            if ($note >= 10) {
                echo "<p>Vous étes admis</p>";
            } else {
                echo "<p>Vous n'étes pas admis</p>";
            }
        }
        else {
            echo "<br> Non valide :(";
        }
    }
}



?>