
<?php
// Start the session
session_start();
?>

<?php

if (!isset($_SESSION['id'])){
     header('Location:login.php');
 
}

$id = $_SESSION['id'];

//$id =2;
?>


<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/ClientSide/html.html to edit this template
-->
<html>
    
         <?php
        
        $connection = mysqli_connect("localhost", "root", "root", "properties_home");
        $error = mysqli_connect_error();
        if ($error != null) {
            echo '<p> Could not connect to the database. </p>';
        }
        
        else{
        //    echo "Connect!!!!!!!!!!";
        }
  
        ?>
    
    <head>
        <title>HomeOwner</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <link rel="stylesheet" href="HomeownerStyle.css"> 
             <script src="logOut.js"></script> 
             	<script src="Signup.js"></script>  


 <link rel="stylesheet" href="general.css">       
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    </head>
    <body>
        <header>

            <img src="logo3.png" alt="logo" id="logo">
            <!-- <h1>Taste of Saudi</h1>-->
            <div id="under-header"></div>
        </header>


        <!--breadcrumb-->
        <ul class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li>Homeowner</li>
        </ul>



        <main>
            <button class="b" onclick="home();">Log-Out</button>
                <?php
                   
                   $HomeOwnerInfo = "SELECT * FROM homeowner WHERE id = '$id' ";
                   
                   $reslutInfo = mysqli_query($connection , $HomeOwnerInfo) ;
                   
                    while ($rows = mysqli_fetch_assoc($reslutInfo)) {

                   ?>
            <div id="owner-info">
                <h1 id="welcome">&nbsp;Welcome <?php echo $rows['name']?>!</h1>
                
               <!-- <h3>&nbsp;Homeowner information</h3>-->
               <div id="infoPre">
                    
                       <pre >
                    Name:<?php echo $rows['name']?><br>
                   Phone number:<?php echo $rows['phone_number']?><br>
                   Email:<?php echo $rows['email_address']?>
                </pre>
                   
                
                   
               </div>
               
               <?php
                    } ?>
             


            <div>
                <!--  <h2 id="Rental-header">Rental Applications</h2> -->
                <table>
                    
                    
                     <?php
            
                 $result1;
    
                 $sql ="SELECT
                 property.name AS property_name,
                 property.location AS property_location,
                 property.id AS property_id,
                 CONCAT(homeseeker.first_name, ' ', Homeseeker.last_name) AS applicant_name,
                 rentalapplication.id AS rental_application_id,
                 rentalapplication.home_seeker_id AS home_seeker_id,
                 applicationstatus.status AS application_status
                 FROM rentalapplication
                 INNER JOIN property ON rentalapplication.property_id = aroperty.id
                 INNER JOIN homeseeker ON rentalapplication.home_seeker_id = homeseeker.id
                 INNER JOIN applicationstatus ON rentalapplication.application_status_id = applicationstatus.id";
                 $result1 =  mysqli_query($connection, $sql);
            ?>
              
                    
                    
                    <caption>Rental Applications</caption>

                    <thead>
                    <th>Property Name</th>
                    <th>Location</th>
                    <th>Applicant</th>
                    <th>Status</th>
                    </thead>

                           <tbody>
                     <?php
                // LOOP TILL END OF DATA
                while($rows= mysqli_fetch_assoc($result1))
                {
            ?>
                    <tr>
                        <td><a class="property-name" href="property_details.php?id= <?php echo $rows['id'];?>">
                            <?php echo $rows['property_name'];?></a></td>
                        <td><?php echo $rows['property_location'];?></td>
                        <td><a class="applicant-name" href="applicant'sInformation.php?id= <?php echo $rows['id'];?>">
                            <?php echo $rows['applicant_name'];?></a></td>
                        <td><?php echo $rows['application_status'];?></td>
                        <td>
                       
                        
                        
                        <a href="status.php?propertyID=<?php echo $rows['property_id'];?>&&HomeSeekerID=<?php echo $rows['homeseeker.id'] ;?> && action='accept'">Accept</a>
                        <a href="status.php?propertyID=<?php echo $rows['property_id'];?>&&HomeSeekerID=<?php echo $rows['homeseeker.id'] ;?> && action='reject'">decline</a>


                        </td>

                </tbody>
                
                    <?php
                    } ?>
                


              <?php
                
                        mysqli_close($connection);

            ?>
            </table>
                
                


                </table>
            </div>
            <div class="select">
            <a class="Add-Property" href="Add_new_property.html">Add Property</a>

            </div>

            <div>
                <table>
                    
                    
                     <?php
            
                $result2;
   
                 $sql2 = $property_query = $property_query = " SELECT propertycategory.id AS category_id,
                       propertycategory.category AS property_category,
                       property.name AS property_name, 
                       property.location AS property_location, 
                       property.rooms AS property_rooms, 
                       property.rent_cost AS property_cost, 
                       property.property_category_id, 
                       property.id
                       FROM propertycategory 
                       JOIN property 
                       FROM property 
                       WHERE id NOT IN (SELECT property_id FROM rentalapplication WHERE application_status_id = 3) AND homeowner_id= $id; " ;
                 $result2 =  mysqli_query($connection, $sql2);
            ?>
                    <caption>Listed Properties</caption>

                    <thead>
                    <th>Property Name</th>
                    <th>Category</th>
                    <th>Rent</th>
                    <th>Rooms</th>
                    <th>Location</th>

                    </thead>

                    <tbody>
                        
                               <tbody>
                     <?php
                // LOOP TILL END OF DATA
                while($rows= mysqli_fetch_assoc($result2))
                {
            ?>
                    <tr>
                        <td><a class="property-name" href="">
                            <?php echo $rows['property_name'];?></a></td>
                        <td><?php echo $rows['property_category'];?></td>
                        <td><?php echo $rows['property_cost'];?></td>
                        <td><?php echo $rows['property_rooms'];?></td>
                        <td><?php echo $rows['property_location'];?></td>
                        <td>
                         <a class="delete" href="">Delete</a>
                        </td>



                    </tbody>
                        <?php
                    } ?>
                         <?php
                
                        mysqli_close($connection);

                        ?>
                </table>


            </div>

        </main>
        <br /><br />

        <footer>
            <div class="foot">

                <div class="w3-xlarge w3-section">
                    <i class="fa fa-facebook-official w3-hover-opacity"></i>
                    <i class="fa fa-instagram w3-hover-opacity"></i>
                    <i class="fa fa-snapchat w3-hover-opacity"></i>
                    <i class="fa fa-pinterest-p w3-hover-opacity"></i>
                    <i class="fa fa-twitter w3-hover-opacity"></i>
                    <i class="fa fa-linkedin w3-hover-opacity"></i>
                </div>
                <p>@2023 Home Properties</p>
            </div>

        </footer>

    </body>
</html>
