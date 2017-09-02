  <?php 
 include 'include/header.php';  
if(!isset( $_SESSION['emil']))
{
	
HEADER ("location:../project_SW/");
} 
   
?> 

    
    <div class="page-title" dir="rtl">
    	
        <div class="container">
        	<center><h1>اضافة اعلان <i class="fa fa-list"></i></h1></center>
        </div>
        
    </div><!-- /page-title -->
         <br>
        <center>
  			<div class="container" >       
         
        <form  class="sitting" method="" action="index.html">

       <input type="text"placeholder="اسم المعلن" class="form-control" /><br>
           <input type="text"placeholder="وصف الاعلان" class="form-control" /><br>
      <label class="input-lg">ارفع صورة الاعلان</label> <input type="file" ></input><br><br>


		<center><button class="btn btn-lg btn-primary" type="submit">اضف اعلان</button></center>
         </form>

         
    	</div><!-- /container -->
    </center>
       
        </div><!-- /.h-recent-work -->
        
     <?php include 'include/footer.php';  ?>
    