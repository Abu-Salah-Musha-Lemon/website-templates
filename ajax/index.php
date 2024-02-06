<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.rtl.min.css"/>
  <title>Student ADD</title>
</head>

<body>
  <!-- Add student modal -->
  <div class="modal fade" id="studentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add student</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="save_student">
            <div class="alert alert-warning d-none" id="error"></div>
            <div class="mb-3">
              <label class="form-label">Name</label>
              <input type="text" name="name" class="form-control shadow-sm" id="name">
            </div>

            <div class="mb-3">
              <label class="form-label">Email</label>
              <input type="email" name="email" class="form-control shadow-sm" id="email">
            </div>

            <div class="mb-3">
              <label class="form-label">Phone</label>
              <input type="text" name="phone" class="form-control shadow-sm" id="phone">
            </div>
            <div class="mb-3">
              <label class="form-label">Course</label>
              <input type="text" name="course" class="form-control shadow-sm" id="course">
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" name="submit" class="btn btn-primary">Save</button>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>
  <!-- modal end  -->

  <!-- edit student modal -->
  <div class="modal fade" id="editStudentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit student </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <form id="updateStudent">
            <!-- <p class="form-control" id="student_Id"name="student_Id"></p> -->
            <input type="hidden" class="form-control" id="student_Id"name="student_Id">
            
            <div class="alert alert-warning d-none" id="errorUpdate"></div>

            <div class="mb-3">
              <label class="form-label">Name</label>
              <input type="text" name="name" id="name" class="form-control shadow-sm name">
            </div>

            <div class="mb-3">
              <label class="form-label">Email</label>
              <input type="email" name="email" id="email" class="form-control shadow-sm email">
            </div>

            <div class="mb-3">
              <label class="form-label">Phone</label>
              <input type="text" name="phone" id="phone" class="form-control shadow-sm phone">
            </div>
            <div class="mb-3">
              <label class="form-label">Course</label>
              <input type="text" name="course" id="course" class="form-control shadow-sm course">
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit"  class="btn btn-primary">update</button>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>
  <!--edit  modal end  -->

  <!-- view student modal -->
  <div class="modal fade" id="viewStudentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">view student </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          
          <div class="alert alert-warning d-none" id="errorUpdate"></div>
          <p class="form-control student_Id"></p>

            <div class="mb-3">
              <label class="form-label">Name</label>
              <p class="form-control name"  ></p>
              <!-- <input type="text" name="name" id="name" class="form-control shadow-sm name"> -->
            </div>

            <div class="mb-3">
              <label class="form-label">Email</label>
              <p class="form-control email"></p>
              <!-- <input type="email" name="email" id="email" class="form-control shadow-sm email"> -->
            </div>

            <div class="mb-3">
              <label class="form-label">Phone</label>
              <p class="form-control phone"></p>
              <!-- <input type="text" name="phone" id="phone" class="form-control shadow-sm phone"> -->
            </div>
            <div class="mb-3">
              <label class="form-label">Course</label>
              <p class="form-control course"></p>
              <!-- <input type="text" name="course" id="course" class="form-control shadow-sm course"> -->
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
          
        </div>

      </div>
    </div>
  </div>
  <!--view  modal end  -->

  <div class="container-flued">
    <div class="container">

      <div class="card">
        <div class='m-4'>
          <h2>Student record</h2>
          <button type="button" class="btn btn-outline-success shadow-sm" data-bs-toggle="modal"
            data-bs-target="#studentModal"><i class="bi bi-person-fill-add"></i></button>
        </div>

        <div class="card-body">

          <table id="myTable" class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">course</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
                require 'conf.php';
                $query = "SELECT * FROM `student`";
                $result = mysqli_query($con,$query);
                if (mysqli_num_rows($result)>0) {
                  foreach($result as $student ){
                    ?>
              <tr>
                <td><?=$student['db_id'] ?></td>
                <td><?=$student['db_name'] ?></td>
                <td><?=$student['db_email'] ?></td>
                <td><?=$student['db_phone'] ?></td>
                <td><?=$student['db_course'] ?></td>
                <td>
                  <button type='button' class='btn btn-info shadow-none editStudent' value=<?=$student['db_id'] ?>
                    data-bs-toggle='modal' data-bs-target='#editStudentModal'><i
                      class='bi bi-pencil-square'></i></button>

                  <button type='button' class='btn btn-success shadow-none viewStudent' value=<?=$student['db_id'] ?>
                    data-bs-toggle='modal' data-bs-target='#viewStudentModal'><i class='bi bi-eye'></i></button>

                  <button type='button' class='btn btn-danger  shadow-none deleteStudent ' value=<?=$student['db_id'] ?>
                   ><i class='bi bi-trash'></i></button>
                </td>
              </tr>
              <?php
      }
     }
    ?>

            </tbody>
          </table>

        </div>
      </div>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
  </script>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- alertify.js is used to alert  -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
  <script>

    // insert data
  $(document).on('submit', '#save_student', function(e) {

    e.preventDefault()
    let formData = new FormData(this)
    formData.append('saveStudent', true)

    $.ajax({
      type: 'post',
      url: 'student.php',
      data: formData,
      processData: false,
      contentType: false,
      success: function(response) {
        // alert(response)
        var res = jQuery.parseJSON(response)
        // alert(res)

        if (res.status == 422) {
          $('#error').removeClass('d-none')
          $('#error').text(res.message)
        } else if (res.status == 200) {
          $('#error').addClass('d-none')
          $('#studentModal').modal('hide')
          $('#save_student')[0].reset()
          alertify.set('notifier','position', 'top-center');
          alertify.success(res.message);
          // alertify.success('Current position : ' + alertify.get('notifier','position'));
          $('#myTable').load(location.href + " #myTable")
          //console.log( $('#myTable').load(location.href + " #myTable"))
          // $("#tableID").load(location.href + " #tableID")

        }
      }
    })
  })

  // view data 
  $(document).on('click', '.viewStudent', function() {
    let studentId = $(this).val();
    // alert(studentId);
    $.ajax({
      type: 'GET',
      url: 'student.php?student_Id=' + studentId,
      success: function(response) {
        // console.log(response);
        var res = jQuery.parseJSON(response);
        // console.log(res);
        if (res.status == 404) {
          // console.log(res.status);
          alert(res.message);
        } else if (res.status == 200) {
          $('.student_Id').text(res.data.db_id); // Fix: Updated ID field
          $('.name').text(res.data.db_name);
          $('.email').text(res.data.db_email);
          $('.phone').text(res.data.db_phone);
          $('.course').text(res.data.db_course);
          $('#viewStudentModal').modal('show');
        }
      }
    });
  });

  // Show data modal
  $(document).on('click', '.editStudent', function() {
    let studentId = $(this).val();
    // alert(studentId);
    $.ajax({
      type: 'GET',
      url: 'student.php?student_Id=' + studentId,
      success: function(response) {
        // console.log(response);
        var res = jQuery.parseJSON(response);
        // console.log(res);
        if (res.status == 404) {
          alert(res.message);
        } else if (res.status == 200) {
          // $('#student_Id').text(res.data.db_id); 
          $('#student_Id').val(res.data.db_id); 
          $('.name').val(res.data.db_name);
          $('.email').val(res.data.db_email);
          $('.phone').val(res.data.db_phone);
          $('.course').val(res.data.db_course);
          $('#editStudentModal').modal('show');
          
        }
      }
    });
  });

  // update data


  $(document).on('submit', '#updateStudent', function(e) {

    e.preventDefault()
    let formData = new FormData(this)
    formData.append('update_Student', true)

    $.ajax({
      type: 'post',
      url: 'student.php',
      data: formData,
      processData: false,
      contentType: false,
      success: function(response) {
        //  alert(response)
        var res = jQuery.parseJSON(response)
        // alert(res)

        if (res.status == 422) {
          $('#errorUpdate').removeClass('d-none')
          $('#errorUpdate').text(res.message)
        } else if (res.status == 200) {
          $('#errorUpdate').addClass('d-none')
          $('#editStudentModal').modal('hide')
          $('#updateStudent')[0].reset()

          $('#myTable').load(location.href + " #myTable")
          //console.log( $('#myTable').load(location.href + " #myTable"))
          // $("#tableID").load(location.href + " #tableID")
          alertify.set('notifier','position', 'top-center');
          alertify.success(res.message);

        }
      }
    })
  })

  //delete 

  $(document).on('click', '.deleteStudent', function(e) {
    e.preventDefault()
    
    let student_Id= $(this).val()
    $.ajax({
      type:'post',
      url:'student.php',
      data:{
        'delete_student':true,
        'student_id':student_Id
      },
      success:function(response){
        var res = jQuery.parseJSON(response)
        if (res.status ==500) {
          alert(res.message)
        } else if (res.status == 200) {
          // alert(res.message)
          alertify.set('notifier','position', 'top-center');
          alertify.success(res.message);

          $('#myTable').load(location.href + " #myTable")
           

        }
      }
    })

  })


  </script>

</body>

</html>