<?php require_once 'include/header.php'?>
<?php
require_once '../include/dbconnect.php';?>
<?php
    if($_GET['id']){
        $id = $_GET['id'];
        $query = "SELECT * from addclass,course where addclass.course_id = course.course_id
        AND addclass.classID = '$id' ";
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
                                <h3 class="text-center title-2">Add Class Details</h3>
                            </div>
                            <hr>
                            <form action="include/admin_form.php" method="post" enctype="multipart/form-data">
                                <div class="form-group has-success">
                                    <label for="cc-name" class="control-label mb-1">Course</label>
                                    <select name="course_name" class="form-control">
                                        <option value="<?php echo $data['course_id']?>"><?php echo $data['course_name']?></option>

                                    </select>                                
                                </div>
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Start Date</label>
                                    <input name="start_date" type="date" class="form-control" placeholder="10 am to 1 pm" value="<?php echo $data['class_date']?>">
                                </div>
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Time 1</label>
                                    <input name="time1" type="text" class="form-control" placeholder="10 am to 1 pm" value="<?php echo $data['time1']?>">
                                </div>
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Time 2</label>
                                    <input name="time2" type="text" class="form-control"placeholder="2 pm to 3 pm" value="<?php echo $data['time2']?>">
                                </div>
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Time 3</label>
                                    <input name="time3" type="text" class="form-control" placeholder="7 am to 9 pm" value="<?php echo $data['time3']?>">
                                </div>
                                <input type="hidden" name="classID" value="<?php echo $data['classID']?>">
                                <div>
                                    <input id="payment-button" type="submit" class="btn btn-lg btn-info btn-block"
                                        value="Submit" name="update_class">
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
