<?php 
    require_once 'include/dash_header.php';
    require_once 'include/dbconnect.php';
    $query = "SELECT * from events";
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
							<a href="admin/event/index.php?page=user" class="au-btn au-btn-icon au-btn--blue au-btn--small">
                                <i class="zmdi zmdi-plus"></i>View Calendar</a>
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
                                    <th>Event Name</th>
                                    <th>Event Date</th>
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
                                    <td><?php echo $data['title']?></td>
                                    <td><?php echo $data['date']?></td>
                                    <?php
                                        $uid = $_SESSION['uid'];
                                        $id = $data['id'];
                                        $query1 = "SELECT * FROM student_event WHERE student_id = '$uid' AND event_id = '$id'";
                                        $result1 = mysqli_query($conn,$query1); 
                                    ?>
                                    <td>
                                        <?php if(mysqli_num_rows($result1) == 0):?>
                                            <a href="include/form.php?event=<?php echo $data['id']?>" class="btn btn-primary btn-sm">
                                            Join event</a>
                                        <?php else:?>
                                            <a href="javascript:void(0)" class="btn btn-success btn-sm">You have joined this event</a>
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