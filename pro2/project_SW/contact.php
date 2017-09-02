<?php
session_start();
if(@$_SESSION['techer']||@$_SESSION['student'])
{
  include 'pages/header-2.php';}
else {
	  include 'pages/header.php';
}
/////////////////////////////////////////////////

  /*
 class mail   
{
	private $email_to;
	private $email_from;
	private $email_title;
	private  $email_contant = array();
	private $headers;
	
	function __construct() {
		
		    $this->headers="MIME-Version: 1.0 \r\n";
            $this->headers .="From: $this->email_from \r\n";
            $this->headers .="content-type: text /html; charset=utf-8\r\n";
            $this->headers .="X-priority: 3 \r\n";
			
			$this->email_contant['name'] = "";
			$this->email_contant['title'] = "";
			$this->email_contant['massage'] = "";
	}
	
	
	public function set_email_to($email)
	{
		if($this->check_email($email) == TRUE)
		{
			$this->email_to = $email;
		}
	}	
	
		public function set_email_from($email)
	{
		if($this->check_email($email) == TRUE)
		{
			$this->email_from= $email;
		}
	}
	
	public function set_email_contant($name,$title,$massage)
	{
		$this->email_contant['name'] = $name;
		$this->email_contant['title'] =$title;
		$this->email_contant['massage'] = $massage;
	}
	
	public function get_email_contant($index)
	{
		return $this->email_contant[$index];
	}	
	
	public function set_email_title($title)
	{
		$this->email_title = $title;
	}
 public function get_email_title()
	{
	return	$this->email_title;
	}
 
 public function get_email_to()
 {
 	return $this->email_to;
 }
  public function get_email_from()
 {
 	return $this->email_from;
 }
 
 public function get_headers()
 {
 	return $this->headers;
 }
 
 protected function get_time()
	 {
	 	return date("h:i:sa");
	 	 
	 }
 protected function get_data()
	 {
	 	return date("Y.m.d");
	 	 
	 }
	private function check_email($data)
	{
	 if (!preg_match(
        "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", 
        $data))
        {  return FALSE;
        }
     return TRUE;
	} 
	 
 
  
 public function send_email()
{
	 $name = $this->get_email_contant("name");
			$title = $this->get_email_contant("title");
			$massage = $this->get_email_contant("massage");

            $email_body = "You have received a new message. ".
            " Here are the details:\n . <br>Name: $name \n . 
            <br> Email: $this->email_from; \n .
            <br>Message \n $massage "; 
           
		    $success=mail($this->email_to,$this->get_email_title(),$email_body,$this->headers);
            if ($success) {
                return 1;
            }
     
		else{return 0;} // don't insert to database
		
	}
 }// End send email to visitor functoin 
        
 
 */
   
 











    
////////////////////////////////////////////////
 
$mail=new mail;

	 ?>		
	 <style>
  	#contact-form  label.error {
    color: #FB3A3A;
   }  
</style>		      	
   <script type="text/javascript" src="loading/jquery.validate.min.js"></script> 
     <div class="main" id="container">
	 	<div class="content">	
	 	 
           <div class="about_desc section" id="section-2"> 
              <div class="wrap">            
               <div id="form-main">
               	
               	<?php
               
               		if (isset($_POST['submit']))
					{
					 
						$mail->set_email_contant($_POST['name'], $_POST['title'], $_POST['msg']);
						$mail->set_email_from($_POST['email']);
						$mail->set_email_title($_POST['title']);
						$mail->set_email_to("amr_easm@yahoo.com");
						$sending=$mail->send_email();
						
						$mail->set_email_contant($_POST['name'], $_POST['title'], $_POST['msg']);
						$mail->set_email_from($_POST['email']);
						$mail->set_email_title($_POST['title']);
						$mail->set_email_to("amrman58@gmail.com");
						$sending2=$mail->send_email();
						
						
						
						
						if (!$sending&&!$sending2) {
							 $error = "<font color=\"red\">لم يتم ارسال الرساله ادخل البيانات بصوره صحيحه واعد المحاوليه</font>";
       							 echo $error."<br>";
						}
						else{
							  $error = "<font color=\"grean\">شكرا علي رسالتك سنقوم بالرد عليك خلال 24 ساعه</font>";
           					  echo $error;
						}
					
					}
               
               	?>
  <div id="form-div">
    <form class="form" id="contact-form" novalidate="novalidate"  method="post" action="">
      
      <p class="firstname">
        <input name="name" type="text" class="validate[required,custom[onlyLetter],length[0,100]] feedback-input" placeholder="الإسم بالكامل" id="name" />
      </p>
      
      <p class="email">
        <input name="email" type="text" class="validate[required,custom[email]] feedback-input" id="email" placeholder="البريد الإليكتروني" />
      </p>
      
       <p class="phone">
        <input name="title" type="text" class="validate[required,custom[title]] feedback-input" id="comment" placeholder="عنوان الرساله " />
      </p>
      
      <p class="text">
        <textarea name="msg" class="validate[required,length[6,300]] feedback-input" id="comment" placeholder="الرساله"></textarea>
      </p>
      
      
      <div class="submit">
        <input type="submit" name="submit" value="إرسال" id="button-blue"/>
        <div class="ease"></div>
      </div>
    </form>
  </div></div>
					   
		 				</div>
					 
				    </div>		</div>
					 
 <script type="text/javascript">

(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            //form validation rules
            $("#contact-form").validate({
                rules: {
                    name: "required",
                     
                  
                    email: {
                        required: true,
                        email: true
                    },
                    title: {
                        required: true,
                        minlength: 5
                    },
                    msg: {
                        required: true,
                        rangelength:[10,255]
                        
                    },
                    agree: "required"
                },
                messages: {
                   name: "من فضلك أدخل اسمك بالكامل ",
                   
                    title: {
                        required: "أدخل عنوان الرساله ",
                        minlength: "كلمه المرور علي الأقل تحتوي علي 5 حروف"
                    },
                     msg: {
                        required: " لابد من كتابه أ لرساله ",
                        rangelength: "نص الرساله لابد ان يحتوي علي مابين 10 إلي 255 حرف"
                    },
                 
                    email: "ادخل بريد إليكتروني صحيح",
                  
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
