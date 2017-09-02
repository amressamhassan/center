<?//php header('Location: Trips.php'); ?>
   <?php include 'include/header.php';  ?>
   <?php include '../clasess/trips.php';?>
    
    
<div class="page-title" dir="rtl">
        
        <div class="container">
                  <center></center>
        </div>
        </div>
        <?php 
	       $trips = new trips;
		      $trips->connect();
	   	   $trips->delete();
         ?>
         <?php
          header('Location: Trips.php');
          ?>
    </body>
</html>
