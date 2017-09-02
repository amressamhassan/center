  <link rel="stylesheet" href="css/style-registration.css">	
 <?php
  session_start();
 if(!(@$_SESSION['techer']||@$_SESSION['student']))
 {
 	
HEADER ("location:index.php");
}
   include 'pages/header-2.php';
 //echo"<br><br><br><br><br><br><br><br><br><br><br><br><br>";
    ?>	
   <script src="loading/ajax-image.js"></script>
 
       <?php  
  
   $user=new user;

   $photo=new upload;

  
   $validation=new validation;
$id=$_SESSION['id'];        // session id_user
   $row=$user->SELECT("SELECT * FROM user inner join address on user.id_address=address.id WHERE user.id=$id");
   $address_id=$row['id'];
if (isset($_POST['update'])) {
    $uploaded;
       if($_FILES["file"]["name"])
                    {
      $size=$_FILES['file']['size'];
    $dir=dirname(__FILE__)."/upload/";
    $uploaded=$photo->upload_image($dir,"file",$size);
                    }
  

  if($user->set_name($_POST['user_name'],$validation)){
  if($user->set_email($_POST['email'],$validation)){
  if($user->set_phone($_POST['phone'],$validation)){
  if($user->set_password($_POST['user_password'],$validation)){
   $user->set_address($_POST['addres']);
   $n=$user->get_name();
   $mail=$user->get_email();
   $phone=$user->get_phone();
   $pass=$user->get_password();
   $add=$_POST['addres'];
  $m=$user->UPDATE("UPDATE user SET name='$n',email='$mail',phone='$phone',pass='$pass' WHERE id=$id");
   $d=$user->UPDATE("UPDATE address SET address='$add' WHERE id=$address_id");
  if ($m===true && $d===true ) {
   echo " <script>alert('done')</script>" ;
  }
  else{
    echo " <script>alert('NOT done')</script>" ;
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



  ?> 

          
     <div class="main" id="container">
    <div class="content"> 
     
                       
           <div class="about_desc section" id="section-2"> 
              <div class="wrap">            
                  <div class="section group example">
            <div class="col_1_of_2 span_1_of_2">
           
                   <form action="profile.php" method="post" enctype="multipart/form-data">
      
       
        <fieldset>
          <legend><span class="number">1</span>معلومات أساسيه</legend>
          <label for="name">الإسم:</label>
          <input type="text" id="name" name="user_name" value="<?php echo $row['name']; ?>">
          
          <label for="mail">البريد الإليكتروني:</label>
          <input type="email" id="mail" name="email" value="<?php echo $row['email']; ?>">
         
          <label for="mail">رقم التلفون</label>
          <input type="text" id="phone" name="phone" value="<?php echo $row['phone']; ?>">
           
          <label for="password">كلمه المرور الجديده:</label>
          <input type="password" id="password" name="user_password" value="">
          
        
            <p class="file">
    <input type="file" name="file" id="file" />
    <label for="file">الصوره الشخية </label>
  </p>
          <div id="image_preview"><img id="previewing" src="images/noimage.jpg" /></div>
         </fieldset>
             <fieldset>

    <div id="loginform">
             <input type="submit" name="update" id="login" value="تحدبث البيانات">
        </div>
                   </fieldset>   
      
            </div>
            <div class="col_1_of_2 span_1_of_2">
 <br />
 
  <fieldset>
          <legend><span class="number">2</span>معلومات فرعيه</legend>
           
          
          <label for="mail">العنوان بالتفضيل </label>
          <textarea name="addres" cols="5" rows="10"><?php echo $row['address']; ?></textarea>
         
 
   
     <div id="loginform">
             <button id="login" style=color:"white"><a href="registration.php">حساب جديد</button></a>
        </div>
                   </fieldset>   
      </form> 


 </div> <!--- End one Row of timetable ------> 
         
              </div>             
          </div>  
          
         
      </div>
   <script>
   
  </script>
     
      
      
      
 <?php  include 'pages/footer.php'; ?>
