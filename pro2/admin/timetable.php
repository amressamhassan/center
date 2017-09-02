<?php 
 
   include 'include/header.php'; 
    
if(!isset( $_SESSION['emil']))
{
    
  HEADER ("location:../project_SW/");
} 
   
?> 
<?php  
   //include '..\clasess\timetable.php'; 
   $timetable=new timetable;
   $tt=$timetable->show_day("timetable");
  ?> 

  <style type="text/css">

 div.pagination {
  padding: 3px;
  margin: 3px;
}

div.pagination a {
  padding: 2px 5px 2px 5px;
  margin: 2px;
  border: 1px solid #AAAADD;
  
  text-decoration: none; /* no underline */
  color: #000099;
}
div.pagination a:hover, div.pagination a:active {
  border: 1px solid #000099;

  color: #000;
}
div.pagination span.current {
  padding: 2px 5px 2px 5px;
  margin: 2px;
    border: 1px solid #000099;
    
    font-weight: bold;
    background-color: #000099;
    color: #FFF;
  }
  div.pagination span.disabled {
    padding: 2px 5px 2px 5px;
    margin: 2px;
    border: 1px solid #EEE;
  
    color: #DDD;
  }

</style>


<div class="page-title" dir="rtl">
        
        <div class="container">
                  <center>


       
        </div>
        
        </div>
       

<hr />
      
        
        
        <table class="table" dir="rtl">
          <thead>
            <tr >
             <td><h4>تسلسل</h4></td>
            <td><h4>اسم المدرس</h4></td>
                <td><h4>المادة</h4></td>
            <td><h4>اليوم  </h4></td>
             
            <td><h4>الساعة</h4></td>
            <td><h4>القاعة</h4></td>
            
        
            <td><h4>اداره</h4></td>
            </tr>
          </thead>

             <?php

  $i=1;

    while($row = mysql_fetch_array($tt))
    {
       $t=$timetable->show_time_table2($row['ID']);
       {
        if($row['active']==0){
                    ?>
          <tbody>
          <tr>
            <td ><?php echo $i; ?></td>
               
             <?php
                 echo "  <td><a data-toggle='modal' href='#myteacher'>".$t['name']."</a> </td>"
                 ?>
                  <td ><?php echo $t['sub']; ?></td>
            <td><?php echo $t['day'];?></td>
               <td><?php echo $t['Start'];?></td>
            <td><?php echo $t['hall_num'];?></td>
   <?php 
    
                echo "    <td><button type='button' class='btn btn-warning'><a href='active_time.php?id=".$row['ID']."'>تفعيل</a></button>";
         echo "    <button type='button' name='delete' class='btn btn-danger'><a href='delete1.php?id=".$row['ID']."'>حذف</a></button></td>";
         ?>
          </tr>
                <?php 
             $i++;
        }}}
    ?>


  
<?php 
  $tt=$timetable->show_day("timetable");
?>
          </tbody>
        </table>

        
        <table class="table" dir="rtl">
          <thead>
            <tr >
             <td><h4>تسلسل</h4></td>
            <td><h4>اسم المدرس</h4></td>
                <td><h4>المادة</h4></td>
            <td><h4>اليوم  </h4></td>
             
            <td><h4>الساعة</h4></td>
            <td><h4>القاعة</h4></td>
            
        
            <td><h4>اداره</h4></td>
            </tr>
          </thead>

             <?php

  $i=1;

    while($row = mysql_fetch_array($tt))
    {
       $t=$timetable->show_time_table($row['ID']);
       {
        if($row['active']==1){
                    ?>
          <tbody>
          <tr>
            <td ><?php echo $i; ?></td>
               
             <?php
                 echo "  <td><a data-toggle='modal' href='#myteacher'>".$t['name']."</a> </td>"
                 ?>
                  <td ><?php echo $t['sub']; ?></td>
            <td><?php echo $t['day'];?></td>
               <td><?php echo $t['Start'];?></td>
            <td><?php echo $t['hall_num'];?></td>
   <?php 
    
                echo "    <td><button type='button' class='btn btn-warning'><a href='active_time.php?id=".$row['ID']."'>الغاء التفعيل</a></button>";
         echo "    <button type='button' name='delete' class='btn btn-danger'><a href='delete1.php?id=".$row['ID']."'>حذف</a></button></td>";
         ?>
          </tr>
                <?php 
             $i++;
        }}}
    ?>


  
<?php 

?>
          </tbody>
        </table>


 <?php include 'include/footer.php';  ?>