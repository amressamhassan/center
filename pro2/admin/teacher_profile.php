<?php 

   include 'include/header.php';  
if(!isset( $_SESSION['emil']))
{
	
	HEADER ("location:../project_SW/");
} 
   
?>  
<div class="modal fade" id="myteacher" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header sun">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h2 class="modal-title" id="myModalLabel">  محمد علي جاد   </h2>
      </div>
      <div class="modal-body">
       <div class="student_img">
       	<img src="img/user.png" width="80" height="80" />
       </div>
     
       <p> عدد المواد المسجله للمدرس  : 1 </p>
       <p> عنوان المدرس   : مدينه نصر - 9شارع مصطفي النحاس </p>
       <table class="table">
               	<tr>
               		<td>
               			<font color="red">
               				المسلسل
               			</font>
               		</td>
               		<td>
               			<font color="red">
               				اسم الماده
               			</font>
               		</td>
               		<td>
               			<font color="red">
               				معاد الماده 
               			</font>
               		</td>
             
               	</tr>
               	<tr>
               		<td>
               			<font color="black">
               			1
               			</font>
               		</td>
               		<td>
               			<font color="black">
               				لغه عربيه
               			</font>
               		</td>
               		<td>
               			<font color="black">
               			 12:30 . الخميس
               			</font>
               		</td>
               		 
               	</tr>
               	  <tr>
                  <td>
                    <font color="black">
                    1
                    </font>
                  </td>
                  <td>
                    <font color="black">
                      لغه عربيه
                    </font>
                  </td>
                  <td>
                    <font color="black">
                     12:30 . الخميس
                    </font>
                  </td>
                  
                </tr>
                        <tr>
                  <td>
                    <font color="black">
                   3
                    </font>
                  </td>
                  <td>
                    <font color="black">
                      لغه عربيه
                    </font>
                  </td>
                  <td>
                    <font color="black">
                     12:30 . الخميس
                    </font>
                  </td>
              
                </tr>
                      </table>

        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger">حذف الموعد</button>
        <button type="button" class="btn btn-warning">تعديل الموعد</button>
      </div>
    </div>
  </div>
</div> 
  
       