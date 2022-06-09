<?php 
    require_once 'include/dash_header.php';
    require_once 'include/dbconnect.php';
    $query = "SELECT * from teacher,teacher_course,addclass,course
    WHERE 
    teacher.teacher_id = teacher_course.teacher_id
    AND
    course.course_id = teacher_course.course_id
    AND
    addclass.course_id = course.course_id";
    $result = mysqli_query($conn, $query);
?>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- DATA TABLE -->
                    <h3 class="title-5 m-b-35">Event Details</h3>
                    <div class="table-data__tool">
                        <div class="table-data__tool-left">
                            <button class="au-btn-filter">
                                <i class="zmdi zmdi-filter-list"></i>filters</button>
                                
                        </div>
                        <div class="table-data__tool-right">
                            <a href="event/index.php" class="au-btn au-btn-icon au-btn--green au-btn--small">
                                <i class="zmdi zmdi-plus"></i>View Class</a>
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
                                    <th>Action</th>
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
                                    <?php
                                        $uid = $_SESSION['uid'];
                                        $id = $data['course_id'];
                                        $query1 = "SELECT * FROM joined_course WHERE student_id = '$uid' AND course_id = '$id'";
                                        $result1 = mysqli_query($conn,$query1); 
                                    ?>
                                    <td>
                                        
                                        <?php if(mysqli_num_rows($result1) == 0):?>
                                            <a href="include/form.php?class=<?php echo $data['course_id']?>" class="btn btn-primary btn-sm">
                                            Join Class</a>
                                        <?php else:?>
                                            <a href="javascript:void(0)" class="btn btn-success btn-sm">You have joined this class</a>
                                        <?php endif?>
                                    </td>
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