<?php
    if(isset($_SESSION['LAST_ACTIVE_TIME'])){
        if((time() - $_SESSION['LAST_ACTIVE_TIME']) > 180){
            header('location:logout.php');
        }
    }
    $_SESSION['LAST_ACTIVE_TIME'] = time();
?>

