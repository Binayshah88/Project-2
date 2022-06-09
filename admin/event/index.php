<?php include_once('functions.php'); ?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Event Calendar</title>
<link type="text/css" rel="stylesheet" href="jscript/style.css"/>
<link type="text/css" rel="stylesheet" href="jscript/bootstrap/css/bootstrap.css"/>
<link type="text/css" rel="stylesheet" href="jscript/bootstrap/css/bootstrap.min.css"/>
<script src="jscript/jquery.min.js"></script>
</head>
<body>
<div id="calendar_div" class="container">
<h1 align="center">EVENT CALENDAR</h1>
<?php if(isset($_GET['page']) == 'user'):?>
	<p>Go back <a href="../../myevents.php">Here</a></p>
<?php else:?>
	<p>Go back <a href="../events.php">Here</a></p>
<?php endif?>
	<?php echo getCalender(); ?>
</div>
</body>
</html>
