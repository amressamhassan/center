   <link rel="stylesheet" href="css/style-registration.css">	
  <style>
  	#register-form  label.error {
    color: #FB3A3A;
   
}  </style>
  
 <?php  

   session_start();
 if(@$_SESSION['techer']||@$_SESSION['student']){
 	
HEADER ("location:index.php");
}
  include 'pages/header.php';


	
  ?>	

<?php
	$myinfo = new timetable;
	 $upload = new upload;
   $validation= new  validation;
?>
     <script src="loading/ajax-image.js"></script>
     <script type="text/javascript" src="loading/jquery.validate.min.js"></script>    	
     <div class="main" id="container">
	 	<div class="content">	
	 	 
                       
           <div class="about_desc section" id="section-2"> 
              <div class="wrap">            
                 	<div class="section group example">
						<div class="col_1_of_2 span_1_of_2">
						 <div class="msg_error">
					
					<?php		if (isset($_POST['submit'])) {
						 

					 
							switch ($_POST['parent_selection']) {
								
							 case 'student':
							 
								$ahmed = new student;
    if($ahmed->set_name($_POST['firstname'],$validation)){
    if($ahmed->set_email($_POST['email'],$validation)){
    if($ahmed->set_phone($_POST['phone'],$validation)){
    if($ahmed->set_password($_POST['password'],$validation)){
	
	$ahmed->set_school($_POST['school_name']);
	$ahmed->set_level($_POST['child_selection']);
  $ahmed->set_address_id($_POST['address']);
  $ahmed->set_pphone($_POST['pphone']);
									
									$myemail = $ahmed->get_email();
									if ($ahmed->check_email($myemail) != FALSE) 
									{
										 if(!$_FILES["file"]["name"])
										{
											$ahmed->set_img("../project_SW/uploads/avatars/noimage.jpg");
										}
										else {
											$target_file = "../project_SW/uploads/avatars/students/";
											$ahmed->set_img($target_file . basename($_FILES["file"]["name"]) ) ;
										 }
										$registration = $ahmed->registration($ahmed->get_name(),$ahmed->get_email(), $ahmed->get_password(), $ahmed->get_phone() , $ahmed->get_img(), $ahmed->get_address_id(),$ahmed->get_level(),$ahmed->get_school(),$ahmed->get_pphone(),$ahmed->get_language());
									 if($registration && $_FILES["file"]["name"])
										{

                       $upload->upload_image($target_file,"file", 1500);
									 	
										}
										 else if ($registration) {
										 	echo "تمت اضافه المدرس بنجاح تحتاج لتفعيل عضويتك ";
										 }
										else {
											echo "للأسف لم تتم عمليه التسجيل بنجاح ";
										}
									 
									}
							 	
							 		else {
										echo " عفوا انت انت مسجل من قبل بذلك الأميل إذا كنت بالفعل  ";
									}
									}//pass
 else{
    echo " <script>alert('خطاء فى كلاملة السر')</script>" ;
  }

}
 else{
    echo " <script>alert('خطاء فى رقم التلفون')</script>" ;
  }

}
 else{
    echo " <script>alert('خطاء فى الايميل')</script>" ;
  }
}//1

 else{
    echo " <script>alert('خطاء الاسم خطاء')</script>" ;
  }
								 break;
									
								case 'teacher':
								
									$amr = new teacher;
    if($amr->set_name($_POST['firstname'],$validation)){
    if($amr->set_email($_POST['email'],$validation)){
    if($amr->set_phone($_POST['phone'],$validation)){
    if($amr->set_password($_POST['password'],$validation)){

								
									
									$amr->set_subject_id($_POST['child_selection']);
									$amr->set_address_id($_POST['address']);
									
									$myemail = $amr->get_email();
									if ($amr->check_email($myemail) != FALSE) 
									{
										 if(!$_FILES["file"]["name"])
										{
											$amr->set_img("../project_SW/uploads/avatars/noimage.jpg");
										}
										else {
											$target_file = "../project_SW/uploads/avatars/teachers/";
											$amr->set_img($target_file . basename($_FILES["file"]["name"]) ) ;
										 }
									$registration = $amr->registration($amr->get_name(),$amr->get_email(), $amr->get_password(), $amr->get_phone() , $amr->get_img(),$amr->get_subject_id() ,$amr->get_address_id());
										 if($registration && $_FILES["file"]["name"])
										{
                      $upload->upload_image($target_file,"file", 1500);
									 	
										}
										 else if ($registration) {
										 	echo "تمت اضافه المدرس بنجاح تحتاج لتفعيل عضويتك ";
										 }
										else {
											echo "للأسف لم تتم عمليه التسجيل بنجاح ";
										}
									}
									
									 else {
										echo " عفوا انت انت مسجل من قبل بذلك الأميل إذا كنت بالفعل  ";
									}

                                    }//pass
 else{
    echo " <script>alert('خطاء فى كلاملة السر')</script>" ;
  }

}
 else{
    echo " <script>alert('خطاء فى رقم التلفون')</script>" ;
  }

}
 else{
    echo " <script>alert('خطاء فى الايميل')</script>" ;
  }
}//1

 else{
    echo " <script>alert('خطاء الاسم خطاء')</script>" ;
  }
							}
						 
						}
				
					?>	 
					  
						 </div>		 
					<!--- Start Form ---->	 
 <form action="" method="post" id="register-form" novalidate="novalidate" enctype="multipart/form-data"> 
   
       
          <legend><span class="number">1</span>معلومات أساسيه</legend>
             <label for="firstname">الإسم كامل باللغه العربيه:</label>
              <input type="text" name="firstname">
                
            <label for="mail">البريد الإليكتروني:</label>
          <input type="email" id="mail" name="email">
     	
     	 <label for="password">كلمه المرور:</label>
          <input type="password" name="password">
            <label for="phone"> رقم التلفون:</label>
          <input type="text" id="phone" name="phone">
         <div id="parent-phone" style="display:none;">
         	<label for="pphone"> رقم التلفون وليالأمر:</label>
          <input type="text" id="pphone" name="pphone">
         </div>
        
    		</div>
	 <div class="col_1_of_2 span_1_of_2">
	  
          <legend><span class="number">2</span>معلومات فرعيه</legend>
     
                  <!------- start photo file input ------>   
             <fieldset>
              
  <p class="file">
    <input type="file" name="file" id="file" />
    <label for="file">الصوره الشخية </label>
  </p>
          <div id="image_preview"><img id="previewing" src="images/noimage.jpg" /></div>
         </fieldset>
     <!------- end photo file input ------>
          	
          	
             	       <label for="job">الوظيفه</label>
                       <select name="parent_selection" id="parent_selection" style="width: 100%;">
                       <option value="0" checked >اختار</option>
     <option  value="teacher">مدرس</option>
    <option value="student">طالب</option>
     </select>
    <div id="otherInfo" style="display:none;"> 
     <select name="child_selection" id="child_selection" style="width: 100%;"></select>
      <select name="school_name" id="school_name" style="width: 100%;"></select>
      </div>     
      
  	  <label for="db">العنوان </label>
