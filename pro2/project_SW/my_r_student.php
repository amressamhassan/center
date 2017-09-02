  <?php
session_start();
 if(!@$_SESSION['student'])
 {
  
HEADER ("location:index.php");
}
 
  include 'pages/header-2.php'; 



$amr=new timetable;
$amrr=new student;

	$err="";
	$a=$amr->show_day("day");
	$id=array();
	$day=array();
	$i=1;
	 while($row=mysql_fetch_array($a)){
	 $id[$i]=$row['id'];
	 $day[$i]=$row['day'];
	 $i++; 
	 }
	if(isset($_POST['submit'])) {
		
if($amrr->add_registration($amr,@$_POST['h'],$_SESSION['id'],@$_POST['level']))
{
	
$err="تم بنجاح";
	}
	else
	{
		$err="خطاء المعاد الذى سجلته الان يتعرض مع مواعيد قمت بتسجيها من قبل";
		
	}
	}
	

	 ?>		
    
  <script>
function showUser(str,x) {
	
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
        xmlhttp.open("GET","getuser.php?q="+str+"&&x="+x,true);
        xmlhttp.send();
    }
    
}

function show(str,type,x) {
	
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
        xmlhttp.open("GET","getuser.php?q="+str+"&&type="+type+"&&x="+x,true);
        xmlhttp.send();
    }
    
}


function sh(str,t,level,x) {
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
        xmlhttp.open("GET","getuser.php?q="+str+"&&t="+t+"&&level="+level+"&&x="+x,true);
        xmlhttp.send();
    }
    
}
</script>
<br><br><br>
<div class="page-title" dir="rtl">
    	
        <div class="container">
        	      <center>

<th>نموذج الاستمارة</th>
  
        </center>
        </div>
        
    </div><!-- /page-title -->
        
    <div class="h-recent-work">
      
<br><br>
  	<div class="container" dir="rtl"> 
    <div class="row">
        <div class="col-md-12">
        <form action="" method="post" id="registration_form">
  
        <br>
                   <center>
        <table  class="table table-striped" border="3" width="100%">
          <tr>
                <td  width="3%">رقم المادة</td>
                <td width="20%">المادة</td>
                <td width="30%">المدرس</td>
                <td width="10%">اليوم</td>
                <td width="10%">الساعه</td>
            </tr>
            <tr>
            
                <td>1</td>
				<?php 
$sql="select subject.subject AS subject
,subject_level.id As id 
from subject join subject_level on subject_level.id_subject =subject.id 
where subject_level.id_level=$_SESSION[id_level]";

$query=mysql_query($sql);

				?>
                <td>  <select  name="level" onchange="showUser(this.value,1)" width="300" style="width: 100%">
                 <option selected value="">المادة
                        </option>
						<?php
						while($row=mysql_fetch_array($query)){
						?>
                  <option value="<?php echo $row['id']?>"><?php echo $row['subject']?>
                        </option>
						<?php 
						}
                       ?>
               </select>
               
               
               </td>
             <td> 
 <div id="txtHint">
         
 </div >
           </td>
            
               <td id="txtHin"> 
  

            </td>
               <td id="h"> 
            
               
               
               </td>
            </tr>

   
                
            
             </table>       
            </center>			 
            <div>
			
			<br> <br>
                  <center>
				  <?php
			echo $err;
			?>
                 <input type="submit"  class="btn btn-success" name="submit" value="تسجيل" /> 
                  </center>
            </div>
     </form>
      
        </div>
    </div>      
 
        
        
        
    	</div><!-- /container -->
    
        
        </div><!-- /.h-recent-work -->
</div>

              <?php
	for ($i=1; $i <=7; $i++){
	 
    $num=$amr->number_of_time($id[$i]);
	if(mysql_num_rows($num)>0)
	{
?>	         

	
 <div class="wrap">            
  <div class="section group example">
				 
<h3><?php  echo $day[$i];
?></h3>
<table class="example-table">
<tbody>
<tr>
<th>اسم الماده</th>
<th>المرحله الدراسيه </th>
<th>اسم المدرس</th>
<th>رقم القاعة</th>
<th>من</th>
<th>إلي</th>
</tr>
<?php }
while ($row=mysql_fetch_array($num)){
		  $t=$amr->show_time_table($row['ID']);
	  ?>
<tr>
<td><?php   echo  $t['sub']."<br>";   ?> </td>
<td><?php  echo  $t['level']."<br>";  ?></td>
<td> <?php  echo  $t['name']."<br>";  ?></td>
<td> <?php  echo  $t['hall_num']."<br>";  ?></td>
<td><?php  echo  $t['Start']."<br>";  ?></td>
<td><?php  echo  $t['End']."<br>";  ?></td>
</tr>
</tbody>
<?php  }?>
</table>	

</div>
</div>	<!--- End one Row of timetable ------>     
 <?php }
 ?>
        <br> <br> <br> <br> <br>
 <?php  include 'pages/footer.php'; ?>