<?php 
    require_once 'include/dash_header.php';
    require_once 'include/dbconnect.php';
    $uid = $_SESSION['uid'];
    $query = "SELECT addclass.class_date,course.course_name,teacher.teacher_name,joined_course.joined_date 
                FROM joined_course 
                JOIN course on course.course_id = joined_course.course_id 
                JOIN teacher_course on teacher_course.course_id = course.course_id 
                JOIN teacher on teacher.teacher_id = teacher_course.teacher_id 
                JOIN addclass on addclass.course_id = course.course_id
                WHERE joined_course.student_id = '$uid'";
    $result = mysqli_query($conn, $query);
?>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- DATA TABLE -->
                    <h3 class="title-5 m-b-35">My Course Details</h3>
                    <div class="table-data__tool">
                        <div class="table-data__tool-left">
                            <button class="au-btn-filter">
                                <i class="zmdi zmdi-filter-list"></i>filters</button>
                        </div>
                    </div>
                    <?php if(isset($_SESSION['success'])):?>
                    <div class="alert alert-success"><?php echo $_SESSION['success']; unset($_SESSION['success']);?>
                    </div>
                    <?php endif?>
                    <div class="table-responsive table-responsive-data2">
                        <table class="table table-data2">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Course Name</th>
                                    <th>Course Start Date</th>
                                    <th>Instructor Name</th>
                                    <th>Joined Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(mysqli_num_rows($result) == 0): ?>
                                <tr>
                                    <td colspan="8" class="text-center">No Data Found</td>
                                </tr>
                                <?php endif?>
                                <?php foreach($result as $i => $data):?>
                                <tr class="tr-shadow">
                                    <td><?php echo ++$i;?></td>
                                    <td><?php echo $data['course_name']?></td>
                                    <td><?php echo $data['class_date']?></td>
                                    <td><?php echo $data['teacher_name']?></td>
                                    <td><?php echo $data['joined_date']?></td>
                                </tr>
                                <tr class="spacer"></tr>
                                <?php endforeach?>
                            </tbody>
                        </table>
                    </div>
                    <!-- END DATA TABLE -->
                </div>
            </div>
        </div>
    </div>
</div>



<?php 
    require_once 'include/dash_footer.php';
?>