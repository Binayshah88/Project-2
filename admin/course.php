<?php require_once 'include/header.php'?>
<?php
    require_once '../include/dbconnect.php';
    if(isset($_GET['delete_id'])){
        $course = $_GET['delete_id'];
        $query1 = "DELETE FROM course WHERE course_id='$course';";
        $query1.="DELETE FROM addclass WHERE course_id = '$course';";
        $query1.="DELETE FROM joined_course WHERE course_id = '$course';";
        $query1.="DELETE FROM teacher_course WHERE course_id = '$course'";

        $result1 = mysqli_multi_query($conn, $query1);
        if($result1){
            $_SESSION['success'] = "The data has been deleted successfully";
            echo  
            '
                <script>
                    window.location.href = "course.php"
                </script>
            ';
        }
    }

    $query = "SELECT * from course";
    $result = mysqli_query($conn, $query);

    
?>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- DATA TABLE -->
                    <h3 class="title-5 m-b-35">Course Details</h3>
                    <div class="table-data__tool">
                        <div class="table-data__tool-left">
                            <button class="au-btn-filter">
                                <i class="zmdi zmdi-filter-list"></i>filters</button>
                        </div>
                        <div class="table-data__tool-right">
                            <a href="add_course.php" class="au-btn au-btn-icon au-btn--green au-btn--small">
                                <i class="zmdi zmdi-plus"></i>Add Course</a>
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
                                    <th>Course Description</th>
                                    <th>Course Image</th>
                                    <th></th>
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
                                    <td><?php echo $data['course_description']?></td>
                                    <td><img src="<?php echo '../assets/front/img/courses/'.$data['course_img']?>" width="75"></td>
                                    <td>
                                        <div class="table-data-feature">
                                            <a href="edit_course.php?id=<?php echo $data['course_id']?>" class="item"
                                                data-toggle="tooltip" data-placement="top" title="Edit">
                                                <i class="zmdi zmdi-edit"></i>
                                            </a>
                                            <a href="javascript:delete_id(<?php echo $data['course_id']; ?>)" class="item"
                                                data-toggle="tooltip" data-placement="top" title="Delete">
                                                <i class="zmdi zmdi-delete"></i>
                                            </a>
                                        </div>
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
<script>
function delete_id(id) {
    if (confirm('Are you sure you want to delete this?')) {
        window.location.href = 'course.php?delete_id=' + id;
    }
}
</script>

<?php require_once 'include/footer.php'?>