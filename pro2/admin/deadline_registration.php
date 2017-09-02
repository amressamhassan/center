<?php 

   include 'include/header.php';  
 
if(!isset( $_SESSION['emil']))
{
	
	HEADER ("location:../project_SW/");
} 

  ?>
    <style type="text/css">

  #registration_form  input,select{
      width: 250px;
      height: 50px;
      padding: 10px;
      margin: 15px;
    }

    </style>
<div class="page-title" dir="rtl">
      
        <div class="container">
                <center>

<h1>اضافه مواعيد الدروس بالمركز <i class="fa fa-clock-o"></i></h1>
  
        </center>
        </div>
        
    </div><!-- /page-title -->
        
    <div class="h-recent-work">
    <div class="container" dir="rtl"> 
    <div class="row">
        <div class="col-md-12">
        <center>
        <form action="" method="post" id="registration_form">
        <table   width="100%">
            <tr>
                <td>اسم الماده</td>
                <td>
             
                <select  name="type" width="300" style="width: 50%">
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
            </tr>


                 <tr>
                <td>اسم المدرس</td>
                <td> <select  name="type" width="300" style="width: 50%"><!--اليوم-->
                <option value="" selected="selected">اسم المدرس </option>
<option value="1">احمد عبد العال</option>

               </select>
               
           </td>
            </tr>
               <tr>
                <td>اليوم</td>
                <td>
                 <select  name="type" width="300" style="width: 50%"><!--اليوم-->
                <option value="" selected="selected">اليوم </option>
<option value="1">سبت</option>
<option value="2">أحد</option>
<option value="3">إثنين</option>
<option value="4">ثلاثاء</option>
<option value="5">أربعاء</option>
<option value="6">خميس</option>
<option value="7">جمعة</option>
               </select>
               
               
            </td>
        </tr>
 <tr>
                <td>من</td>

                  <td>
        <select  name="type" width="300" style="width: 50%">><!--الساعه-->
                  <option selected="selected" value="">الساعة</option>
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
           <tr>
                <td>الى</td>
                <td>
                 <select  name="type" width="300" style="width: 50%">><!--الساعه-->
                  <option selected="selected" value="">الساعة</option>
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
                 <br> <br> <br> <br> <br>
            <div>
                  <center>
                 <input type="submit"  name="submit" value="تسجيل" class="btn btn-success" /> 
                  </center>
            </div>
     </form>
      </center>
        </div>
    </div>      
 
        
        
        
      </div><!-- /container -->
    
        
        </div><!-- /.h-recent-work -->

</div>
        
     <?php include 'include/footer.php';  ?>
    