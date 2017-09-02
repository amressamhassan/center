   <?php include 'include/header.php';  ?>
   <?php include '../clasess/trips.php';?>
    
<div class="page-title" dir="rtl">
        
        <div class="container">
                  <center>

<h1>قائمة الرحلات <a href="Trips-Form.php" class="btn btn-success lg">اضف نشاط جديد </a> </h1>
        </center>
        </div>
        </div>
        <table class="table" dir="rtl">
        	<thead>
        		<tr>
        		<td><h4>مسلسل</h4></td>
        		<td><h4>مكان الرحلة</h4></td> 
        		<td><h4>صورة الرحلة</h4></td>
        		<td><h4>تبدأ فى</h4></td>
        		<td><h4>تنتهى فى</h4></td>
        		<td><h4>وصف الرحلة</h4></td>
        		<td><h4>اداره</h4></td>
        		</tr>
        	</thead>
        	<tbody>
   
       <?php
	       $trips = new trips;
		 
	   	 $show=  $trips->show();
		 while($row=mysql_fetch_array($show)){
           $place  =$row['place'];
		     $Desc = $row['Description'];
            $ID=$row['id'];
		$start_day=$row['start_day'];
		//  $start_month=$row['start_month'];
		$end_day=$row['end_day'];
		 // $end_month=$row['end_month'];
     	//  $img =  $row['img'];
  
  	echo "<tr><td>" . $ID. "</td>";
   	echo "<td>"  .$place . "</td>";
	echo '<td><img src="genericpic.jpg" width="150"/></td>';
   	echo "<td>" . $start_day. "/"./*$start_month*/"</td>";
   	echo "<td>" . $end_day. "/"./*$end_month*/"</td>";
	echo "<td>"  .$Desc . "</td>";
  	echo "<td width='16%'><a class='btn btn-lg btn-danger' type='submit' name='delete' href='delete_trip.php?id=".$ID."' />حذف
  	<a class='btn btn-lg btn-success' type='submit' name='delete' href='Trips-Update.php?id=".$ID."' />تعديل</td></tr>";
	  
	  }
		?>
        	
        	</tbody>
        </table>
    </body>
</html>
