   <?php include 'include/header.php'; ?>
   <?php include '../clasess/trips.php';?>
   <?php        $trips = new trips;
 
    ?>
    
          <?php 
          	if (isset($_POST['submit'])){
          		
	 $trips->add();
	 
	 	  // header('Location:index.php');
	 }
	        ?>

    <div class="page-title" dir="rtl">
        <div class="container">
        	<center><h1>الرحلات <i class="fa fa-list"></i></h1></center>
        </div>
        
    </div><!-- /page-title -->
         <br>
        <center>
  			<div class="container">       
        <form  class="sitting" method="POST" action="" enctype="multipart/form-data">
        	<label class="input-lg">العنوان</label>
        	<input type="text" placeholder="العنوان" class="form-control" type="submit" name="Title"/><br>
        	<h3>اختر اسم الرحلة</h3>
        	<?php $result= $trips->show_places(); 
        	echo "<select  name='place' width='300' style='width: 50%'> <option selected value=''>اسم الرحلة</option>";
	while($row=mysql_fetch_array($result)){
          $place  = $row['place'];
		  $ID=$row['id'];
          echo "<option value='$ID'>$place</option>";
	  }
		echo  "</select><br><br>";
        	?> 
        	<h3>ان لم تكن الرحلة موجودة فاكتبها هنا بدون اختيار</h3>
      		<input type="text" placeholder="مكان الرحلة" class="form-control" type="submit" name="inputplace"/><br>
            <label class="input-lg">ارفع صورة الرحلة</label>
            <input type="file" name="image" /><br><br>
			<label class="input-lg">تبدأ فى:</label><br>
			<select  name="start_month" width="300" style="width: 50%">
                 <option selected value="">الشهر
                                       </option>
                  <option value="1">1
                        </option>
                         <option value="2">2
                        </option>
                         <option value="3">3
                        </option>
                         <option value="4">4
                        </option>
                         <option value="5">5
                        </option>
                         <option value="6">6
                        </option>
                        <option value="7">7
                        </option>
                         <option value="8">8
                        </option>
                         <option value="9">9
                        </option>
                         <option value="10">10
                        </option>
                         <option value="11">11
                        </option>
                         <option value="12">12 
                        </option>
               </select><br><br>
			<select  name="start_day" width="300" style="width: 50%">
                 <option selected value="">اليوم
                                       </option>
                  <option value="1">1
                        </option>
                         <option value="2">2
                        </option>
                         <option value="3">3
                        </option>
                         <option value="4">4
                        </option>
                         <option value="5">5
                        </option>
                         <option value="6">6
                        </option>
                        <option value="7">7
                        </option>
                         <option value="8">8
                        </option>
                         <option value="9">9
                        </option>
                         <option value="10">10
                        </option>
                         <option value="11">11
                        </option>
                         <option value="12">12 
                        </option>
                         <option value="13">13
                        </option>
                         <option value="14">14
                        </option>
                        <option value="15">15
                        </option>
                        <option value="16">16
                        </option>
                        <option value="17">17
                        </option>
                        <option value="18">18
                        </option>
                         <option value="19">19
                        </option>
                         <option value="20">20
                        </option>
                         <option value="21">21
                        </option>
                         <option value="22">22
                        </option>
                         <option value="23">23
                        </option>
                        <option value="24">24
                        </option>
                        <option value="25">25
                        </option>
                        <option value="26">26
                        </option>
                        <option value="27">27
                        </option>
                         <option value="30">28
                        </option>
                         <option value="31">29
                        </option>
                        <option value="30">30
                        </option>
                         <option value="31">31
                        </option>
                         
               </select><br><br>
			<label class="input-lg">تنتهى فى:</label><br>
			<select name="end_month" width="300" style="width: 50%">
                 <option selected value="">الشهر
                                       </option>
                  <option value="1">1
                        </option>
                         <option value="2">2
                        </option>
                         <option value="3">3
                        </option>
                         <option value="4">4
                        </option>
                         <option value="5">5
                        </option>
                         <option value="6">6
                        </option>
                        <option value="7">7
                        </option>
                         <option value="8">8
                        </option>
                         <option value="9">9
                        </option>
                         <option value="10">10
                        </option>
                         <option value="11">11
                        </option>
                         <option value="12">12 
                        </option>
               </select>
			<br><br><select  name="end_day" width="300" style="width: 50%">
                 <option selected value="">اليوم
                                       </option>
                  <option value="1">1
                        </option>
                         <option value="2">2
                        </option>
                         <option value="3">3
                        </option>
                         <option value="4">4
                        </option>
                         <option value="5">5
                        </option>
                         <option value="6">6
                        </option>
                        <option value="7">7
                        </option>
                         <option value="8">8
                        </option>
                         <option value="9">9
                        </option>
                         <option value="10">10
                        </option>
                         <option value="11">11
                        </option>
                         <option value="12">12 
                        </option>
                         <option value="13">13
                        </option>
                         <option value="14">14
                        </option>
                        <option value="15">15
                        </option>
                        <option value="16">16
                        </option>
                        <option value="17">17
                        </option>
                        <option value="18">18
                        </option>
                         <option value="19">19
                        </option>
                         <option value="20">20
                        </option>
                         <option value="21">21
                        </option>
                         <option value="22">22
                        </option>
                         <option value="23">23
                        </option>
                        <option value="24">24
                        </option>
                        <option value="25">25
                        </option>
                        <option value="26">26
                        </option>
                        <option value="27">27
                        </option>
                         <option value="30">28
                        </option>
                         <option value="31">29
                        </option>
                        <option value="30">30
                        </option>
                         <option value="31">31
                        </option>
                         
               </select><br><br>
               	<label class="input-lg">وصف عن الرحلة</label><br>
			<br><br><textarea name="description" rows="8" cols="40"></textarea><br><br>
			<center>
				<input class="btn btn-lg btn-primary" type="submit" name="submit" value="اضف رحلة جديدة"/>
				</center>
         </form>

         
    	</div>
    </center>
 
     <?php include 'include/footer.php';  ?>
    