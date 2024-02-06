<?php

require ('conf.php');

// update

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
  
  $query = "UPDATE `student` SET `db_name`='{$name}',`db_email`='{$email}',`db_phone`='{$phone}',`db_course`='{$course}' WHERE `db_id`='{$student_Id}'";

  $result = mysqli_query($con, $query);


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









