 <?php
$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=binokio", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>
<?php

    $stmt = $conn->prepare("SELECT * FROM products"); 
    $stmt->execute();
while ($row = $stmt->fetch()) {


 ?>
 
 <a id="smallcrd" href="Product.html?id=<?php echo $row['ProductID']; ?>">
            <div class="smallcatcard">

                <img align="left" src="<?php echo $row['ProductImage']; ?>" alt="">

              <h4><?php echo $row['ProductName']; ?></h4>
              <h5>Price -</h5><br><p id="actual-price">&#x20B9;<?php echo $row['ProductPrice']; ?></p>
            </div>
          </a>
          
 <a id="bidcrd" href="Product.html?id=<?php echo $row['ProductID']; ?>">
           <div class="card catcard">
       <center>
           <div class="image-container-card">
             <img src="<?php echo $row['ProductImage']; ?>" alt="">
           </div>
       </center>
       <div>
         <h3><?php echo $row['ProductName']; ?></h3>
       </div>

       <div class="card-foot">

       <h5>Price -</h5><p>&#x20B9;<?php echo $row['ProductPrice']; ?></p>

       </div>
       <center><button class="special">Buy</button></center>
    </div>
       </a>


<?php }?>

<style>
    a#smallcrd{
        display: none;
    }
    .smallcatcard{
        display:none;
    }
    h3{
      padding:10px;
    }
    @media(max-width: 790px)
    {
        a#bigcrd
        {
            display:none;
        }
        .catcard
        {
            display: none;
        }
          .smallcatcard{
        display:block !important;
    }
         a#smallcrd{
        display: block !important;
    }
    }
</style>