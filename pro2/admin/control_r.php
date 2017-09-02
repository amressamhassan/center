<?php 
  
   include 'include/header.php';  
if(!isset( $_SESSION['emil']))
{
	
HEADER ("location:../project_SW/");
} 


    $control=new control;
    $admin=new admin;

      $type1=md5(1);
      $type2=md5(2);
      $idd=@$_GET['id'];
$name;
$val;
     
      $a=$amr->show_day("hall");

if(isset($_POST['add']))
{
 $control->set_name($_POST['name']);
 $control->set_value($_POST['value']);
 if($admin->add_hall($control))
 {
 echo " <script>alert('تم اضافة قاعة جدسد مبروك')</script>" ;

 }
 else
 	 {
 echo " <script>alert('خطاء لم يتم اضافة القاعة')</script>" ;

 }
}
if(isset($_POST['edit']))
{
 $control->set_name($_POST['name']);
 $control->set_value($_POST['value']);
 if($admin->update_hall($control,$_POST['id']))
 {
 echo " <script>alert('تم التعديل بنجاح')</script>" ;

 }

  else
 	 {
 echo " <script>alert('حطاء حدث فى تعديل القاعة')</script>" ;

 }
}

?> 
        <CENTER>
        <table width="100%" border="5" >
<tbody>
<tr>

<th>القاعة </th>

<th>قيمة الحجز</th>

<th>حذف</th>
<th>تعديل</th>

</tr>
<?php 
while ($row=mysql_fetch_array($a)){
		if (!($idd==$row['id'])) 
		{
		
		
	  ?>
	  
<tr>

<td><?php  echo  $row['hall_num']."<br>";  ?></td>
<td><?php  echo  $row['vales']."جنية<br>";  ?></td>
<td><a href="control_r.php?id=<?php echo $row['id'];?>
&&type=<?php echo md5(1);?>" ><span> حذف</span></a></td>
<td><a href="control_r.php?id=<?php echo $row['id'];?>
&&type=<?php echo md5(2);?>" ><span>تعديل </span></a></td>
</tr>
</tbody>
<?php  }
else{

$name=$row['hall_num'];
$val= $row['vales'];
}

}?>
</table>	

<?php
if (@$_GET['type']==$type1) {
if($admin->delete_hall($control,$idd))
 {
 echo " <script>alert('تم الحذذف بنجاح')</script>" ;

 }

  else
 	 {
 echo " <script>alert('خطاء فى الحذف')</script>" ;

 }
}
if (@$_GET['type']==$type2) {

?>
 <form action="" method="post">
      
       
        <fieldset>
          <legend><span class="number"></span>اضافة قاعة</legend>
           </fieldset>
 <fieldset>
          
          <label for="mail">اسم القاعة</label>
          <input type="text"  value="<?php echo $name;?>" name="name">
         
         
           
          <label for="password">قيمة القاعة</label>
          <input type="text"  value="<?php echo $val;?>" name="value">
            <input type="hidden" name="id" value="<?php echo $idd; ?>"  />
         </fieldset>
      
        <div id="loginform">
        	   <input type="submit" name="edit" id="login" value="تعديل ">
        </div>
        
                   </fieldset>
           
      </form> 



	<?php
}
else{
?>

 <form action="" method="post">
      
       
        <fieldset>
          <legend><span class="number"></span>اضافة قاعة</legend>
           </fieldset>
 <fieldset>
          
          <label for="mail">اسم القاعة</label>
          <input type="text" name="name">
         
         
           
          <label for="password">قيمة القاعة</label>
          <input type="text" id="password" name="value">
          
         </fieldset>
      
        <div id="loginform">
        	   <input type="submit" name="add" id="login" value="اضافة ">
        </div>
        
                   </fieldset>
           
      </form> 
      <?php
      }?>
        </CENTER>
    </div><!-- /page-title -->
     
 
        
 <?php include 'include/footer.php';  ?>
   