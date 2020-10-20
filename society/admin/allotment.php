<!DOCTYPE html>
<?php
	require 'connect.php';
?>
<html lang = "eng">
	<head>
		<title>Society Management</title>
		<meta charset = "UTF-8" />
		<meta name = "viewport" content = "width=device-width, initial-scale=1" />
		<link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/style1.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/jquery-ui.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/jquery.dataTables.css" />
	</head>
<body class="scrollbar-default">
<!--------------------HEAD---------------------->
<?php include'head.php'?>
<!--------------------HEAD---------------------->

<!-------------------SIDEBAR0------------------>
<?php include'sidebar.php'?>
<!-------------------SIDEBAR0------------------>

		<div id = "sidecontent1" class = "well pull-right">
				<div class = "alert alert-info">Allotment/Add/Update</div>
				<button type = "button" id = "add_student" class = "btn btn-success"><span class = "glyphicon glyphicon-plus"></span> Add Allotment</button>
				<button style = "display:none;" type = "button" id = "cancel_student" class = "btn btn-warning"><span class = "glyphicon glyphicon-hand-right"></span> Cancel</button>
				<br />
				<br />
				<div id = "s_table" class = "panel panel-default">
					<div  class = " panel-heading scrollbar-default">	
						<table id = "table" class = "table table-bordered">
							<thead>
								<tr>
									<th scope="col"> USERNAME </th>
									<th scope="col"> FLAT_ID </th>
									<th scope="col"> FULLNAME </th>
									<th scope="col"> MOBILE_NO</th>
									<th scope="col"> PAST-ADDRESS</th>
									<th scope="col"> PANDING_DUE</th>
									<th scope="col"> PHOTOS</th>
									<th scope="col"> ACTION</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$allot_query = $con->query("SELECT * FROM `account`") or die(mysqli_error($con));
									while($allot_fetch = $allot_query->fetch_array()){	
								?>
								<tr>
									<td><?php echo $allot_fetch['username']?></td>
									<td><?php echo $allot_fetch['flat_id']?></td>
									<td><?php echo $allot_fetch['fullname']?></td>
									<td><?php echo $allot_fetch['mobile_no']?></td>
									<td><?php echo $allot_fetch['past-address']?></td>
									<td><?php echo $allot_fetch['pending_dues']?></td>
									<td><center><img src ="<?php if($allot_fetch['photo'] == "default.png"){echo "../image/".$allot_fetch['photo'];}else{echo "../upload/".$allot_fetch['photo'];}?>" height = "45px" width = "45px"/></center></td>
									<td><center><a href = "edit_allot.php?id=<?php echo $allot_fetch['username']?>" class = "btn btn-warning"><span class = "glyphicon glyphicon-edit"> Update</a> <a href = "#" name = "<?php echo $allot_fetch['username']?>" data-toggle = "modal" data-target = "#delete_allot" class = "btn btn-danger id"><span class = "glyphicon glyphicon-trash"></span> Delete</a></center></td>
								</tr>
								<?php
									}
								?>
							</tbody>
						</table>
					</div>	
				</div>
				<div class = "modal fade" id = "delete_allot" tabindex = "-1" role = "dialog" aria-labelledby = "myModallabel">
					<div class = "modal-dialog" role = "document">
						<div class = "modal-content ">
							<div class = "modal-body">
								<center><label class = "text-danger">Are you sure you want to delete this record?</label></center>
								<br />
								<center><a class = "btn btn-danger delete_allot"><span class = "glyphicon glyphicon-ok"> Yes</a> <button type = "button" class = "btn btn-warning" data-dismiss = "modal" aria-label = "No"><span class = "glyphicon glyphicon-remove"></span> No</button></center>
							</div>
						</div>
					</div>
				</div>
				<div id = "s_form" style = "display:none;" class = "panel panel-default">
					<div  class = " panel-heading" >	
							<div class = "alert alert-success">Add new</div>
							<form method = "POST" enctype = "multipart/form-data" action = "add_allotment.php">
								<div class = "pull-left">
									<div id = "picture">
										<img onerror="this.src = '../image/default.png'" height = "200px" width = "200px" id="pic" src="#" />
									</div>
									<br />
									<div class = "form-group">
										<input type='file' onchange="readURL(this);" name = "image" />
									</div>
								</div>
								<div style = "width:40%; margin-left:32%;">	
									<div class = "form-group">
										<label>USERNAME</label>
										<input type = "text" class = "form-control" name = "username"/>
									</div>
									<div class = "form-group">
										<label>FLAT ID</label>
										<select class = "form-control" name = "flat_id" required = "required"/>
										<option value="">select options</option>
										<?php
											$allot_q = $con->query("select * from flat where status = 0") or die(mysqli_error($con));
											while($allot_f = $allot_q->fetch_array()){
										?>
										<option value="<?php echo $allot_f['flat_id']?>"><?php echo "flat_id=".$allot_f['flat_id']." |  Flat_number=".$allot_f['flat_num']." |  BHK=".$allot_f['BHK']." | FLOOR=".$allot_f['floor_no'] ?></option>
										<?php 
											}
										?>
										</select>
									</div>
									<div class = "form-group">
										<label>PASSWORD</label>
										<input type = "text" class = "form-control"  name = "password" required = "required"/>
									</div>
									<div class = "form-group">
										<label>FULLNAME</label>
										<input type = "text" class = "form-control"  name = "fullname" required= "required"/>
									</div>
									<div class = "form-group">
										<label>E-MAIL</label>
										<input type = "text" class = "form-control"  name = "e-mail" id="UserEmail" required = "required"/>
									</div>
									<div class = "form-group">
										<label>MOBILE_NO</label>
										<input type = "text" class = "form-control"  name = "mobile_no" id="txtPhone" required = "required"/><span id="spnPhoneStatus"></span>
									</div>
									<div class = "form-group">
										<label>PAST-ADDRESS</label>
										<input type = "text" class = "form-control"  name = "address" required = "required"/>
									</div>
									<div class = "form-group">
										<label>PENDING_DUES</label>
										<input type = "text" class = "form-control"  name = "pending_dues" required = "required"/>
									</div>
									<div class = "form-group">
										<button class = "btn btn-primary form-control" name = "save_allot" id="btn-submit"><span class = "glyphicon glyphicon-save"></span> Save</button>
									</div>
								</div>	
							</form>		
					</div>
				</div>
		</div>
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
</body>	
<script src = "../js/jquery-3.1.1.js"></script>
<script src = "../js/sidebar.js"></script>
<script src = "../js/bootstrap.js"></script>
<script src = "../js/jquery.dataTables.min.js"></script>
<script src = "../js/script.js"></script>
<script type = "text/javascript">
	$(document).ready(function(){
		$('#table').DataTable();
	});
