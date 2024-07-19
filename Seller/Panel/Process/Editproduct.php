<?php 
session_start();
if(isset($_SESSION['SELLER_LOGIN'])){
    
    
    $uniqid = $_SESSION['SELLER_LOGIN'];
    
    include_once("Config.php");
include_once("Function.php");

 $uniq = uniqid(rand(), true);
$productid = password_hash($uniq, PASSWORD_BCRYPT);


?>
<?php
$valid_extensions = array('jpeg', 'jpg', 'png'); 
$path = '../Products/'; // upload directory
if(!empty($_POST['name']) || !empty($_POST['ProductID']) || !empty($_POST['warenty']) || !empty($_POST['price']) || !empty($_POST['des']) || !empty($_POST['nopro']))
{
  if($_FILES['image']['error'] > 0) { 
        
       
        
$name = E($_POST['name']);
    $ProductID = E($_POST['ProductID']);
$price = E($_POST['price']);
$warenty = E($_POST['warenty']);
$nopro = E($_POST['nopro']);
$des = E($_POST['des']);
      $tags = E($_POST['tags']);
      
      echo $tags;
       
$sttt = $conn->prepare("UPDATE `products` SET ProductName = ? , ProductPrice = ? , ProductWarrenty = ? , ProductNo = ? , tags = ? , Discription = ? WHERE ProductID = ?");
$sttt->execute([
    $name,$price,$warenty,$nopro,$tags,$des,$ProductID
]);

        
    }else{
          
       
$img = $_FILES['image']['name'];
$tmp = $_FILES['image']['tmp_name'];
// get uploaded file's extension
$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
// can upload same image using rand function
$final_image = rand(1000,1000000).$img;

// check's valid format
if(in_array($ext, $valid_extensions)) 
{ 
$path = $path.strtolower($final_image); 
    
   
    function compressImage($source, $destination, $quality) {

  $info = getimagesize($source);

  if ($info['mime'] == 'image/jpeg') 
    $image = imagecreatefromjpeg($source);


  elseif ($info['mime'] == 'image/png') 
    $image = imagecreatefrompng($source);

  imagejpeg($image, $destination, $quality);

}
compressImage($_FILES['image']['tmp_name'],$path,60);


$name = E($_POST['name']);
    $ProductID = E($_POST['ProductID']);
$price = E($_POST['price']);
$warenty = E($_POST['warenty']);
$nopro = E($_POST['nopro']);
$des = E($_POST['des']);
$sth = $conn->prepare("UPDATE `products` SET ProductName = ? , ProductImage = ? , ProductPrice = ? , ProductWarrenty = ? , ProductNo = ? , Discription = ? WHERE ProductID = ?");
   
$sth->execute([
   $name,$final_image,$price,$warenty,$nopro,$des,$ProductID
]);

}


else 
{
echo 'invalid';
}}
    
     
       }else{
          echo 'Something Went Wrong';
    }
    
}else{
    echo 'Something Went Wrong';
}


?>
