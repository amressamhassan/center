<?php 

   include 'include/header.php';  
if(!isset( $_SESSION['emil']))
{
	
HEADER ("location:../project_SW/");
} 
   
?> 

<style type="text/css">

  #registration_form  input,select{
      width: 250px;
      height: 50px;
      padding: 10px;
      margin: 15px;
    }

    </style>
<div class="page-title" dir="rtl">
      
        <div class="container">
                <center>

<h1>اضافه  الدروس بالمركز <i class="fa fa-rebel"></i></h1>
  
        </center>
        </div>
        
    </div><!-- /page-title -->
        
    <div class="h-recent-work">
    <div class="container" dir="rtl"> 
    <div class="row">
        <div class="col-md-12">
        <center>
        <form action="" method="post" id="registration_form">
        <table   width="100%">
            <tr>
                <td>اسم الماده</td>
                <td>
               
          <input type="text"  name="subject_name"    class="form-control"/>
                 </td>
     


                 <tr>
                <td>الستوي الدراسي</td>
                <td> <select  name="type" width="300" style="width: 50%"><!--اليوم-->
                <option value="" selected="selected"> الأعداديه </option>
                 <option value="" selected="selected"> الأعداديه </option>
                  <option value="" selected="selected"> الأعداديه </option>
                   <option value="" selected="selected"> الأعداديه </option><br /> <option value="" selected="selected"> الأعداديه </option>
                    <option value="" selected="selected"> الأعداديه </option>
                    
 

               </select>
               
           </td>
             
 <tr>
                 
 
             
                   
             </table>
                 <br> <br>  
            <div>
                  <center>
                 <input type="submit"  name="submit" value="تسجيل" class="btn btn-success" /> 
                  </center>
            </div>
     </form>
      </center>
        </div>
    </div>      
 
        
        
        
      </div><!-- /container -->
    
        
        </div><!-- /.h-recent-work -->

</div>
        
     <?php include 'include/footer.php';  ?>
    