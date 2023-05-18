


<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of ApplyRent
 *
 * @author danahiphone
 */


// Start the session
//session_start();


//if (!isset($_SESSION['id']))
//	header('Location:login.php');


//$id = $_SESSION['id'];

$id =2;


        
        $connection = mysqli_connect("localhost", "root", "root", "properties_home");
        $error = mysqli_connect_error();
        if ($error != null) {
            echo '<p> Could not connect to the database. </p>';
        }
        
        else{
           echo "Connect!!!!!!!!!!";
           
           
         if ($_SERVER['REQUEST_METHOD'] == "GET") {
      //  $location = $_POST['location'];
        
                                     
              
                          $pID= $_GET['propertyID'];
           //  $pID = $_GET['property_id'];
            //  $HSid = $_GET['home_seeker_id'];
              $appStatus = 2;
        
        
        $Insertquery = "INSERT INTO rentalapplication (id, property_id, home_seeker_id, application_status_id)
                   VALUES (NULL, '$pID', $id, '$appStatus') ";
                  $result = mysqli_query($connection, $Insertquery);

         
               header("Location: HomeSeeker.php");

    }
        }
  
  
        
        
        /*
$id = $_GET['id'];
$pID = $_GET['property_id'];
$HSid = $_GET['home_seeker_id'];
$appStatus = "Under consideration";


$Insertquery = "INSERT INTO rentalapplication (id, property_id, home_seeker_id, application_status_id)
                   VALUES ('$id', '$pID', '$HSid', '$appStatus') ";
$result = mysqli_query($connection, $Insertquery);
if ($result) {
    mysqli_close($connection);
    header("location: HomeSeeker.php");
    exit();
} else {
    echo "Error deleting record";
}

*/
