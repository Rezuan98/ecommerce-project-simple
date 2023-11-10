




<?php
$connect = mysqli_connect('localhost','root','','ecommerce');
SESSION_START();
if($_SESSION['email'] == true){
  echo "wellcome to DEAR ADMIN=". $_SESSION['email'];

}
if(isset($_POST['submit'])){
 
    $pr_name = $_POST['pr_name'];
    $pr_ti = $_POST['pr_ti'];
    $pr_des = $_POST['pr_des'];
    $pr_price = $_POST['pr_price'];
    $img_name = $_FILES['pr_image']['name'];
    $temp_name = $_FILES['pr_image']['tmp_name'];
  

    if(move_uploaded_file($temp_name,"product_images/".$img_name)){

      $in = "INSERT INTO products (pr_name,pr_ti,pr_des,pr_price,pr_image) values('$pr_name','$pr_ti','$pr_des','$pr_price','$img_name')";
       $ex = mysqli_query($connect,$in);

       if($ex){
        echo "<script> alert('product successfully added') </script>";
       }else{
        echo "<script> alert('product successfully not added') </script>";
        echo "";
       }
  }


}


?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="index.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-primary">
  <a class="navbar-brand" href="#">Dashboard</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Admin</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li>
    </ul>
    <span class="navbar-text">
      Navbar text with an inline element
    </span>
  </div>
</nav>
<!-- form start -->
<br><br>
<div class="container">

<form class="form" method="POST" enctype = "multipart/form-data">
    <div class="form-group"><h1>Enter New Product:</h1>
      <label for="name">Product Name:</label>
      <input type="text" name="pr_name" class="form-control" id="name" placeholder="Enter Product name">
    </div>
    <div class="form-group">
      <label for="textInput">Product Title:</label>
      <input type="text" name="pr_ti" class="form-control"  placeholder="Enter Product Title">
    </div>
    <div class="form-group">
      <label for="textinput">Product Description:</label>
      <input type="text" name="pr_des" class="form-control" id="password" placeholder="Enter product description">
    </div>
    <div class="form-group">
      <label for="textinput">Product Price:</label>
      <input type="text" name="pr_price" class="form-control" id="password" placeholder="Enter product price:">
    </div>
    <br>
    <div class="form-group">
      <label for="phone">Product Image:</label>
      <input type="file" name = "pr_image" class="form-control" id="phone" placeholder="Enter your phone number">
    </div>
    <br>
    <button type="submit" name="submit"class="btn btn-primary">Submit</button>
  </form></div>


  <!-- table start -->


<table>
<thead>
<th>ID</th>
<th>Product Name</th>
<th>Product Title</th>
<th>Product Description</th>
<th>Product Price</th>
<th>Product Image</th>

</thead>
<tbody>
  <?php  
  $select = "select * from products ";
  $ex = mysqli_query($connect,$select);
   
         while($array=mysqli_fetch_array($ex)){?>
          <tr>
  <td><?php echo $array['id'];  ?></td>
  <td><?php echo $array['pr_name'];  ?></td>
  <td><?php echo $array['pr_ti'];  ?></td>
  <td><?php echo $array['pr_des'];  ?></td>
  <td><?php echo $array['pr_price'];  ?></td>
  <td><img height="150" width="150" src="product_images/<?php echo $array['pr_image'];  ?>" alt=""></td>
</tr>

       <?php  }?>


</tbody>

</table>

 









  
  
  
  
</body>
</html>