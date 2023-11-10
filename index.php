
<?php
$connect = mysqli_connect('localhost', 'root', '', 'ecommerce');
 if(isset($_POST['cart'])){

  $product_title =$_POST['pr_ti'];
  $product_des =$_POST['pr_des'];
  $product_price = $_POST['pr_price'];
  $product_img = $_POST['pr_img'];
  $quantity = 1;

 
  $in = "INSERT into cart(product_ti,product_des,product_price,product_img,quantity) values(' $product_title','$product_des','$product_price','$product_img','$quantity')";
  $ex = mysqli_query($connect,$in);

  if($ex){
    echo "<script>alert('product addded to the cart') </script>";
  }else{
    echo "<script>alert('product did not added to the cart') </script>";

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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
  <!-- navbar start -->
  <nav class="navbar navbar-expand-lg navbar-light bg-warning">
    <a class="navbar-brand" href="#">Aarong</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">clothes</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            Dropdown
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="cart.php">Cart
            <?php
            $select = "SELECT * FROM cart";
            $ex = mysqli_query($connect,$select);
            $num = mysqli_num_rows($ex);
            echo $num;

            ?>
          </a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </nav>








  <br><br><br><br><br><br><br><br><br><br><br><br>

  <div class="container">
  <div class="row">
  <!-- card start -->
  <?php
  $connect = mysqli_connect('localhost', 'root', '', 'ecommerce');
  $select = "SELECT * FROM products";
  $querry = mysqli_query($connect, $select);


 
?>

    
<?php
  while ($row = mysqli_fetch_array($querry)) {
    ?><div class="col-lg-3">
      <form action="" method = "POST">
      <div class="card" style="width: 15rem;">
        <img class="card-img-top" width="80" height="150" src="admin/product_images/<?php echo $row['pr_image']; ?>" alt="">
        <input type="hidden" name="pr_img" value="<?php echo $row['pr_image']; ?>">
        <div class="card-body">
          <h5 class="card-title">
            <?php echo $row['pr_ti']; ?>
            <input type="hidden" name="pr_ti" value="<?php echo $row['pr_ti']; ?>">
          </h5>
          <h5 class="card-title">
            <?php echo $row['pr_price']; ?>
            <input type="hidden" name="pr_price" value="<?php echo $row['pr_price']; ?>">
          </h5>
          <p class="card-text">
            <?php echo $row['pr_des']; ?>
            <input type="hidden" name="pr_des" value="<?php echo $row['pr_des']; ?>">
          </p>
          
          <button type = "submit" href="" name="cart" class="btn btn-primary" >Add to cart</button>
          <br><br>
          <button type="button" class="btn btn-warning">Buy Now</button>
        </div>
      </div>
      </form> 
      </div>
      
    

    <?php
  }
  ?>

  </div>
</div>

</body>

</html>
