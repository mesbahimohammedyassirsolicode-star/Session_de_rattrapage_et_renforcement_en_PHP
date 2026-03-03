<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    
</body>
</html>

<?php 
$students =[
        "nom" => "alami","prenome" => 'med',
        'note' =>[10,12,13]
];[
"nom" => "azouz","prenome" => 'sert',
        'note' =>[10,12,13]
];[
    "nom" => "yassir","prenome" => 'soliman',
        'note' =>[10,12,13]
];

?>
 <table border="1">
    <tr>
    <th>
            nom
        </th>
        <th>
            prénom
        </th>
        <th>
            note1
        </th>
        <th>
            note2
        </th>
        <th>
            note3
        </th>
        <th>
            moyenne
        </th>

    </tr>
   <?php 
   foreach($students as $student){
     echo "<tr>";
    echo "<td>".$student["nom"]."</td>";
    echo "<td>".$student["prenom"]."</td>";
    echo "<td>".$student["note"][0]."</td>";
    echo "<td>".$student["note"][1]."</td>";
    echo "<td>".$student["note"][2]."</td>";

   }
   
   ?>