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



if(isset($_POST['submit'])){
		$title = $_POST['title'];
		$des = $_POST['des'];
    $price = $_POST['price'];
    $war = $_POST['war'];
		

		



if(empty($_FILES["file"]["name"]))
{
$prepare = "INSERT INTO product (title,file,des,price,war) VALUES ('$title' ,'','$des','$price','$war')";
		$conn->exec($prepare);
}else{


		$target_dir = "upload/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size

// Allow certain file formats
if($imageFileType != "jpg") {
    echo "Sorry, only jpg files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        echo " ". basename($path =  $_FILES["file"]["name"]). ".";
        echo '<button onclick="window.location="Seller/Add.html""> Completed Get Back To Add Page</button>';
       $prepare = "INSERT INTO product (title,file,des,price,war) VALUES ('$title' ,'upload/$path','$des','$price','$war')";
		$conn->exec($prepare);
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
}

}



?>