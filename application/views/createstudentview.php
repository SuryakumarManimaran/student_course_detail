<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Student_course_list</title>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/CSS/bootstrap.min.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/Table/table.css');?>">

</head>
<style type="text/css">

  body {
    height: 100vh;
    background-color: #171717;
    background-image: linear-gradient(19deg, #171717 0%, #B721FF 100%);
    font-family: 'Open Sans', sans-serif;
    color: #fff;
    margin-top: 70px;
  }
  
  h1, h2, h3, h4, h5, h6 {
    font-weight: bold;
    letter-spacing: 1px;
    text-transform: uppercase;
  }
  
  h4 {
    font-size: 28px;
    margin-bottom: 30px;
    text-align: center;
  }
  
  form {
    background-color: rgba(255, 255, 255, 0.1);
    padding: 20px;
    border-radius: 10px;
  }
  
  .form-group {
    margin-bottom: 20px;
  }
  
  label {
    font-weight: bold;
    margin-bottom: 5px;
    background: linear-gradient(90deg, rgba(250,245,245,1) 0%, rgba(186,186,186,1) 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
  }
  
  input[type="text"],[type="date"] {
    height: 40px;
    font-size: 16px;
    padding: 10px;
    border: none;
    border-radius: 5px;
    width: 100%;
    background-color: rgba(255, 255, 255, 0.1);
    color: #fff;
    transition: border-color 0.3s;
  }
  
  input[type="text"]:focus {
    background: linear-gradient(90deg, rgba(250,245,245,1) 0%, rgba(186,186,186,1) 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    color: white;
    font-weight: bold;
  }

input::placeholder {
  background: linear-gradient(90deg, rgba(185,185,185,1) 0%, rgba(186,186,186,1) 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}
  label.error {
  color: red;
  font: 16px Arial;
  font-weight: bold;
  background: none;
  background-color: white;
  -webkit-background-clip: initial;
  -webkit-text-fill-color: initial;
}
  
  .container {
    width: 100%;
    margin: 0 auto;
    padding: 0 20px;
  }
  
  .col-md-6 {
    padding-right: 15px;
    padding-left: 15px;
  }
  
  #egspan {
    font-weight: bold;
    font-size: 12px;
    color: grey;
  }

  #submitbtn {
    color: #fff;
    background: rgb(237, 28, 36);
    background: linear-gradient(90deg, rgba(237, 28, 36, 1) 0%, rgba(255, 90, 0, 1) 100%);
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s;
  }
  
  #submitbtn:hover {
    background-color: rgb(255, 0, 0);
  }
  
  #coursebtn {
    color: #fff;
    background-color: #3b3fff;
    background-image: linear-gradient(147deg, #3b3fff 0%, #458abd 74%);  
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s;
  }
  
  #coursebtn:hover {
    background-color: rgb(255, 0, 0);
  }
</style>

<body>



<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-6 col-md-9">
      <form id="form" action="<?php echo base_url('index.php/Createstudent/savedata');?>" method="POST">
        <h4 class="text-xl font-bold mb-4">ADD STUDENT</h4>
        <div class="mb-4">
          <label for="name" class="form-label ">Student name</label>
          <input type="text" name="name" id="name" class="form-control" placeholder="Enter Student name">
        </div>
        <div class="mb-4 row">
          <div class="col-md-6">
            <label for="sem" class="form-label mb-2">Semester</label>
            <input type="text" name="sem" id="sem" class="form-control" placeholder="Enter semester">
          </div>
          <div class="col-md-6">
            <label for="number" class="form-label mb-2">Mobile number</label>
            <input type="text" name="number" id="number" class="form-control" placeholder="Student Mobile Number">
            <span id="phone_number_error" class="invalid-feedback d-block" style="display:none;"></span>
          </div>
        </div>
        <div class="mb-4 row">
          <div class="col-md-6">
            <label for="dob" class="form-label mb-2">Date of birth</label>
            <input type="date" name="dob" id="dob" class="form-control" placeholder="Student Date Of Birth">
          </div>
          <div class="col-md-6">
            <label for="rollnum" class="form-label mb-2">Roll No</label>
            <input type="text" name="rollnum" id="rollnum" class="form-control" placeholder="Enter three digit roll number">
          </div>
        </div>
        <div class="d-grid gap-2">
          <input type="submit" id="submitbtn" class="btn btn-danger">
        </div>
        <div class="text-end mt-4">
          <a href="<?php echo site_url('Course/index'); ?>" id="coursebtn" class="btn">View Course</a>
        </div>
      </form>
    </div>
  </div>
</div>


</body>
<script src="<?php echo base_url('asset/JS/Jquery.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('asset/JS/Jform.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('asset/Table/table.js');?>" type="text/javascript"></script>
<script type="text/javascript">
				//Jquery validation for input fields
	$(document).ready(function(){

		let table = new DataTable('#myTable');

		$('#form').validate({
			rules:{
				rollnum:{
					required:true,
          remote: {
            url: "<?php echo site_url('Createstudent/check_roll_num'); ?>",
            type: "post",
            data: {
                roll_number: function() {
                    return $("#rollnum").val();
                }
            },
            dataType: 'json',
            dataFilter: function(response) {
                response = JSON.parse(response);
                if (!response.valid) {
                    return false;
                } else {
                    return true;
                }
            }
        },
				},
				name:{
					required:true,
				},
				number:{
					required:true,
          remote: {
            url: "<?php echo site_url('Createstudent/check_number'); ?>",
            type: "post",
            data: {
                phone_number: function() {
                    return $("#number").val();
                }
            },
            dataType: 'json',
            dataFilter: function(response) {
                response = JSON.parse(response);
                if (!response.valid) {
                    return false;
                } else {
                    return true;
                }
            }
        },
				},
				dob:{
					required:true,
				},
				sem:{
					required:true,
				},
			},
			messages:{
				rollnum:{
					required:"Register number required",
          remote: "Roll number already exists",
				},
				name:{
					required:"Student name required",
				},
				number:{
					required:"Mobile number required",
          remote: "Phone number already exists"
				},
				dob:{
					required:"Date of birth required",
				},
				sem:{
					required:"Student semester required",
				},
			},

		});

    //Avoid characters

    $.fn.noMask = function(regex) {
      this.on("keypress", function(e) {
        if (regex.test(String.fromCharCode(e.which)) || $(this).val().length >= $(this).attr("maxlength")) {
            return false;
        }
    });
}
$("#regNo").attr('maxlength', 3).noMask(/[a-zA-Z~`*"'!@#$%^&()_={}[\]:;,.<>+\/?-]/);
// Set maximum length to 1 and disallow certain special characters
$("#sem").attr('maxlength', 1).noMask(/[~`*"'!@#$%^&()_={}[\]:;,.<>+\/?-]/);

// Allow only numbers 1-6
$("#sem").on("input", function() {
  var num = parseInt($(this).val());
  if (num < 1 || num > 6) {
    $(this).val("");
  }
});    

$("#number").attr('maxlength', 10).noMask(/[a-zA-Z~`*"'!@#$%^&()_={}[\]:;,.<>+\/?-]/);
$("#rollnum").attr('maxlength', 3).noMask(/[a-zA-Z~`*"'!@#$%^&()_={}[\]:;,.<>+\/?-]/);
$("#name").noMask(/[0-9~`*"'!@#$%^&()_={}[\]:;,.<>+\/?-]/);
// $('#rollnum').prop('readonly', true);




    });
</script>
</html>
