
<?php
$connect = mysqli_connect('localhost','root','','ecommerce');


session_start();

if(isset($_POST['login'])){

    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $query = mysqli_query($connect,"select * from admin_login where email ='$email' and pass = '$pass'");

    $row = mysqli_fetch_array($query);

    

    if($row){
      $_SESSION['email'] = $row['email'];
        header("location:index.php");
       
    }else
    echo "<script> alert('Login Failed') </script>";

}

?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="login.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body >
    <br><br><br>
    <h1>Login As User</h1>
    <br><br>
<form class="form" method="POST">
 <div class="form-group row" width="300">
    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="email" name="email" class="form-control" id="inputEmail" placeholder="email@example.com">
    </div>
  </div>
  <br>
  <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
      <input type="password" name="pass" class="form-control" id="inputPassword" placeholder="Password">
      <br><br>
      <button type="submit" name="login" class="btn btn-success">Login</button>
      <br><br>
      <button type="button"  class="btn btn-warning">Register</button>
    </div>
  </div>
  </form>
</body>
</html>