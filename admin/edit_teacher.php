<?php require_once 'include/header.php'?>
<?php
require_once '../include/dbconnect.php';
    if($_GET['id']){    
        $id = $_GET['id'];
        $query = "SELECT * From teacher where teacher_id = '$id'";
        $result = mysqli_query($conn,$query);
        $data = mysqli_fetch_assoc($result);

    }
$query1 = "SELECT * from course";
$result1 = mysqli_query($conn,$query1);
?>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <?php if (isset($_SESSION['success'])): ?>
                            <div class="alert alert-success"><?php echo $_SESSION['success'];unset($_SESSION['success']); ?></div>
                        <?php elseif (isset($_SESSION['error'])): ?>
                            <div class="alert alert-danger"><?php echo $_SESSION['error'];unset($_SESSION['error']); ?></div>
                        <?php endif?>
                        <div class="card-header">Teacher</div>
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Teacher</h3>
                            </div>
                            <hr>
                            <form action="include/admin_form.php" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Teacher Name</label>
                                    <input name="teacher_name" type="text" class="form-control" value="<?php echo $data['teacher_name']?>">
                                </div>
                                <div class="form-group has-success">
                                    <label for="cc-name" class="control-label mb-1">Teacher Contact</label>
                                    <input name="teacher_contact" type="number" class="form-control cc-name valid" value="<?php echo $data['teacher_contact']?>">
                                </div>
                                <div class="form-group has-success">
                                    <label for="cc-name" class="control-label mb-1">Course Taught</label>
                                    <select name="course_taught" class="form-control">
                                        <option value="">-------------</option>
                                        <?php foreach($result1 as $data1):?>
                                            <option value="<?php echo $data1['course_id']?>"><?php echo $data1['course_name']?></option>
                                        <?php endforeach?>
                                    </select>
                                </div>
                                <div class="form-group has-success">
                                    <label for="cc-name" class="control-label mb-1">Upload image</label>
                                    <input name="image" type="file" class="form-control cc-name valid">
                                </div>
                                <input type="hidden" name="images" value="<?php echo $data['image']?>">
                                <input type="hidden" name="teacher_id" value="<?php echo $data['teacher_id']?>">
                                <div>
                                    <input id="payment-button" type="submit" class="btn btn-lg btn-info btn-block"
                                        value="Submit" name="update_teacher">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once 'include/footer.php'?>
