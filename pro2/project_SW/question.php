<link rel="stylesheet" href="css/style-registration.css">	
 <?php 
  session_start();
 if(!(@$_SESSION['techer']||@$_SESSION['student']))
 {
 	
HEADER ("location:index.php");
}
  include 'pages/header-2.php'; 
 // echo "  <br>    <br>    <br>    <br>    <br>    <br>    <br>";
     $question=new question;

 
   $info=new info;

  

  if (isset($_POST['add'])) {
    $user_name=$_POST['user_name'];
       $user_id=$_SESSION['id'];
    $question=$_POST['question'];
    $subject=$_POST['subject'];
    $level=$_POST['level'];
     $today = date('l F j ,n, Y, g:i a '); 
    $sql="INSERT INTO questions_user VALUES ('','$question','$level','$user_id','$subject','$today')";
    @mysql_query($sql);
	echo "<meta http-equiv='Refresh' content='0;URL=question.php' />";
  }

  ?> 
          
            
     <div class="main" id="container">
    <div class="content"> 
     
                       
           <div class="about_desc section" id="section-2">
          
              <div class="wrap">  
  
                          <table class="example-table">
<tbody>
<tr>
<th>اسم الطالب</th>
<th>المرحله الدراسيه </th>
<th>اسم الماده</th>
<th>عنوان السؤال</th>
<th>عدد الإجابات  </th>
<th> أجب عن السؤال  </th>
</tr>

<?php

  $tbl_name="questions_user";    
  $adjacents = 3;
  $query="SELECT COUNT(*) as num FROM questions_user  join user on questions_user.id_user=user.id  join level on questions_user.id_level=level.id  join subject on questions_user.id_subject=subject.id";
  $total_pages = $question->count($query);
  
  $sql="SELECT COUNT(id_q) as qnum FROM answer_questions_user inner join questions_user on answer_questions_user.id_q=questions_user.id";
  $query2=mysql_query($sql);
  $answer = mysql_fetch_array($query2);
  $answer = $answer['qnum'];

  $targetpage = "question.php";  
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

         $query1="SELECT * FROM questions_user inner join user on questions_user.id_user=user.id inner join level on questions_user.id_level=level.id inner join subject on questions_user.id_subject=subject.id LIMIT $start, $limit";
         $result = $question->select($query1,$start,$limit);
  
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
    while($row = mysql_fetch_array($result))
    {

                    ?>


<tr>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['level']; ?></td>
<td><?php echo $row['subject']; ?></td>
<td> <?php echo $row['question']; ?> </td>
<td><?php echo $answer; ?></td>
 
 <?php 
                echo "    <td><a href='answer.php?id=".$row['id_user']."' class='btn'>اجب</a></button>";
         ?>
</tr>
<?php } ?>
</tbody>
</table>    

<?=$pagination?>
             <center>
                   <div class="quote_button">
                        <a class="popup-with-zoom-anim" href="#small-dialog">إسألك سؤالك الآن</a>
                            <div id="small-dialog" class="mfp-hide">
                                 <div class="priceing-tabel">
                        <div class="priceing-header">
                          <h4>سؤال / استفسار</h4>
                          
                        </div>
                        <form action="" method="post">
                        <ul>
                          <li>
                             <label for="name"> الاسم </label>
                                  <input type="text"  name="user_name" >
                          </li>
                          <li>
                               <label for="mail"> السؤال </label>
                                     <textarea name="question" cols="5" rows="10"></textarea>
                          </li>
                          <li>
                            <select name="subject" id="parent_selection" style="width: 100%;">
                              <option checked value=""> المادة </option>

                            <?php 
  $subject =   $info->select_all("subject");
     while($row = mysql_fetch_array($subject))
     {
    ?>
                                          
                                  <option value="<?php echo $row['id']; ?>"><?php echo $row['subject']; ?></option>
                                  <?php
} ?>
                                   </select>
                          </li>
                          <li>
                            
                                          <select name="level" id="parent_selection" style="width: 100%;">
                      
                                     <option checked value=""> المرحلة الدراسية </option>
                                      <?php 
  $level =   $info->select_all("level");
     while($row = mysql_fetch_array($level))
     {
    ?>
                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['level']; ?></option>
                                    <?php
} ?>
                                     </select>
                          </li>
                        </ul>
                      
             <input type="submit" name="add" class="price-btn" value="انشر سؤالي">
        
                        </form>
                    </div>
                    </div>
                         </div>  
               </center>      
                   
          </div>  
          
         
      </div>
   <script>
   
  </script>
     
      
      
      
 <?php  include 'pages/footer.php'; ?>
