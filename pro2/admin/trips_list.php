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

<h1>قائمة الرحلات <a href="trips_form.php" class="btn btn-success lg">اضف نشاط جديد </a> </h1>
        </center>
        </div>
        </div>
        <table class="table" dir="rtl">
        	<thead>
        		<tr >
        		<td><h4>مسلسل</h4></td>

        		<td><h4>مكان الرحلة</h4></td> 
        		<td><h4>صورة الرحلة</h4></td>
        		<td><h4>عدد المشاركين</h4></td>
        		<td><h4>اداره</h4></td>
        		</tr>
        	</thead>
        	<tbody>
        	<tr>
        		<td >1</td>
                <td >الاهرامات</td>
        		<td><img src="pic3.jpg" width="100" height="50"/> </td>
  				<td >120</td>
        		 
                <td>
        			<button type="button" class="btn btn-danger">حذف</button></td>
        	</tr>
			<tr>
        		<td>2</td>
                <td >حديقة الازهر</td>
                	<td><img src="pic4.jpg" width="100" height="50"/></td>
                <td >320</td>
    
        	<td>
                    <button type="button" class="btn btn-danger">حذف</button></td>
        	</tr> 
        	       	<tr>
        		<td >3</td>
                <td >الاهرامات</td>
        		<td><img src="pic3.jpg" width="100" height="50"/> </td>
  				<td >120</td>
        		 
                <td>
        			<button type="button" class="btn btn-danger">حذف</button></td>
        	</tr>
			<tr>
        		<td>4</td>
                <td >حديقة  بونايل</td>
                	<td><img src="pic4.jpg" width="100" height="50"/></td>
                <td >320</td>
    
        	<td>
                    <button type="button" class="btn btn-danger">حذف</button></td>
        	</tr> 
        	</tbody>
        </table>
    </body>
</html>
