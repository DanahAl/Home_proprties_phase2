<!DOCTYPE html>
<html>    
<head>
    <title>Add-new-property</title>
	<meta charset="utf-8">
	<link rel="Stylesheet" href="general.css">
	<link rel="stylesheet" href="add_proprity.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!--<link rel="stylesheet" href="General.css">-->
	<script src="Signup.js"></script>  

</head>

<body>
<header>
   <img src="logo3.png" alt="logo" id="logo">
      <div id="under-header"></div>  
</header>

      <!--breadcrumb-->
        <ul class="breadcrumb">
  <li><a href="index.html">Home</a></li>
    <li><a href="HomeOwner.html">Homeowner</a></li>

  <li>Add-property</li>
   </ul>

        <main>



            <form name="form1" id="formID" action="property_details.php" method="POST" onsubmit="return login();">
                <fieldset>
                    <legend><h3>Add new property</h3></legend>

                    <label for="propertyname"> Property name:</label><br>
                    <input type="text" id="propertyname" name="name" value="" accesskey="n"><br>

                    <label>Category:</label><br />

                    <select name="category">
                        <option value="Apartment">Apartment</option>
                        <option value="Villa">Villa</option>
                        <option value="Home">Home</option>
                    </select> <br />

                    <label for="numbe rooms">Number of rooms:</label><br>
                    <input type="number" id="room" name="room" accesskey="d"><br>

                    <label for="Rent">Rent:</label><br>
                    <input type="number" id="rent" name="rent" accesskey="i"><br>

                    <label for="location"> Location:</label><br>
                    <input type="text" id="location" name="location" value="" accesskey="j"><br>

                    <label for="tenants">Max number of tenants:</label><br>
                    <input type="number" id="tenants" name="tenants" accesskey="i"><br>

                    <label for="description">Description:</label><br>
                    <textarea name="description" id="description" placeholder="Write description about the property"></textarea><br />

                    <label for="img">Upload img:</label><br />
                    <input type="file" id="img" name="img"><br />

                    <br />
                    <input class="add" type="submit" value="Add">
                </fieldset>
            </form>
            
            
            <?php
            
         $connection = mysqli_connect("localhost", "root", "root", "properties_home");
        $error = mysqli_connect_error();
        if ($error != null) {
            echo '<p> Could not connect to the database. </p>';
        }
        
        else{
            echo "Connect!!!!!!!!!!";
        }
            
        $name ="";
        $category="";
        $room =0;
        $rent_cost=0;
        $location="";
        $tenants=0;
        $description="";
        $imgURL="";
        $CatID=0;
        
    if($_SERVER['REQUEST_METHOD'] == "POST") {
                 $name = $_POST["name"];
        
          //  if(isset($_POST["category"])){
                
              $category = $_POST["category"];
              $CatID = " SELECT id FROM propertycategory
                      WHERE category = ".$category;
              
              
             
                             
          //  }        
        
          //   if(isset($_POST["room"]))
                $room = $_POST["room"];
        
                if(isset($_POST["rent"]))
                $rent_cost = $_POST["rent"];
        
       //    if(isset($_POST["location"]))
                $location = $_POST["location"];
        
        //    if(isset($_POST["tenants"]))
                  $tenants = $_POST["tenants"];
            
            
        //    if(isset($_POST["description"]))
                  $description = $_POST["description"];
            
         //    if(isset($_POST["img"]))
                  $imgURL = $_POST["img"];
      
    }     
             $InsertProperty = "INSERT INTO property (id, homeowner_id, property_category_id, name , rooms ,rent_cost , location , max_tenants,
                 description)
                   VALUES (NULL, '1', '$CatID', '$name' , '$room' ,'$rent_cost' , '$location' , '$tenants' , '$description') ";
            
             // $InsertImg = "INSERT INTO propertyimage (id,property_id, path)
             //      VALUES (NULL,, '$imgURL') ";
              
            $result1 = mysqli_query($connection, $InsertProperty);
          //  $result2 = mysqli_query($connection, $InsertImg);

            
    
            
            ?>
           

        </main>
    <br /><br /><br />
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
