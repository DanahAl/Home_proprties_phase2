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



        
        $connection = mysqli_connect("localhost", "root", "root", "home_properties");
        $error = mysqli_connect_error();
        if ($error != null) {
            echo '<p> Could not connect to the database. </p>';
        }
        
        else{
           echo "Connect!!!!!!!!!!";
        }
  
        
$id = $_GET['id'];
$pID = $_GET['property_id'];
$HSid = $_GET['home_seeker_id'];
$appStatus = "Under consideration";


$Insertquery = " INSERT INTO rentalapplication (id, property_id, home_seeker_id, application_status_id)
                   VALUES ('$id', '$pID', '$HSid', '$appStatus') ";
$result = mysqli_query($connection, $Insertquery);
if ($result) {
    mysqli_close($connection);
    header("location: HomeSeeker.php");
    exit();
} else {
    echo "Error deleting record";
}


