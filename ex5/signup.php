<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sign up</title>
</head>
<body>
    <form method="post">
        <label>email</label>
        <input type="text" name="email" placeholder="saisie  l'email">
        <label>mote de passe</label>
        <input type="password" name="password" placeholder="saisie  le mot de passe">
        <label>confirme le mote pass</label>
        <input type="password" name="password2"  placeholder="confirme your password">
        <button type="submit">submit</button>

    </form>
</body>
</html>
<?php 
session_start();
if($_SERVER["REQUEST_METHOD"]==="POST"){

$email=$_POST['email'];
$password=$_POST['password'];
$password2=$_POST['password2'];
$form_is_valide=true;
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "email inavilde";
     $form_is_valide=false;
        

}else{
      if(!str_ends_with($email,"@ofppt.ma")){
    echo "email must be ofppt.ma";
    $form_is_valide=false;

}
if(strlen($password)<8){
echo "passowrd are low than we expect";
$form_is_valide=false;
}
}
 if (!preg_match("/^[a-zA-Z0-9]+$/",$password)) {
      echo"Only letters and numbers allowed";
      $form_is_valide=false;
      
    }
if($password !== $password2){
    echo "password not match";
    $form_is_valide=false;
    
}
if($form_is_valide){
$_SESSION["email"]=$email;
header("location: welcome.php");
}
}
?>