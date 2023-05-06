<!DOCTYPE html>

<html>
     <?php
        
        $connection = mysqli_connect("localhost", "root", "root", "home_properties");
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
                <th>Catgory</th>
                <th>Rent</th>
                <th>Status</th>
                </thead>

                <tbody>
                    <tr>
                        <td><a class="property-name" href="property_details.html">Olaya Plaza </a></td>
                        <td>
                            Villa
                        </td>
                        <td>30,000/year</td>
                        <td>Under Consideration</td>
                        <td>
                            <a class="Withdraw" href="">Withdraw</a>

                        </td>

                    </tr>

                    <tr>
                        <td><a class="property-name" href="">AL Nakheel home </a></td>
                        <td>
                            Villa
                        </td>
                        <td>4000/month</td>
                        <td>Under Consideration</td>
                        <td>
                        </td>

                    </tr>

                </tbody>



            </table>
        </div>


        <div>
            <div class="select">

                <label>Search by category:</label>

                <select name="category">
                    <option value="Apartment">Apartment</option>
                    <option value="Villa">Villa</option>
                    <option value="Home">Home</option>
                </select>
            </div>
            <table>
                <?php
                $sql = " SELECT * FROM property ";
                $sql2 = " SELECT propertycategory.id,propertycategory.category, property.name , property.location , property.rooms , property.rent_cost , property.property_category_id 
                      FROM propertycategory 
                      JOIN property 
                      ON propertycategory.id = property.property_category_id " ;
               // $sql_categries = " SELECT * FROM propertycategory WHERE id = property_category_id " ;
                $result = mysqli_query($connection, $sql2);
               // $mysqli->close();
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
                while($rows= mysqli_fetch_assoc($result))
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
                            <a class="Apply" href="">Apply</a>
                        </td>

                        <!--
                    </tr>

                    <tr>
                        <td><a class="property-name" href="">Comfy Home</a></td>
                        <td>Villa</td>
                        <td>7000/month</td>
                        <td>6</td>
                        <td>Riyadh,Al-Aqeeq District</td>

                        <td>
                            <a class="Apply" href="">Apply</a>
                        </td>
                    </tr>

                        -->



                </tbody>


              <?php
                }
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



