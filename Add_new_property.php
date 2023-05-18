


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


            <!-- onsubmit="return login()";-->

            <form name="form1" id="formID" action="#" method="POST" enctype="multipart/form-data">
                <fieldset>
                    <legend><h3>Add new property</h3></legend>

                    <label for="propertyname"> Property name:</label><br>
                    <input type="text" id="propertyname" name="name" value="" accesskey="n"><br>

                    <label>Category:</label><br />

                    <select name="category">
                        <option value="2">Apartment</option>
                        <option value="3">Villa</option>
                        <option value="1">Home</option>
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
                    
                    <label for="ImageName"> Image name:</label><br>
                    <input type="text" id="ImageName" name="ImageName" value="" accesskey="n"><br>

                    <label for="img">Upload img:</label><br />
                    <input type="file" id="image" name="image" accept=".jpg, .jpeg, .png"><br />

                    <br />
                    <input class="add" type="submit" value="Add" name="submit">
                </fieldset>
            </form>
            
            
            <?php 
         $connection = mysqli_connect("localhost", "root", "root", "properties_home");
        $error = mysqli_connect_error();
        if ($error != null) {
            echo '<p> Could not connect to the database. </p>';
        }
        
        else{
        //    echo "Connect!!!!!!!!!!";
        }
            
        /*
        $name ="";
        $category="";
        $room =0;
        $rent_cost=0;
        $location="";
        $tenants=0;
        $description="";
        $imgURL="";
        $CatID=0;
          
         */
        
    if($_SERVER['REQUEST_METHOD'] == "POST") {
       
              $name = $_POST["name"];       
              $category = $_POST["category"];
           //   echo $category;
        
                $room = $_POST["room"];
        
                $rent_cost = $_POST["rent"];
        
                $location = $_POST["location"];
        
                  $tenants = $_POST["tenants"];
                  $description = $_POST["description"];
                  
            
                  
               $InsertProperty = "INSERT INTO property (id,homeowner_id, property_category_id, name , rooms ,rent_cost , location , max_tenants,
                 description)
                   VALUES (NULL, 1, '$category', '$name' , '$room' ,'$rent_cost' , '$location' , '$tenants' , '$description')";
            
          // echo $InsertProperty;
              $result1 = mysqli_query($connection, $InsertProperty);
              $last_id_inserted = mysqli_insert_id($connection);
            //  echo $last_id_inserted;
              
              //to insert image
                  
             if(isset($_POST["submit"])){
                      
                      
                $imgName = $_POST["ImageName"];
               if($_FILES["image"]["error"]===4){
                   
                   echo 'Image error!!!!';
               }
               
               else{
                   
                   $fileName = $_FILES["image"]["name"];
                   $fileSize = $_FILES["image"]["size"];
                    $tmpName = $_FILES["image"]["tmp_name"];
                    
                    $validImageExtension = ["jpg" , "jpeg" , "png"];
                    $imageExtension = explode('.' ,$fileName );
                    $imageExtension = strtolower(end($imageExtension));
                   if(!in_array($imageExtension, $validImageExtension)){
                     echo 'Invalid Image';

                   }
                         
                         
                           else if($fileSize>1000000){
                           echo 'Image size is to large!'; }
                           
                           else{
                               
                               $newImageName = uniqid();
                               $newImageName .='.' .$imageExtension;
                               
     move_uploaded_file($tmpName, 'ImgDB/'.$newImageName);
     $InsertImg = "INSERT INTO propertyimage (id,property_id, path)
                   VALUES (NULL,'$last_id_inserted','$newImageName') ";
     mysqli_query($connection, $InsertImg);
     echo 'added';
     
     header('Location:property_details.php');
     exit();
                           }
               }
                  }

               
             

      
    }     
              
              
          //  $result2 = mysqli_query($connection, $InsertImg);

            
            mysqli_close($connection);

            
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
