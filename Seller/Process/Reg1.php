
<?php 

include_once("Config.php");
include_once("Function.php");
session_start();


$uniqid = md5(uniqid(rand(), true));
$img = $_FILES["image"]["name"]; 
$tmp = $_FILES["image"]["tmp_name"] ;
?>
<?php
$valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp' , 'pdf' , 'doc' , 'ppt'); // valid extensions
$path = '../Uploads/'; // upload directory
if(!empty($_POST['name']) || !empty($_POST['email']) || $_FILES['image'])
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
if(move_uploaded_file($tmp,$path)) 
{
try {
$name = E($_POST['name']);
$email = E($_POST['email']);
$shopname = E($_POST['shopname']);
$phone = E($_POST['phone']);
$shopaddress = E($_POST['shopaddress']);
$homeaddress = E($_POST['selleraddress']);
$sth = $conn->prepare("INSERT INTO `seller-details`(`ID`, `Uniqid`, `Name`, `SellerImage`, `ShopName`, `Email`, `Phone`, `ShopAddress`, `HomeAddress`) VALUES ('' , '$uniqid' , '$name' , '$path' , '$shopname' , '$email' , '$phone' , '$shopaddress' , '$homeaddress')");
$sth->execute();
    $_SESSION['registering'] = $uniqid;
    echo '1';
}
       
catch(PDOException $e)
    {
    echo "";
    } 
}
} 
else 
{
echo 'invalid';
}
}
?>