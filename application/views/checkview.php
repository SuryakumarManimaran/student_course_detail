<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<script src="<?php echo base_url('asset/JS/Jquery.js'); ?>" type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/newtable/dataTables.min.css');?>">
</head>
<body>

<table id="tableone" class="display nowrap" style="width:100%">
  <thead>
    <tr>
      <th scope="col">Course code</th>
      <th scope="col">Course</th>
      <th scope="col">Staff Name</th>
      <th scope="col">Action</th>
      <th scope="col">Action</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  </tbody>


</body>
<script src="<?php echo base_url('asset/Table/table.js');?>" type="text/javascript"></script>
<script type="text/javascript">
	$('#tableone').dataTable({

    	"sPaginationType": "full_numbers",
    	
    	'bProcessing'    : false,
    	'bServerSide'    : false,
    	'bSearchable'	 :true,
    	'bAutoWidth'     : false,
    	'sAjaxSource'    : '<?php echo site_url('Check/index'); ?>',
    	'aoColumns' : [
    	{ 'sName': 'stu_id'},
    	{ 'sName': 'name'},
    	{ 'sName': 'reg_no'},         
    	{ 'sName': 'stu_sem'},
    	{ 'sName': 'date_of_birth'},
    	{ 'sName': 'number'},
    	],
    	"aaSorting": [[ 0, "desc" ]],
    	'fnServerData': function(sSource, aoData, fnCallback) 
    	{
    		$.ajax
    		({
    			'dataType': 'json',
    			'type'    : 'POST',
    			'url'     : sSource,
    			'data'    : aoData,
    			'success' : fnCallback
    		});
    	},

    });
</script>
</html>