<?php
session_start();
if(@$_SESSION['techer']||@$_SESSION['student'])
{
  include 'pages/header-2.php';}
else {
	  include 'pages/header.php';
}
 ?>		      	
   <?php  
 
   $control1=new control;
  ?>      	
     <div class="main" id="container">
	 	<div class="content">	
	 		 <div class="content_top section" id="section-1">  
	 		     <div class="wrap">                                  		
            	   <div class="banner_desc">
            	      <div class="wmuSlider example1">
							<div class="wmuSliderWrapper">
							<article><p>مشروع النظام التعليمي الجديد </p> <img src="images/clouds.png"  alt="" /> </article>
							<article><p>أكبر ساحه تعليميه تجمع بين الطالب والمدرس</p> <img src="images/system.png"  alt="" /> </article>
							<article><p>اشترك الآن وشاهد الدروس التعليميه المختلغه</p> <img src="images/slider-img3.png"  alt="" /> </article>
							<article><p> أصبح التعليم امرا يسيرا الآن </p> <img src="images/slider-img4.png"  alt="" /> </article>
							</div>
                       </div>
            	      <script src="js/jquery.wmuSlider.js"></script> 
						<script type="text/javascript" src="js/modernizr.custom.min.js"></script> 
						<script>
       						 $('.example1').wmuSlider();         
   						 </script> 	   
   						         	      
            		<div class="dropdown-buttons">   
            		  <div class="dropdown-button">           			
            			<select class="dropdown" tabindex="9" data-settings='{"wrapperClass":"flat"}'>
            			<option value="0">السبت</option>	
						<option value="1">الأجد</option>
						<option value="2">الأثنين</option>
						<option value="3">الثلاثاء</option>
						<option value="4">الأربعاء</option>
						<option value="5">الخميس</option>
						<option value="6"> </option>
						<option value="6"> </option>
						 
					  </select>
					</div>
				     <div class="dropdown-button">
					  <select class="dropdown" tabindex="9" data-settings='{"wrapperClass":"flat"}'>
            			<option value="0">القاعه الأولي</option>	
						<option value="1">القاعه الصانيه</option>
						<option value="2">القاعه الثالثه</option>
						<option value="3">القاعه الرابعخ</option>
						<option value="4">   </option>
						 
						 
					  </select>
					 </div>
				   </div>          		
                 		 <div class="quote_button">
                  	 		<a class="popup-with-zoom-anim" href="#small-dialog">حجز القاعة الآن</a>
                  	 				<div id="small-dialog" class="mfp-hide">
					                       <div class="priceing-tabel">
												<div class="priceing-header">
													<h4>حجز قاعات</h4>
													<a href="#">السعر<label>$29/month</label></a>
												</div>
												<ul>
													<li><a href="#">قاعات مكيفه</a></li>
													<li><a href="#">تسع لأكثر من 200 طالب</a></li>
													<li><a href="#">مكبرات صوت عاليه الجوده</a></li>
													<li><a href="#">خدمات أوفيس </a></li>
												</ul>
												<a class="price-btn" href="#">اطلب الآن</a>
											</div>
										</div>
                 				 </div>                
              				</div>
          				</div>
        		<div class="comment_icons">
                	<ul>
                		<li><a class="comments" href="#"> <span><?php echo $control1->show_num("SELECT * FROM user WHERE user_type_id=2"); ?> معلم</span> </a></li>
                		<li><a class="email" href="#"> <span><?php echo $control1->show_num("SELECT * FROM questions_user"); ?> سؤال</span> </a></li>
                		<li><a class="like" href="#"> <span><?php echo $control1->show_num("SELECT * FROM user WHERE user_type_id=3"); ?> طالب</span> </a></li>
                	</ul>
                </div>
     		 </div>
                       
           <div class="about_desc section" id="section-2"> 
              <div class="wrap">            
                 	<div class="section group example">
						<div class="col_1_of_2 span_1_of_2">
						   <h3> التعليم المفتوج </h3>
						   <img src="images/svg/Application-Map.svg" class="image_index" />
						   <p><span>جيع طفلكم على استخدام الوظائف المتضمنة في “myskoool” لاستدعاء المواد التعليمية وتحميلها على سطح مكتب الحاسب الشخصي، يتوافر لديه محتوى 
						   	رائع من المادة التعليمية دون الحاجة إلى استمرارية الاتصال بشبكة الإنترنت؛ هذا يعني أنه يمكنه التعلم بتفاعل ونشاط دون تكلفة إضافية تتحملها فواتير الهاتف</span></p>
    
    
		 				</div>
						<div class="col_1_of_2 span_1_of_2">
						   <h3>شارك زملاءك الأسئله</h3>
						   <img src="images/svg/Tower.svg" class="image_index" />
						   <p><span> لا شك في أن موقع "سكووول" يمثل سابقة مميزة في حقل الخدمات التربوية-التعليمية، فهو يقدم تعليمياً جديداً ومحتوى متطوراً، وفي الوقت ذاته يحرر التعليم الإلكتروني من مشكلة ارتباطه بأسطح مكاتب الحواسيب، وبطء الاتصال بالشبكة، مما يوفر تعليماً حقيقياً في كل زمان ومكان. .</span></p>
						   <p>  
						   	تشجيع طفلكم على استخدام الوظائف المتضمنة في “myskoool” لاستدعاء المواد التعليمية وتحميلها على سطح مكتب الحاسب الشخصي، يتوافر لديه محتوى 
						   	رائع من المادة التعليمية دون الحاجة إلى استمرارية الاتصال بشبكة الإنترنت؛ هذا يعني أنه يمكنه التعلم بتفاعل ونشاط دون تكلفة إضافية تتحملها فواتير الهاتف 
						   	</p>
						   	</div>
				    </div>	        
           	  </div>             
       	  </div>  
       	  
       	    <div class="features section" id="section-3">      	      	      	   	
       	   	 	<h2>كيف يعمل الموقع </h2>
       	   
       	    <!------ Slider ------------>	 
       	    <div class="browser" dir="ltr">  	       
       	   	    <div id="mySliderTabsContainer">
	               <div id="mySliderTabs">
	               <ul>
	                <li><a class="cloud_icon" href="#mother"><i class="cloud_icon"> </i></a></li>
	                <li><a class="cross" href="#parks">  <i class="cross"> </i> </a></li>
	                <li><a class="bubble" href="#theOffice"><i class="bubble"> </i></a></li>
	                <li><a class="right_arrow" href="#southPark"> <i class="right_arrow"> </i></a></li>
	              </ul>
	              <div id="mother">
	              	<img src="images/site/01.jpg" alt="" />
	              </div>
	              <div id="parks">
	                 <img src="images/site/02.jpg" alt="" />
	              </div>
	              <div id="theOffice">
	              	<img src="images/site/03.jpg" alt="" />
	              </div>
	              <div id="southPark">
	              	<img src="images/site/04.jpg" alt="" />
	              </div>             
	            </div>
	            <div class="clear"></div>
	          </div>
          </div>
            <link rel="stylesheet" href="css/jquery.sliderTabs.min.css">
			<script src="js/jquery.sliderTabs.min.js"></script> 
			<script>
				 $(document).ready(function(){
				      var tabs = $("div#mySliderTabs").sliderTabs({
				        autoplay:5000,
				        indicators: true,
				        panelArrows: true,
				        panelArrowsShowOnHover: true
				      });      
				/*      $("#mySliderTabsContainer").resizable({
				        maxHeight: 200,
				        minHeight: 200,
				        maxWidth: 605
				      });
				*/
				      prettyPrint();
				    });
				
				    $(document).delegate(".nav-list li a", "click", function(){
				      $(this).parent().siblings().removeClass("active");
				      $(this).parent().addClass("active");
				    });	
			</script>
		    <!------End Slider ------------>
       	   </div>  
       	 </div>
      </div>
 <?php  include 'pages/footer.php'; ?>
