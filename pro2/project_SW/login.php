   <link rel="stylesheet" href="css/icons.css">	
 <?php 
 session_start();
 
 if(@$_SESSION['techer']||@$_SESSION['student']){
 	
HEADER ("location:index.php");
}
 include 'pages/header.php'; 
 //echo "<br> <br> <br> <br> <br>";


if(isset($_SESSION['emil']))
{
	echo"login is ok";
	//HEADER ("location:index.php");
} 
 

	if(isset($_POST['submit'])){
	$log= new  user;
	$val= new  validation;
    if($log->set_email($_POST['email'],$val)){
    if($log->set_password($_POST['user_password'],$val)){

	if($logg=$log->login($log->get_email(),$log->get_password())){
echo"admin";
  if($logg==1)
  {
  	HEADER ("location:../admin/index.php");

  }
  else if($logg==2){
   HEADER ("location:index.php");
	//  echo"teaher";
  }
  else if($logg==3){
    HEADER ("location:index.php");
   //   echo"stdent";
  }
	}
else
{
 echo " <script>alert('خطاء فى الايميل او الباسورد حول مره اخره او اتصال بالادمن ')</script>" ;

}
}
 else{
    echo " <script>alert('خطاء فى كلاملة السر')</script>" ;
  }
}
 else{
    echo " <script>alert('خطاء فى الايميل')</script>" ;
  }

}
?> 
 
 
 
    <link rel="stylesheet" href="css/style-registration.css">	
         	
     <div class="main" id="container">
	 	<div class="content">	
	 	 
                       
           <div class="about_desc section" id="section-2"> 
              <div class="wrap">            
                 	<div class="section group example">
						<div class="col_1_of_2 span_1_of_2">
						 
		 <form action="" method="post">
      
       
        <fieldset>
          <legend><span class="number">1</span>معلومات أساسيه</legend>
        
          
          <label for="mail">البريد الإليكتروني:</label>
          <input type="email" id="mail" name="email">
         
         
           
          <label for="password">كلمه المرور:</label>
          <input type="password" id="password" name="user_password">
          
         </fieldset>
      
        <div id="loginform">
        	   <input type="submit" name="submit" id="login" value="تسجيل الدخول ">
        </div>
        
                   </fieldset>
           
      </form> 
		 				</div>
						<div class="col_1_of_2 span_1_of_2">
	 <ul class="creatures" id="creatures">
 
  <li class="nervous">
    <div class="click-anim">
      <figure style="background-color:mediumpurple">
        <div class="eye"></div>
        <div class="eye"></div>
        <div class="mouth teeth"></div>
      </figure>
    </div>
    <div class="shadow"></div>
  </li>
 </ul>   
 


 </div>	<!--- End one Row of timetable ------> 
				 
           	  </div>             
       	  </div>  
       	  
       	 
      </div>
   <script>
  	var student = [
    {display: "الصف الأول الإعدادي", value: "1" }, 
    {display: "لصف الثاني الإعدادي", value: "2" }, 
    {display: "الصف الثالث الإعدادي", value: "3" },
    {display: "الصف الأول الثانوي", value: "4" }, 
    {display: "لصف الثاني الثانوي", value: "5" }, 
    {display: "الصف الثالث الثانوى", value: "6" }
    ];
    
var teacher = [
    {display: "كمياء", value: "5" }, 
    {display: "الماني", value: "6" }, 
    {display: "فزياء", value: "7" },
    {display: "اخري", value: "1" }];
    
    
var languge = [
    {display: "عربي", value: "1" }, 
    {display: "لغات", value: "2" }];
    
 
 $("#parent_selection").change(function() {
    var parent = $(this).val(); 
    switch(parent){ 
        case 'student':
             list(student);
             
            break;
        case 'teacher':
             list(teacher);
            break;              
          
        default: //default child option is blank
            $("#child_selection").html('');  
            break;
           }
});
//function to populate child select box
function list(array_list)
{
    $("#child_selection").html(""); //reset child options
    $(array_list).each(function (i) { //populate child options 
        $("#child_selection").append("<option value=\""+array_list[i].value+"\">"+array_list[i].display+"</option>");
    });
} 

function languge(array_list)
{
    $("#languge").html(""); //reset child options
    $(array_list).each(function (i) { //populate child options 
        $("#languge").append("<option value=\""+array_list[i].value+"\">"+array_list[i].display+"</option>");
    });
} 	
  	
  </script>
     
      
      
      
 <?php  include 'pages/footer.php'; ?>
