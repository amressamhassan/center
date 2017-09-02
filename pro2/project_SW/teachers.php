<?php
session_start();
if(@$_SESSION['techer']||@$_SESSION['student']){
  include 'pages/header-2.php';}
else {
	  include 'pages/header.php';
}
 //echo "<br><br><br><br><br><br><br><br><br>";


	 ?>			  
  
    <?php  


   $teacher=new teacher;
 
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


     <div class="main" id="container">
    <div class="content"> 
     
                       
           <div class="about_desc section" id="section-2"> 
              <div class="wrap">            
               
              <center><h1 class="head"> قائمه المدرسين الموجودين بالمركز   </h1></center>
            <table class="example-table">
<tbody>
  <tr>
<th>اسم المدرس </th>
<th>اسم الماده التابعه له</th>
<th>البريد الإليكتروني</th>
<th> رقم التلفون </th>
<th>  صوره شخصيه</th>
</tr>

  <?php

  //$tbl_name="teacher";    
  $adjacents = 3;
  
  $total_pages = $teacher->count_teacher();
  
  $targetpage = "teachers.php";  
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

         $result = $teacher->show_teacher($start,$limit);
  
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
    while($row = @mysql_fetch_array($result))
    {

                    ?>


<tr>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['subject']; ?></td>
<td><?php echo $row['email'];?></td>
<td><?php echo $row['phone'];?></td>
<td><img src="<?php echo $row['Path'];?>" width="80" height="50" /></td>
</tr>

<?php } ?>

</tbody>
</table>  
           

 <?=$pagination?>

      <center><h1 class="head">   الطلاب الأولئل  </h1></center>
            <table class="example-table">
<tbody>
<tr>
<th>اسم الطالب </th>

<th>الماده العلميه</th>
<th>الصف الدراسي</th>
 <th>المدرسه</th>
 <th>المركز</th>
<th>  صوره شخصيه</th>
</tr>
<?php

  $tbl_name="student";    
  $adjacents = 3;
  
    $total_pages_student = $student->count_great_student();
  
  $targetpage = "teachers.php";  
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

 $result1=$student->show_great_student($start,$limit);
  
  if ($page == 0) $page = 1;      
  $prev = $page - 1;             
  $next = $page + 1;             
  $lastpage = ceil($total_pages_student/$limit);    
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
    while($row = mysql_fetch_array($result1))
    {

                    ?>
<tr>
<td> <?php echo $row['name'];?> </td>
<td> <?php echo $row['subject'];?></td>
<td><?php echo $row['level'];?></td>
<td><?php echo $row['school'];?></td>
<td><?php echo $row['order'];?></td>
<td><img src="images/user.png" width="80" height="50" /></td>
</tr>
<?php } ?>
</tbody>
</table>  
      
      
       <?=$pagination?>

      
              </div>             
          </div>  
          
         
      </div>

    

 <?php  include 'pages/footer.php'; ?>
