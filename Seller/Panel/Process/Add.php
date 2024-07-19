
<?php 
session_start();
if(isset($_SESSION['SELLER_LOGIN'])){
    
    
    $uniqid = $_SESSION['SELLER_LOGIN'];
    
    include_once("Config.php");
include_once("Function.php");

 $uniq = uniqid(rand(), true);
$productid = password_hash($uniq, PASSWORD_BCRYPT);

$img = $_FILES["image"]["name"]; 
$tmp = $_FILES["image"]["tmp_name"] ;
?>
<?php
$valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp' , 'pdf' , 'doc' , 'ppt'); // valid extensions
$path = '../Products/'; // upload directory
if(!empty($_POST['name']) || !empty($_POST['warenty']) || !empty($_POST['price']) || !empty($_POST['des']) || !empty($_POST['nopro']) || $_FILES['image'])
{
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

  elseif ($info['mime'] == 'image/gif') 
    $image = imagecreatefromgif($source);

  elseif ($info['mime'] == 'image/png') 
    $image = imagecreatefrompng($source);

  imagejpeg($image, $destination, $quality);

}
compressImage($_FILES['image']['tmp_name'],$path,60);

try {
$name = E($_POST['name']);
$price = E($_POST['price']);
$cat = E($_POST['cat']);
$warenty = E($_POST['warentyinput']);
$nopro = E($_POST['nopro']);
$des = E($_POST['desc']);
$tags = E($_POST['tags']);
$sth = $conn->prepare("INSERT INTO `products`(`ID`, `Uniqid`, `ProductID`, `ProductName`, `ProductImage`, `ProductCategory`, `ProductPrice`, `ProductWarrenty`, `ProductNo`, `tags`, `Discription`) VALUES ('',?,?,?,?,?,?,?,?,?,?)");
$sth->execute([
    $uniqid,$productid,$name,$final_image,$cat,$price,$warenty,$nopro,$tags,$des
]);
   

}
       
catch(PDOException $e)
    {
    echo $e;
    } 

} 
else 
{
echo 'invalid';
}
}
    
    
}else{
    echo 'Something Went Wrong';
}


?>