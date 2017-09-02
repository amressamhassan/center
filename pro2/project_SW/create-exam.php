   <link rel="stylesheet" href="css/style-registration.css">	
  <style>
  	#exam-form  label.error {
    color: #FB3A3A;
   
}  </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>
function showUser(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else  { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","daynum.php?q="+str,true);
        xmlhttp.send();
    }
    
}


</script>
<?php
/*
$link =  "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$escaped_link = htmlspecialchars($link, ENT_QUOTES, 'UTF-8');
echo '<a href="'.$escaped_link.'">'.$escaped_link.'</a>';
*/
?>
<?php
/*
function curPageName() {
 return substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
}

echo "The current page name is ".curPageName();
echo '<a href="'.curPageName().'">'.curPageName().'</a>';*/
?>
 <?php  
 session_start();

 if(!(@$_SESSION['techer']))
 {
  
HEADER ("location:index.php");
}
   include 'pages/header-2.php';
	
	
	$amr= new exam;
	$amrr= new teacher;

	if(isset($_POST['submit']))
	{
	  
	   
		if($amrr->add_exam($amr,$_POST['level'],$_SESSION['id'],$_SESSION['id_sub']))
		{
		$i=mysql_insert_id();
		echo"<meta http-equiv='Refresh' content='0;URL=add-question.php?id=".$i."&&g=".$_POST['grade']."' />";
		}
		
		/*else if($_POST['day']) {
	    if($amr->add_exam($_POST['level'],9,1,$_POST['mon'],$_POST['day']))
		{
	    $i=mysql_insert_id();
		echo"<meta http-equiv='Refresh' content='0;URL=add-question.php?id=".$i."&&g=".$_POST['grade']."' />";
		}
			
		}*/
		
		
		
	}
	
   ?>	
 
     <script type="text/javascript" src="loading/jquery.validate.min.js"></script>    	
     <div class="main" id="container">
	 	<div class="content">	
	 	 
                       
           <div class="about_desc section" id="section-2"> 
              <div class="wrap">            
                 	<div class="section group example">
						<div class="col_1_of_2 span_1_of_2">
					 		 
					<!--- Start Form ---->	 
 <form action="" method="post" id="exam-form" novalidate="novalidate" > 
   
       
          <legend><span class="number">1</span>معلومات أساسيه</legend>
             <label for="firstname">اسم الإمتحان</label>
              <input type="text" name="name">
             
             <label for="firstname"> درجه الإمتحان</label>
          <input type="text" name="grade" onkeypress='return event.charCode >= 48 && event.charCode <= 57'></input>  
        <br> <br> <br> <br> 
        </div>
	 <div class="col_1_of_2 span_1_of_2">
	  
          <legend><span class="number">2</span>معلومات فرعيه</legend>
     
       <label for="mail">سم الماده</label>
          <input type="text" id="subject" name="subject" value="<?php echo $_SESSION['subject'];?>" disabled="">
          	
          	
             	       <label for="level">المستوي الدراسي</label>
             	     
      <select name="level" id="parent_selection" style="width: 100% ;height:5%;">
      	<option >---- اختار ------</option>
                  <?php
             	      $result=$amr->show_level();
					  while ($level=mysql_fetch_array($result)){
             	       ?>
     <option  value="<?php echo $level['id']?>"><?php echo $level['level']?></option>
 <?php }
  $sqlq=$amr->show(1,"id_parint","acadmic_year");

 ?>
 
     </select>
        <label for="text">ينتهى</label>
        
<select onchange="showUser(this.value)" name="mon" id="parent_selection" style="width: 30% ;height:5%;">
         	<option >---- الشهر ------</option>
                 <?php
	while ($mon=mysql_fetch_array($sqlq)){
             	       ?>
     <option  value="<?php echo $mon['id']?>">
     	<?php  echo $mon['name']?></option>
 <?php }?>
  </select>
   
       <select id="txtHint" name="day" id="parent_selection" style="width: 30% ;height:5%;">
   
 	<option >---- اليوم  ------</option>
 	
 	 	    <option value="">اخر</option>

 	
     </select>
     <div id="otherType" style="display:none;">
<label for="specify">اخر</label>
<input type="text" name="dayn" placeholder="يوم"/>
</div>
    </div>	<!--- End one Row of timetable ------> 
   
		   <div id="loginform">
        	   <input type="submit" name="submit" id="login" value=" انشاء امتحان جديد">
        </div>
         </form> 		 
         	<!--- End Form ---->	  	  
           	  
           	  </div>             
       	  </div>  
       	     
		  	
  </div>
    
      <script>
    	 $('#txtHint').on('change',function(){
        if( $(this).val()===""){
        $("#otherType").show()
        }
        else{
        $("#otherType").hide()
        }
    });
    
    	
    </script> 
  <script type="text/javascript">
/**
  * Basic jQuery Validation Form Demo Code
  * Copyright Sam Deering 2012
  * Licence: http://www.jquery4u.com/license/
  */
(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            //form validation rules
            $("#exam-form").validate({
                rules: {
                    name: "required",
                	 grade: "required",
                     
               
                    agree: "required"
                },
                messages: {
                    name: "ادخل اسم الأمتحان",
                    grade: "ادخل درجه الإمتحان"
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
