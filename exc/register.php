<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form  method="post">
        <label for="" name="name">name</label>
        <input type="text" required>
        <label name="email">email</label>
        <input type="text" required>
        <label name="password">password</label>
        <input type="text" required>
        <select name="role" id=""> <option value="">admin</option>
        <option value="">formateur</option>
        <option value="">student</option>
    </select>
    <button type="submit">send</button>
    </form>
</body>
</html>
<?php 
session_start();
if(file_exists("data.json")){
    $json= file_get_contents("data.json");
    $data = json_decode($json , true);
}else{
    $data =[];
}
if($_SERVER["REQUEST_METHOD"]=== "POST")
    $name=$_POST["name"];
    $email=$_POST["email"];
    $password=$_POST["password"];
    $role =$_POST["role"];
    if(empty($name && $password && $email && $role)){
      echo "<p> fill the fileds </p>";
    $data[]=[
  "id" => uniqid("id"),
  "name" => "",
  "email" => "",
  "password" => "",
  "role" => "",
  "active" => true
];
    }

?>