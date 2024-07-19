<?php

session_start();

if(isset($_SESSION['USERS_LOGIN'])){
    
    session_destroy();
    
    echo '<script>window.location = "../index";</script>';
    
}else{
    
    echo '<script>window.location = "../Login";</script>';
    
}


?>