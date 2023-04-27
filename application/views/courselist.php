<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Student_course_list</title>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/CSS/bootstrap.min.css');?>">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/Table/table.css');?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/font.css');?>">
  <!-- <link href="https://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.min.css" rel="stylesheet"> -->


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
.error{
	color: red;
}
#egspan{
	font-weight: bold;
	font-size: 12px;
	color: grey;
}


#tablediv {
  margin: 50px auto;
  width: 70%;
}

.table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  max-width: 100%;
  margin-bottom: 1rem;
  background-color: #fff;
  border: 1px solid #dee2e6;
  color: #333;
}

.table th,
.table td {
  padding: 0.75rem;
  vertical-align: top;
  border-top: 1px solid #dee2e6;
}

.table th {
  font-weight: bold;
}

.table tbody tr:nth-child(odd) {
  background-color: #f2f2f2;
}

.fa {
font-size: 1.25rem;
}

.fa-edit {
color: #007bff;
}

.fa-trash {
color: #dc3545;
}

.ui-autocomplete {
  position: absolute;
  top: 100%;
  left: 10px;
  max-width: 250px;
  background-color: #fff;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-shadow: 0 5px 10px rgba(0,0,0,.2);
  padding: 2px 0;
  margin: 0;
  font-size: 14px;
  overflow: auto;
  max-height: 200px;

}

.ui-menu-item {
  display: block;
  padding: 3px 20px;
  clear: both;
  font-weight: normal;
  line-height: 1.4em;
  color: black;
  white-space: nowrap;
}

.ui-menu-item:hover,
.ui-menu-item:focus,
.ui-menu-item.ui-state-active {
  background-color: #e5e5e5;
  color: #333;
  outline: none;
}

.ui-corner-all{
  text-decoration: none;
  color: black;
}

.ui-helper-hidden-accessible{
  display: none;
}


</style>
<body>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-6 col-md-8">
      <form id="form" method="POST">
        <h4>STUDENT COURSE DETAILS LIST</h4>
        <div class="form-group row">
          <div id="regnodiv" class="col-md-6">
            <label for="regNo">Register number</label>
            <input type="text" name="regNo" id="regNo" class="form-control" placeholder="Enter Register Number">
            <span id="egspan">eg:101,102...</span>
          </div>
        </div>
        <div class="form-group row">
        	<div class="col-md-6">
            <label for="name">Student Name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Student Name">
          </div>
          <div class="col-md-6">
            <label for="number">Mobile number</label>
            <input type="text" name="number" id="number" class="form-control" placeholder="Student Mobile Number">
          </div>
        </div>
        <div class="form-group row">
        	<div class="col-md-6">
          <label for="dob">Date of birth</label>
          <input type="text" name="dob" id="dob" class="form-control" placeholder="Student Date Of Birth">
        	</div>
        	<div class="col-md-6">
            <label for="sem">Current semester</label>
            <input type="text" name="sem" id="sem" class="form-control" placeholder="Current Semester">
          </div>  
        </div>
       <div class="form-group row justify-content-center">
          <button class="btn btn-danger" id="submitbtn" type="submit" formmethod="POST" formaction="<?php echo site_url('Course/showtable'); ?>">Submit</button>
		</div>
      </form>
    </div>
  </div>
</div>

</body>
<script src="<?php echo base_url('asset/JS/Jquery.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('asset/JS/Jform.js'); ?>" type="text/javascript"></script>
<script src="https://code.jquery.com/jquery-migrate-3.0.0.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/datepicker/1.0.10/datepicker.min.js" integrity="sha512-RCgrAvvoLpP7KVgTkTctrUdv7C6t7Un3p1iaoPr1++3pybCyCsCZZN7QEHMZTcJTmcJ7jzexTO+eFpHk4OCFAg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://code.jquery.com/ui/1.10.2/jquery-ui.min.js"></script>
<script type="text/javascript">
				//Jquery validation for input fields
	$(document).ready(function(){
		$('#form').validate({
			rules:{
				regNo:{
					required:true,
				},
				name:{
					required:true,
				},
				number:{
					required:true,
				},
				dob:{
					required:true,
				},
				sem:{
					required:true,
				},
			},
			messages:{
				regNo:{
					required:"Register number required",
				},
				name:{
					required:"Student name required",
				},
				number:{
					required:"Mobile number required",
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

				//Readonly

		$('#name,#number,#dob,#sem').prop('readonly', true);


				//Check register number
		 $('#regNo').on('blur', function() {
                var reg_no = $(this).val();               
                $.ajax({
                    url: '<?php echo site_url("Course/showDetails/");?>',
                    type: 'post',
                    dataType: 'json',
                    data: {reg_no: reg_no},
                    success: function(data) {
                      console.log(data);

                        $('#name').val(data.name);
                        $('#number').val(data.number);
                        $('#dob').val(data.date_of_birth);
                        $('#sem').val(data.stu_sem);
                    }
                });
            });

           $(function() {
  $('#regNo').autocomplete({
    source: function(request, response) {
      $.ajax({
        url: '<?php echo site_url("Course/search/");?>',
        data: { query: request.term },
        dataType: 'json',
        success: function(data) {
          // Call the response callback to populate the autocomplete suggestions
          response($.map(data, function(item) {
            return {
              label: item.reg_no,
              value: item.reg_no
            };
          }));
        }
      });
    },
  });
});
//             $('#regNo').on('change', function() {
//     		var reg_no = $(this).val(); // get the input value
//     		loadData(reg_no); // call the function to populate the table with the matching data
//   			}); 

// 		  function loadData(reg_no) {
//   			$.ajax({
//     		url: '<?php echo site_url("Course/showtable/");?>',
//     		method: 'GET',
//     		dataType: 'json',
//     		success: function(data) {
//       		var tableData = '';
//       		for (var i = 0; i < data.length; i++) {
//         	if (data[i].reg_no == reg_no) { // check if the reg_no matches
//           	tableData += '<tr><td>' + data[i].course_id + '</td><td>' + data[i].course_code + '</td><td>' + data[i].course + '</td><td>' + data[i].reg_no + '</td></tr>';
//         }
//       }
//       $('#myTable tbody').html(tableData); // populate the table with the matching data
//     },
//     error: function(error) {
//       console.log(error);
//     }
//   });
// }
	 

	});
</script>
</html>