<?php require_once 'include/header.php'?>
<?php
    require_once '../include/dbconnect.php';
    if(isset($_GET['delete_id']) && isset($_GET['delete_course_id'])){
        $query = "DELETE FROM joined_course WHERE student_id =".$_GET['delete_id'] . " AND course_id =".$_GET['delete_course_id'];
        $result = mysqli_query($conn,$query);
        $_SESSION['success'] = "The data has been deleted successfully";
        
    }

    $query = "SELECT * from users,joined_course,course
    WHERE users.uid = joined_course.student_id
    AND course.course_id = joined_course.course_id";
    $result = mysqli_query($conn, $query);

    
?>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- DATA TABLE -->
                    <h3 class="title-5 m-b-35">Joined Course</h3>
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
                                    <th>Student Name</th>
                                    <th>Course Name</th>
                                    <th>Course Description</th>
                                    <th>Student Email</th>
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
                                    <td><?php echo $data['name']?></td>
                                    <td><?php echo $data['course_name']?></td>
                                    <td><?php echo $data['course_description']?></td>
                                    <td><?php echo $data['email']?></td>
                                    <td>
                                        <div class="table-data-feature">
                                            <a href="#" class="item"
                                                data-toggle="tooltip" data-placement="top" title="Edit">
                                                <i class="zmdi zmdi-edit"></i>
                                            </a>
                                            <a href="javascript:delete_id(<?php echo $data['student_id'];?>,<?php  echo $data['course_id']?>)" class="item"
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
function delete_id(id,course_id) {
    if (confirm('Are you sure you want to delete this?')) {
        window.location.href = 'join.php?delete_id='+id+'&delete_course_id='+course_id;
    }
}
</script>

<?php require_once 'include/footer.php'?>