<?php 
 include 'include/header.php';  
 
if(!isset( $_SESSION['emil']))
{
	HEADER ("location:../project_SW/");
} 
   
?> 

    
    
<div class="page-title" dir="rtl">
        
        <div class="container">
                  <center>

<h1>قائمة الاعلانات <i class="fa fa-list"></i></h1>
        </center>
        </div>
        </div>
        <table class="table" dir="rtl">
        	<thead>
        		<tr >
        		<td><h4>مسلسل</h4></td>

        		<td><h4>اسم المعلن</h4></td> 
        		<td><h4>موضوع الاعلان</h4></td>
        		<td><h4>صورة الاعلان</h4></td>
        		<td><h4>اداره</h4></td>
        		</tr>
        	</thead>
        	<tbody>
        	<tr>
        		<td >1</td>
                <td >ا/احمد عبدالله</td>
                <td >دروس الاستاذ احمد عبدالله للغة الانجليزية</td>
        		<td><img src="pic2.jpg" width="80%" height="70"/> </td>
  
        		 
                <td>
        			<button type="button" class="btn btn-danger">حذف</button></td>
        	</tr>
			<tr>
        		<td>2</td>
                <td >ا/محمد نبيل</td>
                  <td >دروس كيمياء و فيزياء و غيره مع محمد نبيل</td>
        		<td><img src="pic1.jpg" width="80%" height="70"/></td>
   
        	<td>
                    <button type="button" class="btn btn-danger">حذف</button></td>
        	</tr> 
        	</tbody>
        </table>
          
     <?php include 'include/footer.php';  ?>