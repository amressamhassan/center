 <?php  
    session_start();
 if(!(@$_SESSION['techer']||@$_SESSION['student']))
  {
 	
HEADER ("location:index.php");
}

 include 'pages/header-2.php'; ?>
 
  <style>
    #answer_form  label.error {
    color: #FB3A3A;
   
}  </style>
      <script type="text/javascript" src="loading/jquery.validate.min.js"></script> 

      <?php  

   $question=new question;
  ?> 
  <div class="main" id="container">
    <div class="content"> 
     
                       
           <div class="about_desc section" id="section-2"> 
              <div class="wrap">
               <div class="info">
                    <div class="avatar">
                      <img src="images/svg/Phone-Booth.svg" />
                   
                  </div>
                   <div class="about">
                    <?php
                    $id=$_GET['id'];
         if($question->select_question($id) != 1){
               $row=$question->select_question($id);
}
else{
  echo "there is no questions !!!";
}
 $q_id=$row['id'];
 echo $q_id;
         ?>
                      <h3> اسم الطالب : <?php echo $row['name']; ?> </h3>  
                <p><?php echo $row['name']; ?> طالب بالمرحله  <?php echo $row['level']; ?> </p>  
                <p>تاريخ السؤال : <?php echo $row['data']; ?></p> 
              
                  </div> 
                  <a href="#answer" class="btn">اضف اجابتك الآن</a>
               </div>
             <div class="question">
               <table class="example-table">
<tbody>
<tr>
<th>اسم الماده</th>
<th>المرحله الدراسيه </th>
<th width="100%">السؤال</th>
 
 
</tr>
<tr>
<td><?php echo $row['subject']; ?></td>
<td><?php echo $row['level']; ?></td>
<td>
  <h1><?php echo $row['question']; ?></h1>
</td>
 
</tr>
 
</tbody>
</table>
              
             </div>
       
   <div id="comments">
          <center> <h1>الإجابات</h1></center>
    <table class="example-table">
<tbody>
<tr>
<th>اسم الماده</th>
<th>اسم الطالب</th>
<th width="100%">الإجابه</th>
 </tr>

<?php

  $tbl_name="user";    
  $adjacents = 3;
  
  $total_pages = $question->count("SELECT COUNT(*) as num FROM answer_questions_user");

  $targetpage = "answer.php";  
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
         
         $query="SELECT * FROM questions_user inner join user on questions_user.id_user=user.id inner join level on questions_user.id_level=level.id inner join subject on questions_user.id_subject=subject.id inner join answer_questions_user on answer_questions_user.id_q=questions_user.id  LIMIT $start, $limit";
         $result = $question->select($query,$start,$limit);
  
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
  <td><?php echo $row['subject']; ?></td>
<td> <?php echo $row['name']; ?> </td>

<td>
   <?php echo $row['answer']; ?></td>
 
</tr>
 
<?php } ?>
</tbody>
</table>
<?=$pagination?>
   </div>
   <?php
   if (isset($_POST['post'])) {
     $answer = $_POST['answer'];
     $sql1="INSERT INTO answer_questions_user values('','$answer','$q_id','$id','')";
     mysql_query($sql1);
   }
   ?>
 <div id="answer">
          <center>
          <form id="answer_form" method="post" action="">
             <textarea cols="2" rows="6" name="answer"></textarea>
             <input type="submit" name="post" class="btn" value="انشر اجابتي" />
          </form>
         </center>
            
          </textarea>
 </div>                
        </div>  
          
    
      </div>  </div>
      
      
      
      
  <script type="text/javascript">
 
(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            //form validation rules
            $("#answer_form").validate({
                rules: {
                  
                    answer: {
                        required: true,
                        minlength: 5
                    },
                 },
                messages: {
                    
                    answer: {
                        required: " ادخل اجابتك من فضلك ",
                        minlength: " تحتوي الإجابه علي الأقل  5 حروف"
                    }
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        }
    }

    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });

})(jQuery, window, document);
</script>  
 <?php  include 'pages/footer.php'; ?>
