<?php require_once 'include/header.php'?>
<?php
require_once 'include/dbconnect.php';
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "select * from teacher,course,teacher_course,addclass 
        WHERE teacher.teacher_id = teacher_course.teacher_id 
        AND 
        course.course_id = teacher_course.course_id 
        AND 
        addclass.course_id = course.course_id 
        AND 
        course.course_id = '$id'";
        $result = mysqli_query($conn,$query);
        $data = mysqli_fetch_assoc($result);
    }
?>
<section id="mu-page-breadcrumb">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="mu-page-breadcrumb-area">
           <h2>Course Detail</h2>
           <ol class="breadcrumb">
            <li><a href="#">Home</a></li>            
            <li class="active">Course Detail</li>
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
                <div class="mu-course-container mu-course-details">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="mu-latest-course-single">
                        <figure class="mu-latest-course-img">
                          <a href="#"><img src="<?php echo 'assets/front/img/courses/'.$data['course_img']?>" alt="img"></a>
                          <figcaption class="mu-latest-course-imgcaption">
                            <a href="#"><?php echo $data['course_name']?></a>
                            <span><i class="fa fa-clock-o"></i>90Days</span>
                          </figcaption>
                        </figure>
                        <div class="mu-latest-course-single-content">
                          <h4>Course Information</h4>
                          <ul>
                            <li> <span>Teacher</span> <span><?php echo $data['teacher_name']?></span></li>
                            <li> <span>Course Duration</span> <span>4 Weeks</span></li>
                            <li> <span>Course Start</span> <span><?php echo $data['class_date']?></span></li>
                          </ul>
                          <h4>Description</h4>
                          <p><?php echo $data['course_description']?></p>
                          <h4>Course Outline</h4>
                          <div class="table-responsive">
                            <table class="table">
                            <thead>
                              <tr>
                                <th> Title </th>
                                <th> Course Times </th>
                                <th> Status </th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td><?php echo $data['course_name']?></td>
                                <td> <?php echo $data['time1']?><br><?php echo $data['time2']?><br><?php echo $data['time3']?></td>
                                <td>
                                    <?php if(isset($_SESSION['uid'])):?>
                                        <a href="all_course.php" class="btn btn-primary btn-sm">Join course</a>
                                    <?php else:?>
                                        <a href="login.php" class="btn btn-danger btn-sm">Login</a>
                                    <?php endif?>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                          </div>
                        </div>
                      </div> 
                    </div>                                   
                  </div>
                </div>
                <!-- end course content container -->
                <!-- start related course item -->
                <!-- end start related course item -->
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
                  <!-- end single sidebar -->
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