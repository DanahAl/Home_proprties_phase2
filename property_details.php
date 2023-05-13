<!DOCTYPE html>
<html>
    <head>
        <title>property-details</title>
        <meta charset="utf-8">
        <link rel="Stylesheet" href="general.css">
        <link rel="Stylesheet" href="property_details.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <!--<link rel="stylesheet" href="General.css">-->
    	<script src="Signup.js"></script>  
                     <script src="logOut.js"></script> 


    </head>

    <body onload="breadcrumb()">
        <header>
            <img src="logo3.png" alt="logo" id="logo">
               <div id="under-header"></div>  
         </header>

 <!--breadcrumb-->
        <ul class="breadcrumb" >
  <li><a href="index.html">Home</a></li>
  <!--  <li id="li-element"><a href="" id ="pageID"></a></li>-->
  <li>property details</li>
   </ul>
 
         <main>
          
          <div id="button">
            <button>Apply</button>
            <button onclick="Edit()">Edit</button>
            <button id="b1" onclick="homepage()">Log out</button>
          </div>

         

            <h2 id="title">Olaya Plaza</h2>

            <div id="PI">
                <br>
                <h4>Property Information : </h4>
                <p>Villa</p>
                <p>5 rooms</p>
                <p>rent 30 000SAR</p>
                <p>maximum 10 tenants</p><br>
                <p> modren villa  with 5 bedrooms , 5 bathroms , basment , pool , 2 living room , kitchen </p>  
                <br> 
            </div>

            
            <div id="images">
               
               <div id="p1" class="pic"> <img src="house3.jpg" alt="villa img"></div>
               <div id="p2" class="pic"> <img src="bedroom.jpg" alt="bedroom img"></div>
               <!--
               <div id="p3" class="pic"> <img src="kitchen.jpg" alt="kitchen img"></div>
               <div id="p4" class="pic"> <img src="pool.jpg" alt="pool img"></div>
               -->
            </div> 


         </main>

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
                <p>@2023 Home Properties</p></div>
        
        </footer>
    </body>
</html>