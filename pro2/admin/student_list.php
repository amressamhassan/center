<?php 

   include 'include/header.php';
if(!isset( $_SESSION['emil']))
{
	
	HEADER ("location:../project_SW/");
} 
  ?>

  <?php  
   include '../clasess/student.php'; 
   $student=new student;
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

<h3>قائمة الطلاب بالمركز  </i> <a href="student_sm.php" class="btn btn-success lg">اضف طالب جديد  <i class="fa fa-plus"></i></a> </h3>
 
        </center>
        </div>
        
        </div>
        <label>عرض في الصفحه الواحده</label>
<select name="">
	 
	<option checked value="10" >10</option>
	<option   value="50" >50</option>
	<option   value="70" >70</option>
	<option   value="100" >100</option>
</select>
<form action="#" method="post" style="width: 30%; float: left; margin: 15px;">
	<input type="text" placeholder="كود الطالب للبحث السريع"    class="form-control" name="search" />
	 
	
</form>
<hr />
        <table class="table" dir="rtl">
        	<thead>
        		<tr >
        		<td><h4>مسلسل</h4></td>
                <td><h4>كود الطالب</h4></td>
        		<td><h4>اسم الطالب</h4></td> 
        		<td><h4>تلفون الطالب</h4></td>
        		<td><h4>تلفون ولي الأمر</h4></td>
        		<td><h4>اداره</h4></td>
        		</tr>
        	</thead>
            <?php

  $tbl_name="student";    
  $adjacents = 3;
  
  $total_pages = $student->count(3);
  
  $targetpage = "student_list.php";  
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

 $result=$student->show_all($start,$limit);
  
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
                <td ><?php echo $row['id2']; ?></td>
        		<td><a data-toggle="modal" href="#mystudent"> <?php echo $row['name'];?></a> </td>
        		<td><?php echo $row['phone'];?></td>
        		<td><?php echo $row['p_phone'];?></td>

                <?php 
        		     echo "<td>";
    if($row['active']==0){
     
echo "<button type='button' class='btn btn-warning'><a href='student_update.php?id=".$row['id']."'>تفعيل</a></button>";
       }
       else 
       {
        echo "<button type='button' >مفعل</a></button>";

       }
             echo "
        			<button type='button' name='delete' class='btn btn-danger'><a href='delete.php?id=".$row['id']."'>حذف</a></button>
        			 <button type='button' class='btn btn-default'>ارسال بريد</button></td> ";

                     ?>
        			 
        	</tr>
            <?php 
             $i++;
        }
    ?>

    <?=$pagination?>
        	</tbody>
        </table>
        <script type="text/javascript">
function delete_student() {
    var x;
    if (confirm("تأكيد الخذف الطالب!") == true) {
        x = "You pressed OK!";
    } else {
        x = "You pressed Cancel!";
    }
    document.getElementById("demo").innerHTML = x;
}
</script>
 <?php include 'include/footer.php';  ?>