<select name="address" id="address">
<?php 
  $addres =   $myinfo->show_day("address");
	   while($row = mysql_fetch_array($addres))
	   {
	    echo $row['id']; 
	  ?>
	   	
	   	<option value="<?php echo $row['id']; ?>"><?php echo $row['address']; ?></option>
	   <?php
} ?>
			<option value="other">Other</option>

</select>

<div id="otherType" style="display:none;">
<label for="specify">اخر</label>
<input type="text" name="specify" placeholder="اكتب عنوان غير موجود "/>
</div>

 </div>	<!--- End one Row of timetable ------> 
		   <div id="loginform">
        	   <input type="submit" name="submit" id="login" value="حساب جديد">
        </div>
         </form> 		 
         	<!--- End Form ---->	  	  
           	  
           	  </div>             
       	  </div>  
       	     
		  	
  </div>
  
      <script>
    	 $('#address').on('change',function(){
        if( $(this).val()==="other"){
        $("#otherType").show()
        }
        else{
        $("#otherType").hide()
        }
    });
    
    	
    </script> 

  <script>
  	var student = [
  	<?php
  	 $level =   $myinfo->show_day("level");
  	    while($row = mysql_fetch_array($level))
		{?>
			 {display: "<?php   echo $row['level'];  ?>", value: "<?php echo $row['id'];   ?>"}, 
		<?php }?>
    ];
    
var teacher = [


 	<?php
  	 $sub =   $myinfo->show_day("subject");
  	    while($row2 = mysql_fetch_array($sub))
		{?>
			 {display: "<?php   echo $row2['subject'];  ?>", value: "<?php echo $row2['id'];   ?>"}, 
		<?php }?>
    
    ];
    
var shools = [

   	<?php
  	 $shool =   $myinfo->show_day("school");
  	    while($row2 = mysql_fetch_array($shool))
		{?>
			 {display: "<?php   echo $row2['school'];  ?>", value: "<?php echo $row2['id'];   ?>"}, 
		<?php }?>
    
   ];
    
    
var languge = [
    {display: "عربي", value: "1" }, 
    {display: "لغات", value: "2" }];
    
 
 $("#parent_selection").change(function() {
    var parent = $(this).val(); 
    switch(parent){ 
        case 'student':
             list(student);
             shool(shools);
              $("#otherInfo").show();
              $("#parent-phone").show();
               $("#school_name").show();
            break;
        case 'teacher':
             list(teacher);
              $("#school_name").html('');  
              $("#otherInfo").show();
              $("#parent-phone").hide();
              $("#school_name").hide();
            break;              
          
        default: //default child option is blank
            $("#child_selection").html('');  
             $("#school_name").html('');  
              $("#otherInfo").hide();
               $("#parent-phone").hide();
             
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

function shool(array_list)
{
    $("#school_name").html(""); //reset child options
    $(array_list).each(function (i) { //populate child options 
        $("#school_name").append("<option value=\""+array_list[i].value+"\">"+array_list[i].display+"</option>");
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
     
  <script type="text/javascript">
 
(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            //form validation rules
            $("#register-form").validate({
                rules: {
                    firstname: "required",
                    lastname: "required",
                    lastname: "required",
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
                        minlength: 5
                    },
                    phone: {
                        required: true,
                         
                        rangelength:[10,12]
                        
                    },
                    
                        pphone: {
                        required: true,
                         
                        rangelength:[10,12]
                        
                    },
                    agree: "required"
                },
                messages: {
                    firstname: "من فضلك أدخل اسمك بالكامل ",
                    lastname: "Please enter your lastname",
                    password: {
                        required: "أدخل كلمه مرور ",
                        minlength: "كلمه المرور علي الأقل تحتوي علي 5 حروف"
                    },
                      phone: {
                        required: "أدخل رقم التلفون ",
                        minlength: " رقم التلفون يحتوي علي الأقل 11 رقم"
                        
                    },
                        pphone: {
                        required: "أدخل رقم التلفون ",
                        minlength: " رقم التلفون يحتوي علي الأقل 11 رقم"
                        
                    },
                    email: "ادخل بريد إليكتروني صحيح",
                    agree: "Please accept our policy"
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
