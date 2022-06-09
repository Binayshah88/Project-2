<?php
session_start();
date_default_timezone_set('Asia/Katmandu');
$error = false;

	require_once '../../include/dbconnect.php';
	if(isset($_POST['teacher'])){
		$error = false;
		$teacher_name = $_POST['teacher_name'];
		$teacher_contact = $_POST['teacher_contact'];
		$course_id = $_POST['course_taught'];
		$image = $_FILES['image']['name'];
		$target = "../../assets/front/img/teachers/".basename($image);

		$query = "INSERT INTO teacher(teacher_name,teacher_contact,image)
				VALUES ('$teacher_name','$teacher_contact','$image')";

		if(move_uploaded_file($_FILES['image']['tmp_name'],$target)){
			$result = mysqli_query($conn,$query);

			$query = "SELECT * from teacher where teacher_contact = '$teacher_contact'";
			$result = mysqli_query($conn, $query);
			$data = mysqli_fetch_assoc($result);
			$teacher_id = $data['teacher_id'];

			$query = "INSERT INTO teacher_course(teacher_id,course_id)
				VALUES ('$teacher_id','$course_id')";
			mysqli_query($conn,$query);

			$_SESSION['success'] = "Teacher has been added";
			header('location:../teacher.php');
		}
	}

	if(isset($_POST['event'])){
		$event_name = $_POST['event_name'];
		$event_date = $_POST['event_date'];
		$currentDate = date('y-m-d h:i:sa');
		$query = "INSERT INTO events (title,date,created,modified,status) VALUES ('".$event_name."','".$event_date."','".$currentDate."','".$currentDate."','1')";
		$result = mysqli_query($conn,$query);
		if($result){
			$_SESSION['success'] = "Event has been added";
			header('location:../events.php');
		}
	}

	if(isset($_POST['signin'])){
		$email = $_POST['email'];
		$password = md5($_POST['password']);

		$query = "SELECT * FROM admin_login WHERE admin_email = '$email' AND admin_password = '$password'";

		$result = mysqli_query($conn, $query);

		if(mysqli_num_rows($result) > 0){
			$data = mysqli_fetch_assoc($result);
			$_SESSION['admin_id'] = $data['admin_id'];
			$_SESSION['admin_email'] = $data['admin_email'];
			header('location:../index.php');
		}
		else{
			$_SESSION['error'] = "Username or password invalid !!";
			header('location:../login.php');

		}
	}

	if(isset($_POST['class_add'])){
		$course_name = $_POST['course_name'];
		$start_date = $_POST['start_date'];
		$time1 = $_POST['time1'];
		$time2 = $_POST['time2'];
		$time3 = $_POST['time3'];

		$query = "INSERT INTO addclass(course_id,class_date,time1,time2,time3) values 
					('$course_name','$start_date','$time1','$time2','$time3')";
		$result = mysqli_query($conn,$query);
		if($result){
			$_SESSION['success'] = "Class schedule added";
			header('location:../class.php');
		}
	}

	if(isset($_POST['update_class'])){
		$course_name = $_POST['course_name'];
		$start_date = $_POST['start_date'];
		$time1 = $_POST['time1'];
		$time2 = $_POST['time2'];
		$time3 = $_POST['time3'];
		$classID = $_POST['classID'];

		$query =" UPDATE addclass set class_date = '$start_date', time1='$time1',time2='$time2',time3='$time3' 
		WHERE classID = '$classID'; ";
		$query .= "UPDATE joined_course set date = '$start_date' where course_id ='$course_name'";
		$result = mysqli_multi_query($conn,$query);
		if($result){
			$_SESSION['success'] = "Class schedule updated";
			header('location:../class.php');
		}
	}

	if(isset($_POST['add_course'])){
		$course_name = ucfirst($_POST['course_name']);
		$course_desc = $_POST['description'];
		$image = $_FILES['image']['name'];
		$target = "../../assets/front/img/courses/".basename($image);

		$query = "SELECT * FROM course WHERE course_name = '$course_name'";
		$result = mysqli_query($conn,$query);
		if(mysqli_num_rows($result) == 0){
			$query = "INSERT INTO course(course_name,course_description,course_img)
						Values ('$course_name','$course_desc','$image')";
			if(move_uploaded_file($_FILES['image']['tmp_name'],$target)){
				mysqli_query($conn,$query);
				$_SESSION['success'] = "Course has been added successfully";
				header('location:../course.php');
			}
		}
		else{
			$_SESSION['course_error'] = "This course already exist! Please enter another course";
			header('location:../add_course.php');
		}

	}

	if(isset($_POST['update_teacher'])){
		$teacher_name = $_POST['teacher_name'];
		$teacher_contact = $_POST['teacher_contact'];
		$course_id = $_POST['course_taught'];
		$teacher_id = $_POST['teacher_id'];
		$images = $_POST['images'];
		$image = $_FILES['image']['name'];
		$target = "../../assets/front/img/teachers/".basename($image);

		if(empty($_FILES['image']['name'])){
			$query = "UPDATE TEACHER set teacher_name = '$teacher_name' , teacher_contact = '$teacher_contact', image = '$images'
					WHERE teacher_id = '$teacher_id';";
			$query.= "UPDATE teacher_course set course_id = '$course_id' WHERE teacher_id = '$teacher_id'";
			$result = mysqli_multi_query($conn,$query);

			$_SESSION['success'] = "Teacher has been Updated successfully";
			header('location:../teacher.php');
		}
		else{
			$query = "UPDATE TEACHER set teacher_name = '$teacher_name' , teacher_contact = '$teacher_contact', image = '$image'
					WHERE teacher_id = '$teacher_id';";
			$query.= "UPDATE teacher_course set course_id = '$course_id' WHERE teacher_id = '$teacher_id'";
			if(move_uploaded_file($_FILES['image']['tmp_name'],$target)){
				$result = mysqli_multi_query($conn,$query);
	
				$_SESSION['success'] = "Teacher has been Updated successfully";
				header('location:../teacher.php');
			}
		}
		
	}

	if(isset($_POST['forget'])){
		$email = $_POST['email'];
		$password = md5($_POST['password']);

		$query = "UPDATE admin_login set admin_password = '$password' WHERE admin_email = '$email'";
		$result = mysqli_query($conn,$query);
		if($result){
			$_SESSION['success'] = "Password Changed";
			header('location:../login.php');
		}
	}

	if(isset($_POST['reset'])){
		$email = $_POST['email'];
		$password = md5($_POST['password']);

		$query = "UPDATE users set password = '$password' WHERE email = '$email'";
		$result = mysqli_query($conn,$query);
		if($result){
			$_SESSION['success'] = "Password Reset Successful";
			header('location:../students.php');
		}
	}

	if(isset($_POST['update_event'])){
		$event_name = $_POST['event_name'];
		$event_date = $_POST['event_date'];
		$modifiedDate = date('y-m-d h:i:sa');
		$id = $_POST['id'];
		$query = "UPDATE events set title = '$event_name',date='$event_date',modified='$modifiedDate' WHERE id = '$id'";
		$result = mysqli_query($conn,$query);
		if($result){
			$_SESSION['success'] = "Event has been updated";
			header('location:../events.php');
		}
	}


	if(isset($_POST['update_course'])){
		$course_name = $_POST['course_name'];
		$desc = $_POST['description'];
		$course_id = $_POST['course_id'];
		$images = $_POST['images'];
		$image = $_FILES['image']['name'];
		$target = "../../assets/front/img/courses/".basename($image);

		if(empty($_FILES['image']['name'])){
			$query = "UPDATE course set course_name = '$course_name' , 
				course_description = '$desc', course_img = '$images'
					WHERE course_id = '$course_id'";
			$result = mysqli_query($conn,$query);

			$_SESSION['success'] = "Course has been Updated successfully";
			header('location:../course.php');
		}
		else{
			$query = "UPDATE course set course_name = '$course_name' , 
				course_description = '$desc', course_img = '$image'
					WHERE course_id = '$course_id'";
			if(move_uploaded_file($_FILES['image']['tmp_name'],$target)){
				$result = mysqli_query($conn,$query);
	
				$_SESSION['success'] = "Course has been Updated successfully";
				header('location:../course.php');
			}
		}
		
	}
?>