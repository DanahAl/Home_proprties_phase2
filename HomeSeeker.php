<!DOCTYPE html>

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
    <title>HomeSeekers</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="HomeownerStyle.css">
    <link rel="stylesheet" href="general.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
             <script src="logOut.js"></script> 

             
             
    
    <!--
 <script type="text/javascript">
function thisfunction(){
    var x = new XMLHttpRequest();
    x.open("GET","ApplyRent.inc.php",true);
    x.send();
    return false;
}
</script>
    
    -->
    
    
</head>

<body>
        <header>
        <img src="logo3.png" alt="logo" id="logo">
        <div id="under-header"></div>

    </header>
    
    
     <!--breadcrumb-->
        <ul class="breadcrumb">
  <li><a href="index.html">Home</a></li>
  <li>Home seeker</li>
   </ul>
    
     
    <main>
        <button class="b" onclick="home();">Log-Out</button>

       
            <div id="owner-info">
                <h1 id="welcome">&nbsp;Welcome Sarah!</h1>
                
               <!-- <h3>&nbsp;Homeowner information</h3>-->
               <div id="infoPre">
                       <pre >
                   name:Deemma Ahmad
                   Phone number:996 545 5552
                   Email: sarah@gmail.com
                </pre>
                   
               </div>
             
            </div>
            <!--  <h2 id="Rental-header">Rental Applications</h2> -->
            <table>
                <caption>Requested  Home</caption>

                <thead>
                <th>Property Name</th>
                <th>Category</th>
                <th>Rent</th>
                <th>Status</th>
                </thead>

                <!--DELETE FROM Customers WHERE CustomerName='Alfreds Futterkiste';-->
                
                
                
             
                
                
                
                <?php
                
                 $rentalQuery=" SELECT rentalapplication.id , property.id , property.rent_cost , property.name , propertycategory.id , propertycategory.category , applicationstatus.id , applicationstatus.status
FROM rentalapplication
JOIN property
ON rentalapplication.id = property.id
JOIN propertycategory
ON propertycategory.id = property.id
JOIN applicationstatus
ON applicationstatus.id = rentalapplication.application_status_id ";
   
                
           

            $result1 = mysqli_query($connection, $rentalQuery);
                
                
           // if (mysqli_num_rows($result1) > 0) {
            
                ?>
                 
                
                <tbody>
                    
                    <?php 
                    
                    
                  while ($rows = mysqli_fetch_assoc($result1)) {
?>
                    <tr>
                        <td><a class="property-name" href="property_details.html"> <?php echo $rows['name'];?></a></td>
                        <td>
                            <?php echo $rows['category'];?>
                        </td>
                        <td><?php echo $rows['rent_cost'];?></td>
                        <td><?php echo $rows['status'];?></td>
                        

                    </tr>

                   
             
                </tbody>
      <?php 
              }
                   
                   ?>



            </table>
        </div>


        <div>
            <div class="select">

                <label>Search by category:</label>

                
                <form method="POST">

                <select name="category">
                  <?php
                $sql = "SELECT * FROM propertycategory";
                $result = mysqli_query($connection, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo ' <option value="' . $row['id'] . '">' . $row['category'] . '</option>';
                }
                ?>
                </select>
                 <button type = "submit">Search</button>

                </form>
            </div>
            
       
            <table>
                
                     <?php
            
            $resultFin;
             if($_SERVER['REQUEST_METHOD'] == "POST") {
                 
                 $Property_CAT = $_POST['category'];
                 $sqlQueryCat = " SELECT propertycategory.id,propertycategory.category, property.name , property.location , property.rooms , property.rent_cost , property.property_category_id 
                      FROM propertycategory 
                      JOIN property 
                      ON propertycategory.id = property.property_category_id
                      WHERE propertycategory.id = ".$Property_CAT;
                 $resultFin =  mysqli_query($connection, $sqlQueryCat);
                 
             }
             
             else {
                 
                 $sql2 = " SELECT propertycategory.id,propertycategory.category, property.name , property.location , property.rooms , property.rent_cost , property.property_category_id 
                      FROM propertycategory 
                      JOIN property 
                      ON propertycategory.id = property.property_category_id " ;
                            $resultFin= mysqli_query($connection, $sql2);
                 
             }
             

   
          
            
            ?>
              
                <caption>Home for rent</caption>

                <thead>
                <th>Property Name</th>
                <th>Category</th>
                <th>Rent</th>
                <th>Rooms</th>
                <th>Location</th>

                </thead>

                <tbody>
                     <?php
                // LOOP TILL END OF DATA
                while($rows= mysqli_fetch_assoc($resultFin))
                {
            ?>
                    <tr>
                        <td><a class="property-name" href="">
                            <?php echo $rows['name'];?></a></td>
                        <td><?php echo $rows['category'];?></td>
                        <td><?php echo $rows['rent_cost'];?></td>
                        <td><?php echo $rows['rooms'];?></td>
                        <td><?php echo $rows['location'];?></td>

                        <td>
                        <!--  <a class="Apply" href="#" onclick="thisfunction()">Apply </a> -->
                        
                        <!--
                        <form action="ApplyRent.inc.php" method="get">
                            
                            <input type="submit" name="ApplyButtonName" id="ApplyButtonID" value="Apply">
                        </form>
                        
                        
                        -->
                        
                        
                        <a href="ApplyRent.inc.php?propertyID=<?php echo $rows['id'];?>">Apply</a>


                        </td>

                     



                </tbody>


              <?php
                }
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



