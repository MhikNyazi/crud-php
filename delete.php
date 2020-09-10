<?php

//connecting database
include('config.php');


if(isset($_GET['id']))
{
    

     $id = $_GET['id'];
     
     

    $query =" delete from users where id = $id ";
    $run = mysqli_query($cn,$query);

    if ($run)
    {
        echo '';
        header("location:index.php");
    }
    else{
         die(" failed: " . mysqli_error($cn));;
    }
}



?>