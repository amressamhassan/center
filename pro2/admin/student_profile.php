<?php 

   include 'include/header.php';  
if(!isset( $_SESSION['emil']))
{
	
HEADER ("location:../project_SW/");
} 
   
?>  
<div class="modal fade" id="mystudent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header red">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h2 class="modal-title" id="myModalLabel">  محمد علي جاد   </h2>
      </div>
      <div class="modal-body">
       <div class="student_img">
       	<img src="img/user.png" width="80" height="80" />
       </div>
       <p> المرحلة التعليميه : الثاني الإعدادي </p>
       <p> عدد المواد المسجله للطالب  : 7 </p>
       <p> عنوان الطالب   : مدينه نصر - 9شارع عباس العقاد </p>
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
               		<td>
               			<font color="red">
               				اسم المدرس
               			</font>
               			 </td>
               		 <td>
               			<font color="red">
               				ملاحظات
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
               		<td>
               			<font color="black">
               				ولى الامر
               			</font>
               			</td>
               		<td>
               			<font color="black">
               				ملاحظات
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
                  <td>
                    <font color="black">
                      ولى الامر
                    </font>
                    </td>
                  <td>
                    <font color="black">
                      ملاحظات
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
                  <td>
                    <font color="black">
                      ولى الامر
                    </font>
                    </td>
                  <td>
                    <font color="black">
                      ملاحظات
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
 
       