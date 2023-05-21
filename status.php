<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

session_start();
   $connection = mysqli_connect("localhost", "root", "root", "LivingWell");
  
$rentalid  =  $_GET["propertyID"] ;
$seekerid  = $_GET["HomeSeekerID"] ;     
$action = $_GET["action"];

if($action==="accept"){
    
   $queryT = " UPDATE rentalapplication SET application_status_id  = '3' WHERE property_id='$rentalid' AND home_seeker_id='$seekerid' ; " ;  
 mysqli_query( $connection, $queryT) ; //accept
 
$queryT2 = " UPDATE rentalapplication SET application_status_id = '2' WHERE property_id = '$rentalid' AND home_seeker_id <> '$seekerid' AND application_status_id <> '2' ; " ;  
 mysqli_query( $connection, $queryT2) ; //decline other application
 

 //echo '<script>alert("This course droped successfully.");</script>';
  //  echo '<script> window.location.href = "' . $_SERVER['HTTP_REFERER'] . '"</script>';
 header('Location:HomeOwner.php');
    exit; 
}

else{
     $queryT = " UPDATE rentalapplication SET application_status_id  = '2' WHERE property_id='$rentalid' AND home_seeker_id='$seekerid' ; " ;  
 mysqli_query( $connection, $queryT) ; //decline this application
 
  //echo '<script>alert("This course droped successfully.");</script>';
  //  echo '<script> window.location.href = "' . $_SERVER['HTTP_REFERER'] . '"</script>';
 header('Location:HomeOwner.php');
    exit; 
}


