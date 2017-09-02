<?php 
 
   include 'include/header.php'; 
    
if(!isset( $_SESSION['emil']))
{
    
  HEADER ("location:../project_SW/");
} 
   
?> 
<?php  
   include '../clasess/teacher.php'; 
   $teacher=new teacher;
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
<h3>قائمة المعلمين بالمركز  </i> <a href="teacher_registration.php" class="btn btn-success lg">اضف معلم جديد </a></h3>

       
        </div>
        
        </div>
       
        <label>عرض في الصفحه الواحده</label>
<select id="chose" name="chose" onchange="myFunction()">
	
	 
	<option checked value="10" >10</option>
	<option   value="50" >50</option>
	<option   value="70" >70</option>
	<option   value="100" >100</option>
</select>

<form action="#" method="post" style="width: 30%; float: left; margin: 15px;">
	<input type="text" placeholder="كود المعلم للبحث السريع"    class="form-control" name="search" />
	 
	
</form>
<hr />
      
        
        
        <table class="table" dir="rtl">
        	<thead>
        		<tr >
        		<td><h4>مسلسل</h4></td>
                <td><h4>كود المدرس</h4></td>
        		<td><h4>اسم المدرس</h4></td>
        		 
        		<td><h4>البريد الإليكتروني</h4></td>
        		<td><h4>التلفون الشخصي</h4></td>
            
        
        		<td><h4>اداره</h4></td>
        		</tr>
        	</thead>

             <?php

  $tbl_name="teacher";    
  $adjacents = 3;
  
  $total_pages = $teacher->count(2);
  
  $targetpage = "teacher_list.php";  
  $limit = 2;          
  if( isset( $_GET['page'])) {
    $page = $_GET['page']; 
} 
else{
  $page=0;
}
  if($page) 
    $start = ($page - 1) * $limit;     
  else
    $start = 0;             

 $result=$teacher->show_teacher($start,$limit);
  
  if ($page == 0) $page = 1;      
  $prev = $page - 1;             
  $next = $page + 1;             
  $lastpage = ceil($total_pages/$limit);    
  $lpm1 = $lastpage - 1;         
  
  $pagination = "";
  if($lastpage > 1)
  { 
    $pagination .= "<div class=\"pagination\">";
    
    if ($page > 1) 
      $pagination.= "<a href=\"$targetpage?page=$prev\">» previous</a>";
    else
      $pagination.= "<span class=\"disabled\">» previous</span>"; 
    
    //pages 
    if ($lastpage < 7 + ($adjacents * 2)) 
    { 
      for ($counter = 1; $counter <= $lastpage; $counter++)
      {
        if ($counter == $page)
          $pagination.= "<span class=\"current\">$counter</span>";
        else
          $pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";         
      }
    }
    elseif($lastpage > 5 + ($adjacents * 2))  //enough pages to hide some
    {
      //close to beginning; only hide later pages
      if($page < 1 + ($adjacents * 2))    
      {
        for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
        {
          if ($counter == $page)
            $pagination.= "<span class=\"current\">$counter</span>";
          else
            $pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";         
        }
        $pagination.= "...";
        $pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
        $pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";   
      }
      //in middle; hide some front and some back
      elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
      {
        $pagination.= "<a href=\"$targetpage?page=1\">1</a>";
        $pagination.= "<a href=\"$targetpage?page=2\">2</a>";
        $pagination.= "...";
        for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
        {
          if ($counter == $page)
            $pagination.= "<span class=\"current\">$counter</span>";
          else
            $pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";         
        }
        $pagination.= "...";
        $pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
        $pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";   
      }
      //close to end; only hide early pages
      else
      {
        $pagination.= "<a href=\"$targetpage?page=1\">1</a>";
        $pagination.= "<a href=\"$targetpage?page=2\">2</a>";
        $pagination.= "...";
        for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
        {
          if ($counter == $page)
            $pagination.= "<span class=\"current\">$counter</span>";
          else
            $pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";         
        }
      }
    }
    
    //next button
    if ($page < $counter - 1) 
      $pagination.= "<a href=\"$targetpage?page=$next\">next «</a>";
    else
      $pagination.= "<span class=\"disabled\">next «</span>";
    $pagination.= "</div>\n";   
  }
  $i=1;
    while($row = mysql_fetch_array($result))
    {

                    ?>
        	<tbody>
        	<tr>
        		<td ><?php echo $i; ?></td>
                <td ><?php echo $row['id']; ?></td>
        		 <?php
                 echo "  <td><a data-toggle='modal' href='#myteacher'>".$row['name']."</a> </td>"
                 ?>
        		<td><?php echo $row['email'];?></td>
        		<td><?php echo $row['phone'];?></td>
	 <?php 
    echo "<td>";
    if($row['active']==0){
     
echo "<button type='button' class='btn btn-warning'><a href='teacher_update.php?id=".$row['id']."'>تفعيل</a></button>";
       }
       else 
       {
        echo "<button type='button' >مفعل</a></button>";

       }
       echo "<button type='button' name='delete' class='btn btn-danger'><a href='delete1.php?id=".$row['id']."'>حذف</a></button></td>";
         ?>
        	</tr>
                <?php 
             $i++;
        }
    ?>


<?=$pagination?>
  
<?php 
 //$teacher->conn_close();
?>
        	</tbody>
        </table>


 <?php include 'include/footer.php';  ?>