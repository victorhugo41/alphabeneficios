<?php 
    if(isset($_GET['m'])){
        $modo=$_GET['m'] ;
        if($modo=="sair" ){
            session_destroy(); 
            header("location:../../");
        }else{
            session_destroy(); 
            header("location:../../login.php");
        }
    }
    
   
?>