<?php require_once 'include/header.php'?>
<?php
require_once '../include/dbconnect.php';
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT * FROM course where course_id = '$id'";
        $result = mysqli_query($conn,$query);
        $data = mysqli_fetch_assoc($result);

    }
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
                        <div class="card-header">Class</div>
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Add Course Details</h3>
                            </div>
                            <hr>
                            <form action="include/admin_form.php" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Course Name</label>
                                    <input name="course_name" type="text" class="form-control" placeholder="Eg: Java" value="<?php echo $data['course_name']?>">
                                    <?php if(isset($_SESSION['course_error'])):?>
                                        <div class="alert alert-danger">
                                            <?php echo $_SESSION['course_error']; unset($_SESSION['course_error']);?>
                                        </div>
                                    <?php endif?>
                                </div>
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Course Description</label>
                                    <textarea name="description" class="form-control" cols="30" rows="10"><?php echo $data['course_description']?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Course Image</label>
                                    <input name="image" type="file" class="form-control" placeholder="7 am to 9 pm">
                                </div>
                                <input type="hidden" name="images" value="<?php echo $data['course_img']?>">
                                <input type="hidden" name="course_id" value="<?php echo $data['course_id']?>">
                                <div>
                                    <input id="payment-button" type="submit" class="btn btn-lg btn-info btn-block"
                                        value="Submit" name="update_course">
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
