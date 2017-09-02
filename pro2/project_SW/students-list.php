 <?php  
session_start();
if(!@$_SESSION['techer'])
 {
HEADER ("location:index.php");
}
   include 'pages/header-2.php'; 


	$amrrr= new exam;
	$amrr= new teacher;
?>		      	
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
        xmlhttp.open("GET","list_level-ajax.php?q="+str,true);
        xmlhttp.send();
    }
    
}
function showUse(str) {
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
        xmlhttp.open("GET","list_time_ajax.php?q="+str,true);
        xmlhttp.send();
    }
    
   
}
function showResult(str) {
  if (str.length==0) { 
    document.getElementById("txtHint").innerHTML="";
    document.getElementById("txtHint").style.border="0px";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
      document.getElementById("txtHint").style.border="1px solid #A5ACB2";
    }
  }
  xmlhttp.open("GET","list_time_ajax.php?q="+str,true);
  xmlhttp.send();
}

</script>
     <div class="main" id="container">



                       
           <div class="about_desc section" id="section-2"> 
              <div class="wrap">            
            	 	<div class="content">	



            <div id="search">
            	<form id="" method="get" action="">
            		<input  onkeyup="showResult(this.value)"  type="text" name="search" placeholder="ابحث عن الطالب" required />
            		<input type="submit" name="" value="بحث"/>
            	</form>
            	
            </div>  
           <div id="selection">
            	<form id="" method="get" action="">
            	<select onchange="showUser(this.value)"  id="first" name="time">
            		<option checked value="0" >عرض بالمعاد</option>
                       <?php
      $result=$amrr->show_time($_SESSION['id']);
	  while ($level=mysql_fetch_array($result)){
             	       ?>
     <option  value="<?php echo $level['id']?>"><?php echo $level['day']."  ".$level['Start']?></option>
 <?php }


 ?>            	</select>
            	
      
<select onchange="showUse(this.value)" id="second" name="level">
	
	<option checked value="0" >عرض بالمستوى</option>
              <?php
     $result=$amrrr->show_level();
	 while ($level=mysql_fetch_array($result)){
      ?>
     <option  value="<?php echo $level['id']?>"><?php echo $level['level']?>
	 </option>
 <?php }
?>
	
</select>


<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script>
jQuery(function($) {
    $('#first').on('change', function() {
        var sel = $('option:selected', this).val();
        $('#second option').filter(function(index, el) {
            return el.value == 0;
        }).prop('selected', true);
    });
});
jQuery(function($) {
    $('#second').on('change', function() {
        var sel = $('option:selected', this).val();
        $('#first option').filter(function(index, el) {
            return el.value == 0;
        }).prop('selected', true);
    });
});
</script>
            	</form>
            	
            </div>  
             
	<h1 class="head"> قائمه الطلاب  المسجلين  مع الأستاذ :    </h1>
	</div>
<div id="txtHint">
<h1>من فضلك اختار الاليه البحث لتيسر عليك البحث  عن الطلاب</h1>		 
 
        	   </div>         
       	  </div>  
           	            
       	  </div>  
       	  </div>
       	 
      </div>
 <?php  include 'pages/footer.php'; ?>
