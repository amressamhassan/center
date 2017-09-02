<?php 
  
   include 'include/header.php';  
if(!isset( $_SESSION['emil']))
{
	
	HEADER ("location:../project_SW/");
} 
?> 
 
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
        xmlhttp.open("GET","getuser.php?q="+str,true);
        xmlhttp.send();
    }
    
}
function show(str) {
    if (str == "") {
        document.getElementById("txtHin").innerHTML = "";
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
                document.getElementById("txtHin").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","day.php?d="+str,true);
        xmlhttp.send();
    }
    
}
function sh(str) {
    if (str == "") {
        document.getElementById("h").innerHTML = "";
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
                document.getElementById("h").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","h.php?hh="+str,true);
        xmlhttp.send();
    }
    
}
</script>
<div class="page-title" dir="rtl">
    	
        <div class="container">
        	      <center>

<h1>نموذج الاستمارة</h1>
  
        </center>
        </div>
        
    </div><!-- /page-title -->
        
    <div class="h-recent-work">
      
<br><br>
  	<div class="container" dir="rtl"> 
    <div class="row">
        <div class="col-md-12">
        <form action="" method="post" id="registration_form">
        <table  width="50%">
        <tr>
        <td width="25%">كود الطالب</td>
        <td width="25%">
  <div class="input-group input">
  <input type="text" class="form-control" placeholder="كود الطالب" required>
        </div>
        </td>
        </tr>
        </table>
        <br>
       
        <table  class="table table-striped" border="1" width="60%">
          <tr>
                <td width="3%">رقم المادة</td>
                <td width="30%">المادة</td>
                <td width="30%">المدرس</td>
                <td width="20%">اليوم</td>
                <td width="20%">الساعه</td>
            </tr>
            <tr>
            
                <td>1</td>
                <td>  <select  name="type" onchange="showUser(this.value)" width="300" style="width: 100%">
                 <option selected value="">المادة
                        </option>
                  <option value="1">علوم
                        </option>
                         <option value="2">دراسات
                        </option>
                         <option value="3">عربى
                        </option>
                         <option value="4">انجليزى
                        </option>
                         <option value="5">رياضة
                        </option>
                         <option value="6">احصاء
                        </option>
                        <option value="7">اقتصاد
                        </option>
                         <option value="8">كيمياء
                        </option>
                         <option value="9">فيزياء
                        </option>
                         <option value="10">احياء
                        </option>
                         <option value="11">تاريخ
                        </option>
                         <option value="12">علم نفس 
                        </option>
                         <option value="13">فلسفة
                        </option>
                         <option value="14">جغرايا
                        </option>
                        <option value="15">فرنسى
                        </option>
                        <option value="16">المانى
                        </option>
                        <option value="17">ايطالى
                        </option>
               </select>
               
               
               </td>
             <td> 
 <div id="txtHint">
              <select  name="type" width="300" style="width: 100%">
              <option selected >اسم المدرس</option>
                  <option value="1">احمد
                        </option>
                         <option value="2">محمد
                        </option>
               </select>
 </div >
           </td>
            
               <td id="txtHin"> 
      <select  name="type" width="300" style="width: 100%"><!--اليوم-->
                <option  selected="selected">اليوم </option>
<option value="1">سبت</option>
<option value="2">أحد</option>
<option value="3">إثنين</option>
<option value="4">ثلاثاء</option>
<option value="5">أربعاء</option>
<option value="6">خميس</option>
<option value="7">جمعة</option>
               </select>
            </td>
               <td id="h"> 
            
                 <select  name="type" width="300" style="width: 100%"><!--الساعه-->
                    <option selected="selected">الساعة</option>
                <option  value="11:00">11:00 am</option>
                <option value="11:30">11:30 am</option>
                <option value="12:00">12:00 pm</option>
                <option value="12:30">12:30 pm</option>
                <option value="13:00">1:00 pm</option>
                <option value="13:30">1:30 pm</option>
                 <option value="13:00">2:00 pm</option>
                <option value="13:30">2:30 pm</option>
                 <option value="13:00">3:00 pm</option>
                <option value="13:30">3:30 pm</option>
                 <option value="13:00">4:00 pm</option>
                <option value="13:30">4:30 pm</option>
                 <option value="13:00">5:00 pm</option>
                <option value="13:30">5:30 pm</option>
                 <option value="13:00">6:00 pm</option>
                <option value="13:30">6:30 pm</option>
                   <option value="13:00">7:00 pm</option>
                <option value="13:30">7:30 pm</option>
                   <option value="13:00">8:00 pm</option>
                <option value="13:30">8:30 pm</option>
               </select>
               
               </td>
            </tr>

   
                
            
             </table>                  
            <div>
                  <center>
                 <input type="submit"  class="btn btn-success" name="submit" value="تسجيل" /> 
                  </center>
            </div>
     
      
        </div>
    </div>      
 
        
        
        
    	</div><!-- /container -->
    
        
        </div><!-- /.h-recent-work -->

</div>
        
     <?php include 'include/footer.php';  ?>
    