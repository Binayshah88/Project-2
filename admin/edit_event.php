<?php require_once 'include/header.php'?>
<?php
require_once '../include/dbconnect.php';
    if(isset($_GET['id'])){
        $query = "SELECT * FROM events WHERE id=".$_GET['id'];
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
                        <div class="card-header">Event</div>
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Edit</h3>
                            </div>
                            <hr>
                            <form action="include/admin_form.php" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Event Name</label>
                                    <input name="event_name" type="text" class="form-control" value="<?php echo $data['title']?>">
                                </div>
                                <div class="form-group has-success">
                                    <label for="cc-name" class="control-label mb-1">Event date</label>
                                    <input name="event_date" type="date" class="form-control cc-name valid" value="<?php echo $data['date']?>">
                                </div>
                                <input type="hidden" name="id" value ="<?php echo $data['id']?> ">
                                <div>
                                    <input id="payment-button" type="submit" class="btn btn-lg btn-info btn-block"
                                        value="Submit" name="update_event">
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
