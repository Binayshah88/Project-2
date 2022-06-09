<?php
session_start(); 
    require_once 'dbconnect.php';
    if(isset($_POST['register'])){
		$error = 'false';
		$name = $_POST['name'];
		$dob = $_POST['dob'];
		$email = $_POST['email'];
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$error = 'true';
			$_SESSION['emailErr '] = "Invalid email format";
			header('location:../register.php');
		}
		$pass = $_POST['password'];

		if(strlen($pass) < 6){
			$error = 'true';
			$_SESSION['passErr'] = "Password length must be between 6 to 10 characters ";
			header('location:../register.php');
		}
        $add = $_POST['address'];
		$phone = $_POST['phone'];
		if(preg_match('/^[0-9]{10}+$/', $phone)){}
		else{
			$error = 'true';
			$_SESSION['phoneErr'] = "Your phone format number is not correct";
			header('location:../register.php');
		}

		$password = md5($pass);
		if($error == 'false'){
			$query = "INSERT INTO users (name,contact,address,dob,email,password) 
        	VALUES ('$name','$phone','$add','$dob','$email','$password')";

			$result = mysqli_query($conn,$query);
			if($result){
				header('location:../login.php');
			}
		}
		

	}
    if(isset($_POST['signin'])){

		$email = $_POST['email'];
		$pass = $_POST['password'];
		$password = md5($pass);

		$query = "SELECT * FROM users where email='$email' and password ='$password'";
		$result = mysqli_query($conn,$query);
		if(mysqli_num_rows($result) == 1){
			$data = mysqli_fetch_assoc($result);

			$_SESSION['name'] = $data['name'];
			$_SESSION['uid'] = $data['uid'];

			header('location:../dashboard.php');
		}
		else{
			$_SESSION['error'] = "Invaid username or password";
			header('location:../login.php');
		}
	}

	if(isset($_GET['event'])){
		$event_id = $_GET['event'];
		$id = $_SESSION['uid'];
		$today = date('y-m-d h:i:sa');
		$query ="INSERT INTO student_event VALUES ('$id','$event_id','$today')";
		$result =mysqli_query($conn,$query);
		if($result){
			$_SESSION['success'] = "You have successfully joined the event";
			header('location:../myevents.php');
		}
	}

	if(isset($_GET['class'])){
		$class_id = $_GET['class'];
		$id = $_SESSION['uid'];
		$today = date('y-m-d h:i:sa');

		$query = "SELECT * from addclass where course_id = '$id'";
		$result = mysqli_query($conn,$query);
		$data = mysqli_fetch_assoc($result);
		$start_date = $data['class_date'];

		$query ="INSERT INTO joined_course VALUES ('$id','$class_id','$today','$start_date')";
		$result =mysqli_query($conn,$query);
		if($result){
			$_SESSION['success'] = "You have successfully joined the class";
			header('location:../all_course.php');
		}
	}

	if(isset($_POST['update_student'])){
		$name = $_POST['name'];
		$dob = $_POST['dob'];
		$add = $_POST['address'];
		$phone = $_POST['phone'];
		$uid = $_POST['uid'];

		$query = "UPDATE users set name ='$name',contact='$phone',dob='$dob',address = '$add' WHERE uid = '$uid'";
		$result = mysqli_query($conn,$query);

		if($result){
			$_SESSION['success'] = "Profile updated";
			header('location:../profile.php');
		}
	}

	if(isset($_POST['forget'])){
		$email = $_POST['email'];
		$password = md5($_POST['password']);

		$query = "UPDATE users set password = '$password' WHERE email = '$email'";
		$result = mysqli_query($conn,$query);
		if($result){
			$_SESSION['success'] = "Password Changed";
			header('location:../login.php');
		}
	}

	if(isset($_POST['update_password'])){
		$uid = $_POST['uid'];
		$password = md5($_POST['old_pass']);
		$new_pass = md5($_POST['new_pass']);

		$query = "SELECT * FROM users where password = '$password' AND uid = '$uid'";
		$result = mysqli_query($conn,$query);
		if(mysqli_num_rows($result) == 0){

			$_SESSION['pass_err'] = "Please enter your old password Correctly";
			header('location:../profile.php');
		}
		else{
			$query = "UPDATE users set password = '$new_pass' WHERE uid = '$uid'";
			$result = mysqli_query($conn,$query);
			if($result){
				$_SESSION['pass_success'] = "Password updated";
				header('location:../profile.php');
			}
		}
	}

?>