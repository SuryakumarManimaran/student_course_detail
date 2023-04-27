<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/CSS/bootstrap.min.css');?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/newtable/dataTables.min.css');?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/newtable/buttons.dataTables.min.css');?>">
</head>
<style type="text/css">
	*{
		margin: 0;
		padding: 10px;
	}
  h6{
    float: right;
  }

</style>
<body>

<div class="container">
    <div class="row">
      <div class="col-md-12 mt-5">
        <div class="card">

         <?php
 $code_data = array();
   foreach($code as $row) {
    $code_data[] = $row['course_code'];
  }
?>
          <div class="card-header">
            <h3>Student Course Details List</h3>
          </div>
            <div class="card-body">
              <?php if (!empty($data)): ?>
    <h5>Register Number: <input type="text" id="regno" value="<?php echo $data[0]['reg_no']; ?>" name="regno"></h5>
<?php else: ?>
    <h5>Register Number: <input type="text" id="regno" value="<?php echo $regNo; ?>" name="regno"></h5>
<?php endif; ?>              
              <button id="add-row-btn" class="btn btn-primary">Add Row</button>
<table id="tableone" class="display nowrap" style="width:100%">
  <thead>
    <tr>
      <th scope="col">Course code</th>
      <th scope="col">Course</th>
      <th scope="col">Staff Name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($data as $user) { ?>
      <tr>
        <td><?php echo $user['course_code']; ?></td>
        <td><?php echo $user['course']; ?></td>
        <td><?php echo $user['staff_name']; ?></td>
        <td>
          <button class="btn btn-danger delete-btn" data-courseid="<?php echo $user['course_id']; ?>">Delete</button>
        </td>
      </tr>
    <?php } ?> 
  </tbody>
</table>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>
<script src="<?php echo base_url('asset/JS/Jquery.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('asset/JS/Jform.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('asset/Table/table.js');?>" type="text/javascript"></script>
<script src="<?php echo base_url('asset/newtable/jszip.min.js');?>" type="text/javascript"></script>
<script src="<?php echo base_url('asset/newtable/buttons.dataTables.min.js');?>" type="text/javascript"></script>
<script src="<?php echo base_url('asset/newtable/pdfmake.min.js');?>" type="text/javascript"></script>
<script src="<?php echo base_url('asset/newtable/vfs_fonts.js');?>" type="text/javascript"></script>
<script src="<?php echo base_url('asset/newtable/buttons.html5.min.js');?>" type="text/javascript"></script>
<script src="<?php echo base_url('asset/newtable/buttons.print.min.js');?>" type="text/javascript"></script>

<script type="text/javascript">
	$(document).ready(function(){

		// let table = new DataTable('#tableone');

    $('#tableone').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'print' ,'pdf'
        ]
    } );

    $('#regno').prop('readonly', true);


$('#add-row-btn').on('click', function() {
      // Create new row HTML
      var newRowHtml = '<tr>' +
  '<td><input type="text" id="course_code" name="course_code" maxlength="4"></td>' +
  '<td><input type="text" id="course" name="course"></td>' +
  '<td><input type="text" id="staff" name="staff"></td>' +
  '<td><a id="update-data-btn" class="btn btn-success update-data-btn">Update</a> <button class="btn btn-danger delete-row-btn">Delete</button></td>' +
  '</tr>';

      // Append new row to the table
      $('#tableone tbody').append(newRowHtml);
    });

    // Update data button click event
    $(document).on('click', '.update-data-btn', function() {
      // Get form data
      var regno = $('#regno').val();
      var course_code = $(this).closest('tr').find('#course_code').val();
      var course = $(this).closest('tr').find('#course').val();
      var staff = $(this).closest('tr').find('#staff').val();

      // Validate the input fields
      var courseCode = $('#course_code').val();
      var course = $('#course').val();
      var staff = $('#staff').val();
      var code_data = <?php echo json_encode($code_data); ?>;
      console.log(code_data);

    if (courseCode.trim() === '') {
  alert('Please enter course code');
  return false;
} else if (isNaN(courseCode)) {
  alert('Course code must be a number');
  return false;
}
  else if(code_data.includes(courseCode)) {
    alert('Course code already exists');
    return false;

}

if (course.trim() === '') {
  alert('Please enter course');
  return false;
} else if (!/^[a-zA-Z\s.]+$/.test(course)) {
  alert('Please enter a valid course name');
  return false;
}

if (staff.trim() === '') {
  alert('Please enter staff name');
  return false;
} else if (!/^[a-zA-Z\s.]+$/.test(staff))  {
  alert('Please enter a valid staff name');
  return false;
}

      // Make AJAX request
      $.ajax({
        url: '<?php echo site_url("Course/updatefun"); ?>',
        type: 'POST',
        data: {
          regno: regno,
          course_code: course_code,
          course: course,
          staff:staff
        },
        success: function(data) {
          location.reload(); // Reload the page after successful update
          // Handle response from the controller
        },
        error: function(xhr, status, error) {
          // Handle error
        }
      });
    });

$(document).on('click', '.delete-btn', function(){
var course_id = $(this).data('courseid');
var confirmation = confirm('Are you sure to delete?');
if (confirmation) {
$.ajax({
url: "<?php echo base_url('index.php/Course/deletefun'); ?>",
type: "POST",
data: { course_id:course_id },
success: function(response){
alert(response);
location.reload(); // Reload the page after successful deletion
},
error: function(xhr, status, error){
alert("Error: " + error);
}
});
}
});

    // Delete row button click event (for dynamically added rows)
    $('body').on('click', '.delete-row-btn', function() {
      $(this).closest('tr').remove();
    });


    //Course check
            $(document).on('blur', '#course_code', function() {
                var course_code = $(this).val();               
                $.ajax({
                    url: '<?php echo site_url("Course/showCourse/");?>',
                    type: 'post',
                    data: {course_code: course_code},
                    success: function(data) {
                      var jsondata = JSON.parse(data);
                      console.log(jsondata);
                      $('#course').val(jsondata[0].course);
                      $('#staff').val(jsondata[0].staff_name);
                    }
                });
            });

     });
</script>
</html>