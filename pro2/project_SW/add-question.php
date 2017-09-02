
  
  <style>
  	#exam-form  label.error {
    color: #FB3A3A;
   }  
</style>
   <script type="text/javascript" src="loading/jquery.validate.min.js"></script>    
 <?php  
 session_start();
 if(!(@$_SESSION['techer']))
 {
  
HEADER ("location:index.php");
}
   include 'pages/header-2.php';
     

	$amr= new exam;
	$amrr= new teacher;
	
	$gg=@$_GET['g'];
	$id_exam=$_GET['id'];
	if($gg){
	$g=$gg;}
	else {
		$g=$_POST['g'];
	}
	if(isset($_POST['submit'])||isset($_POST['public'])&&$g>=0)
	{
		
	$g=$amrr->add_q($amr,$id_exam,$g);	
		
	if($g==0)
	{
		echo"<meta http-equiv='Refresh' content='0;URL=exam_coll.php?id=".$id_exam."' />";	
	}
	
	if(isset($_POST['public'])&&$g==0){
		echo"<meta http-equiv='Refresh' content='0;URL=exam_coll.php?id=".$id_exam."' />";		
			
	}
	
	}
	
	
   ?>	
 	
     <div class="main" id="container">
	 	<div class="content">	
	 	 
                       
           <div class="about_desc section" id="section-2"> 
              <div class="wrap">            
                 	<div class="section group example">
						<div class="col_1_of_2 span_1_of_2">
				
					<!--- Start Form ---->	 
 <form action="add-question.php?id=<?php echo $id_exam; ?>" method="post" id="exam-form" novalidate="novalidate" > 
   
          
             <label for="firstname"> محتوي السؤال</label>
             <textarea cols="20" rows="20" name="descreption" ></textarea>
             <label for="firstname"> درجة السوال </label>
<input type="text" name="grade" onkeypress='return event.charCode >= 1 && event.charCode <= 57'></input>
         <label for="firstname">  درجات متبقى </label>   <?php echo $g; ?>
            </div>
            
            
            
	 <div class="col_1_of_2 span_1_of_2">
	  
     			 <label for="db">نوع السؤال</label>
				<select name="Qtype" id="Qtype">
				   <option >---- اختار ------</option>
				   <option value="1">اختار من متعدد</option>
				   <option value="2">صح وخطا </option>
				</select>
				
				<div id="MCQ" style="display:none;">
			  <hr />
					<input type="text" name="right1" placeholder="الإجابه الأولي" />
					<input type="radio" name="right" value="right1" />
			 <hr />
					<input type="text" name="right2" placeholder="الإجابه الثانية" />
					<input type="radio" name="right" value="right2" />
				 <hr /> 
					<input type="text" name="right3" placeholder="الإجابه الثالثه" />
					<input type="radio" name="right" value="right3"/>
				 <hr /> 
					<input type="text" name="right4" placeholder="الإجابه الرابعه" />
					<input type="radio" name="right" value="right4"/>
			  <hr />
 		</div>
 		
 		<div id="TrueFalse" style="display:none;">
		 
				<input type="radio" name="right4" value="TRUE" />
				  الإجابه صحيحه
				 
					 <input type="radio" name="right4" value="false" />
				الإجابه خاطئه
				 
		 
 		</div>
  <input type="hidden" name="g" value="<?php echo $g; ?>"  />
    </div>	<!--- End one Row of timetable ------> 
		   <div id="loginform">
        	   <input type="submit" name="submit" id="login" value="سوال اخرى">
        	
        	    <input type="submit" name="public" id="login" value="نشر الامتحان">
        </div>
          
         </form> 		 
         	<!--- End Form ---->	  	  
           	  
           	  </div>             
       	  </div>  
       	     
		  	
  </div>
       <script>
    	 $('#Qtype').on('change',function(){
        if( $(this).val()==="1"){
        $("#MCQ").show();
        $("#TrueFalse").hide();
        }
        
         else if( $(this).val()==="2"){
        $("#TrueFalse").show();
        $("#MCQ").hide()
        }
     
        else {
        	 $("#TrueFalse").hide();
        $("#MCQ").hide();
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
                    descreption: "required",
                	 grade  : "required",
                     
               
                    agree: "required"
                },
                messages: {
                    descreption: "ادخل وصف للسؤال",
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
