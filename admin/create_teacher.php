<?php require_once 'include/header.php'?>
<?php
require_once '../include/dbconnect.php';
$query = "SELECT * from course";
$result = mysqli_query($conn,$query);
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
                                    <input name="teacher_name" type="text" class="form-control">
                                </div>
                                <div class="form-group has-success">
                                    <label for="cc-name" class="control-label mb-1">Teacher Contact</label>
                                    <input name="teacher_contact" type="number" class="form-control cc-name valid">
                                </div>
                                <div class="form-group has-success">
                                    <label for="cc-name" class="control-label mb-1">Course Taught</label>
                                    <select name="course_taught" class="form-control">
                                        <option value="">-------------</option>
                                        <?php foreach($result as $data):?>
                                            <option value="<?php echo $data['course_id']?>"><?php echo $data['course_name']?></option>
                                        <?php endforeach?>
                                    </select>
                                </div>
                                <div class="form-group has-success">
                                    <label for="cc-name" class="control-label mb-1">Upload image</label>
                                    <input name="image" type="file" class="form-control cc-name valid">
                                </div>
                                <div>
                                    <input id="payment-button" type="submit" class="btn btn-lg btn-info btn-block"
                                        value="Submit" name="teacher">
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
