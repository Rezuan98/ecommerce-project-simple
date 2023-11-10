<?php  
$connect = mysqli_connect('localhost','root','','ecommerce');
SESSION_START();
if($_SESSION['email'] == true){
  echo "wellcome to DEAR ADMIN=". $_SESSION['email'];}
   
  $select = "SELECT * FROM cart";
  $exc = mysqli_query($connect,$select);
   $total = 0;
  while($row = mysqli_fetch_array($exc)){
    echo "<br> Total items:". $product_name[] = $row['product_ti'] . '('. $row['quantity'].')';
    $product_price = ((int)$row['product_price']* (int)$row['quantity']);
     $total += $product_price;
  }
  echo "---total payeble amount:". $total;
  $impl_cvrt = implode(',',$product_name);
 



  if(isset($_POST['orderbutton'])){
   
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $district = $_POST['district'];
    $pay = $_POST['pay'];

    $insert = "INSERT INTO final_order(name,email,phone_number,district,pay,product_ti,total_price) VALUES('$name','$email','$phone','$district','$pay','$impl_cvrt','$total')";
     
    $execute= mysqli_query($connect,$insert);

    if($execute){
      echo "<script> alert('order is confirmed!') </script>";
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
    <div class="container">

    <div class="row">
       <div class="col-lg-6">
          <h1>Order</h1>
          <form action="" method="POST">
          <input type="text"  class="form-control" name="name" placeholder="Enter Your Name:">
          <input type="email"  class="form-control" name="email" placeholder="Enter Your email:">
          <input type="text"  class="form-control" name="phone" placeholder="Enter Your Phone Number:">
          <input type="text"  class="form-control" name="district" placeholder="Enter Your District:">
          <select name="pay" class="form-control" id="">
            <option value="bkash">bkash</option>
            <option value="rocket">Rocket</option>
            <option value="nagad">Nagad</option>
            <option value="upay">Upay</option>
          </select>
          <br>
          <button class="btn btn-success" type="submit" name="orderbutton">Confirm Order</button>

          </form>
       </div>

    </div>
    </div>
    
</body>
</html>