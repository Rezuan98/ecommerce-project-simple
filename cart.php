<?php
$connect = mysqli_connect('localhost','root','','ecommerce');
SESSION_START();
if($_SESSION['email'] == true){
  echo "wellcome to DEAR ADMIN=". $_SESSION['email'];

}
if(isset($_POST['update'])){
  $update_id =$_POST['updateid'];
  $quantity =$_POST['quantity'];

  $update = "UPDATE cart SET quantity ='$quantity' where id ='$update_id'";
  $ex = mysqli_query($connect,$update);
}
if(isset($_GET["deleteall"])){
  $delete = "DELETE FROM cart";
  $ex = mysqli_query($connect,$delete);

}

if(isset($_GET['removeid'])){

  $removeid = $_GET['removeid'];
        
  $delete = "DELETE FROM cart where id =' $removeid'";
  $ex = mysqli_query($connect,$delete);

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
  <link rel="stylesheet" href="cart.css">

  </head>
<body>
  <h1>Cart List</h1>



  <div class="container">
    <div class="row">
      <table>
        
          <th>id</th>
          <th>image</th>
          <th>name</th>
          <th>price</th>
          <th>quantity</th>
          <th>grand total</th>
          <th>Action</th>
      
        <tbody>
        <?php
        $total_bill=0;
        $select = "SELECT * FROM cart";
        $ex = mysqli_query($connect,$select);
         

        while($row=mysqli_fetch_array($ex)){
          ?>
          <tr>
          <td><?php echo $row['id'];   ?></td>
          <td><img height="100" width="80" src="admin/product_images/<?php echo $row['product_img'];   ?>" alt=""></td>
          <td><?php echo $row['product_ti'];   ?></td>
          <td><?php echo $row['product_price'];   ?></td>
          <td>
          <form action="" method="POST">
            <input name="quantity" max="10" min="0" type="number" value="<?php echo $row['quantity'];   ?>">
            <input type="hidden" name="updateid" value="<?php echo $row['id']; ?>">
            <button type="submit"  class="btn btn-success" name="update">Update</button>
            
          </form>

          </td>
          <td><?php echo $grand_total= ((int)$row['product_price'] * (int)$row['quantity']) ?></td>
          <td><a href="cart.php?removeid=<?php echo $row['id'];  ?>">remove</a></td>
          </tr>



<?php
$total_bill += $grand_total;

?>
<?php }?>  <br><br><br><br><br><br>
              <tr>
                <td><?php  echo "Total Bill:". $total_bill; ?></td>
                <td><a href="cart.php?deleteall=">Delete All</a></td>
                <td><a href="order.php">Order Now</a></td>

              </tr>


     

          
        </tbody>
      </table>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</html>



 