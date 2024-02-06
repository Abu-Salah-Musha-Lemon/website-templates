<?php
require ('conf.php');

// insert data 
if (isset($_POST['saveStudent'])) {
  $name = mysqli_real_escape_string($con,$_POST['name']);
  $email = mysqli_real_escape_string($con,$_POST['email']);
  $phone = mysqli_real_escape_string($con,$_POST['phone']);
  $course = mysqli_real_escape_string($con,$_POST['course']);

  if ($name ==''||$email ==''||$phone ==''||$course =='') {
    $res=[
      'status'=>422,
      'message'=>'All fields are required'
    ];
    echo json_encode($res);
    return false;
  }

  $insert = "INSERT INTO `student`(`db_name`, `db_email`, `db_phone`, `db_course`) VALUES ('{$name}','{$email}','{$phone}','{$course}')";

  $result = mysqli_query($con, $insert);


  if ($result) {
    $res=[
      'status'=>200,
      'message'=>'Student added Successfully'
    ];
    echo json_encode($res);
    return false;
  } else {
    $res=[
      'status'=>500,
      'message'=>'Student did not add'
    ];
    echo json_encode($res);
    return false;
  }

}

// view data
if (isset($_GET['student_Id'])) {
  $student_Id = mysqli_real_escape_string($con, $_GET['student_Id']);

  $view = "SELECT * FROM `student` WHERE `db_id` = '{$student_Id}'";
  $result = mysqli_query($con, $view);

  if (mysqli_num_rows($result) == 1) {
    $student = mysqli_fetch_assoc($result);
    $res = [
      'status' => 200,
      'message' => 'Student id found',
      'data' => $student,
    ];
    echo json_encode($res);
    return false;
  } else {
    $res = [
      'status' => 404,
      'message' => 'Student id not found',
    ];
    echo json_encode($res);
    return false;
  }
}


// update data

if (isset($_POST['update_Student'])) {
  $student_Id = mysqli_real_escape_string($con,$_POST['student_Id']);
  $name = mysqli_real_escape_string($con,$_POST['name']);
  $email = mysqli_real_escape_string($con,$_POST['email']);
  $phone = mysqli_real_escape_string($con,$_POST['phone']);
  $course = mysqli_real_escape_string($con,$_POST['course']);

  if ($name ==''||$email ==''||$phone ==''||$course =='') {
    $res=[
      'status'=>422,
      'message'=>'All fields are required'
    ];
    echo json_encode($res);
    return false;
  }
  
  $update = "UPDATE `student` SET `db_name`='{$name}',`db_email`='{$email}',`db_phone`='{$phone}',`db_course`='{$course}' WHERE `db_id`='{$student_Id}'";

  $result = mysqli_query($con, $update);


  if ($result) {
    $res=[
      'status'=>200,
      'message'=>'Student update Successfully'
    ];
    echo json_encode($res);
    return false;
  } else {
    $res=[
      'status'=>500,
      'message'=>'info not update'
    ];
    echo json_encode($res);
    return false;
  }

}


//delete 

if (isset($_POST['delete_student'])) {
  $student_Id =  mysqli_real_escape_string($con,$_POST['student_id']);
  $delete = "DELETE FROM `student` WHERE `db_id`= '$student_Id'";
  $result = mysqli_query($con,$delete);

  if ($result) {
    $res=[
      'status'=>200,
      'message'=>'Student delete  Successfully'
    ];
    echo json_encode($res);
    return false;
  } else {
    $res=[
      'status'=>500,
      'message'=>'student not delete'
    ];
    echo json_encode($res);
    return false;
  }

}





