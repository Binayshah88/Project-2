<?php require_once 'include/header.php'?>
<?php 
require_once 'include/dbconnect.php';

    $search = $_POST['search_items'];

    $query = "SELECT * from course WHERE course_name LIKE '%$search%'";
    $result = mysqli_query($conn,$query);
?>
<section id="mu-page-breadcrumb">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="mu-page-breadcrumb-area">
           <h2>Searched Result</h2>
           <ol class="breadcrumb">
            <li><a href="#">Home</a></li>            
            <li class="active">Course Result</li>
          </ol>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- End breadcrumb -->
 <section id="mu-course-content">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="mu-course-content-area">
            <div class="row">
              <div class="col-md-9">
                <!-- start course content container -->
                <div class="mu-course-container">
                  <div class="row">
                    <?php foreach($result as $data):?>                  
                    <div class="col-md-6 col-sm-6">
                      <div class="mu-latest-course-single">
                        <figure class="mu-latest-course-img">
                          <a href="#"><img src="<?php echo 'assets/front/img/courses/'.$data['course_img']?>" alt="img" height="250"></a>
                          <figcaption class="mu-latest-course-imgcaption">
                            <a href="#"><?php echo $data['course_name']?></a>
                            <span><i class="fa fa-clock-o"></i>90Days</span>
                          </figcaption>
                        </figure>
                        <div class="mu-latest-course-single-content">
                          <h4><a href="#">Description</a></h4>
                          <p><?php echo $data['course_description']?></p>
                          <div class="mu-latest-course-single-contbottom">
                            <a class="mu-course-details" href="coursedetails.php?id=<?php echo $data['course_id']?>">Details</a>
                          </div>
                        </div>
                      </div> 
                    </div>
                    <?php endforeach?>                  
                  </div>
                </div>
                <!-- end course content container -->
                <!-- start course pagination -->
                <div class="mu-pagination">
                  <nav>
                    <ul class="pagination">
                      <li>
                        <a href="#" aria-label="Previous">
                          <span class="fa fa-angle-left"></span> Prev 
                        </a>
                      </li>
                      <li class="active"><a href="#">1</a></li>
                      <li><a href="#">2</a></li>
                      <li><a href="#">3</a></li>
                      <li><a href="#">4</a></li>
                      <li><a href="#">5</a></li>
                      <li>
                        <a href="#" aria-label="Next">
                         Next <span class="fa fa-angle-right"></span>
                        </a>
                      </li>
                    </ul>
                  </nav>
                </div>
                <!-- end course pagination -->
              </div>
              <div class="col-md-3">
                <!-- start sidebar -->
                <aside class="mu-sidebar">
                  <!-- start single sidebar -->
                  <div class="mu-single-sidebar">
                    <h3>Categories</h3>
                    <ul class="mu-sidebar-catg">
                      <li><a href="#">Web Design</a></li>
                      <li><a href="">Web Development</a></li>
                      <li><a href="">Math</a></li>
                      <li><a href="">Physics</a></li>
                      <li><a href="">Camestry</a></li>
                      <li><a href="">English</a></li>
                    </ul>
                  </div>
                </aside>
                <!-- / end sidebar -->
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>

 <?php require_once 'include/footer.php'?>