</script>
<script type = "text/javascript">
	$(document).ready(function(){
		$('.id').on('click', function(){
			$id = $(this).attr('name');
			$('.delete_allot').on('click', function(){
				window.location = 'delete_allot.php?id=' + $id;
			});
		});
	});
	$(document).ready(function() { 
 
    $('#btn-submit').click(function() {  
 
        $(".error").hide();
        var hasError = false;
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
 
        var emailaddressVal = $("#UserEmail").val();
        if(emailaddressVal == '') {
            $("#UserEmail").after('<span class="error">Please enter your email address.</span>');
            hasError = true;
        }
 
        else if(!emailReg.test(emailaddressVal)) {
            $("#UserEmail").after('<span class="error">Enter a valid email address.</span>');
            hasError = true;
        }
 
        if(hasError == true) { return false; }
 
    });
});

	$(document).ready(function() {
    $('#txtPhone').blur(function(e) {
        if (validatePhone('txtPhone')) {
            $('#spnPhoneStatus').html('Valid');
            $('#spnPhoneStatus').css('color', 'green');
        }
        else {
            $('#spnPhoneStatus').html('Invalid');
            $('#spnPhoneStatus').css('color', 'red');
        }
    });
});

function validatePhone(txtPhone) {
    var a = document.getElementById(txtPhone).value;
    var filter = /^[0-9-+]+$/;
    if (filter.test(a)) {
        return true;
    }
    else {
        return false;
    }
}

</script>
</html>