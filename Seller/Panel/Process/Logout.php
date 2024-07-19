<?php
session_start();
    if(isset($_SESSION['SELLER_LOGIN'])){
        
    session_destroy();    
        
    }else{
        
    }

?>