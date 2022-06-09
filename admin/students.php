<?php require_once 'include/header.php'?>
<?php
    require_once '../include/dbconnect.php';
    if(isset($_GET['delete_id'])){
        $uid = $_GET['delete_id'];
        $query1 = "DELETE FROM users WHERE uid= '$uid';";
        $query1.= "DELETE FROM student_event WHERE student_id = '$uid';";
        $query1.= "DELETE FROM joined_course WHERE student_id = '$uid'";
        $result1 = mysqli_multi_query($conn,$query1);
        if($result1){
            $_SESSION['success'] = "The data has been deleted successfully";
            echo  
            '
                <script>
                    window.location.href = "students.php"
                </script>
            ';
        }
        
        
    }

    $query = "SELECT * FROM users";
    $result = mysqli_query($conn, $query);

    
?>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- DATA TABLE -->
                    <h3 class="title-5 m-b-35">Student Details</h3>
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
                                    <th>Student Contact</th>
                                    <th>Student Email</th>
                                    <th>Student Address</th>
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
                                    <td><?php echo $data['contact']?></td>
                                    <td><?php echo $data['email']?></td>
                                    <td><?php echo $data['address']?></td>
                                    <td>
                                        <div class="table-data-feature">
                                            
                                            <a href="javascript:delete_id(<?php echo $data['uid']; ?>)" class="item"
                                                data-toggle="tooltip" data-placement="top" title="Delete">
                                                <i class="zmdi zmdi-delete"></i>

                                            <a href="reset_password.php?id=<?php echo $data['uid']?>" class="btn btn-secondary btn-sm ml-2">
                                                Rest Password
                                            </a>
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
        window.location.href = 'students.php?delete_id=' + id;
    }
}
</script>

<?php require_once 'include/footer.php'?>