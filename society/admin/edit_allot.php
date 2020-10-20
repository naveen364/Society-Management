<!DOCTYPE html>
<?php
	require 'connect.php';
?>
<html lang = "eng">
	<head>
		<title> Society Memagement</title>
		<meta charset = "UTF-8" />
		<meta name = "viewport" content = "width=device-width, initial-scale=1" />
		<link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/style1.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/jquery-ui.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/jquery.dataTables.css" />
	</head>
<body>
<!--------------------HEAD---------------------->
<?php include'head.php'?>
<!--------------------HEAD---------------------->

<!-------------------SIDEBAR0------------------>
<?php include'sidebar.php'?>
<!-------------------SIDEBAR0------------------>

		<div id = "sidecontent1" class = "well pull-right">
				<div class = "alert alert-info"><span class = "glyphicon glyphicon-edit"></span> Update</div>
				<a class = "btn btn-warning" href = "allotment.php"><span class = "glyphicon glyphicon-hand_right"></span> Back</a>
				<br />
				<br />
				<div class = "panel panel-default">
					<div  class = " panel-heading" >	
							<?php
								$update_allot = $con->query("SELECT * FROM `account` WHERE `username` = '$_REQUEST[id]'") or die(mysqli_error($con));
								$u_allot = $update_allot->fetch_array();
							?>
							<form method = "POST" enctype = "multipart/form-data" action = "edit_allot_query.php?id=<?php echo $u_allot['username']?>">
								<div class = "pull-left">
									<div id = "picture">
										<img onerror="this.src = '<?php if($u_allot['photo'] == "default.png"){echo "../image/".$u_allot['photo'];}else{echo "../upload/".$u_allot['photo'];}?>'" height = "200px" width = "200px" id="pic" src="<?php echo "../upload/".$u_allot['photo'];?>"/>
									</div>
									<br/>
									<div class = "form-group">
										<input type='file' onchange="readURL(this);" name = "image" />
								</div>
								</div>
								<div style = "width:40%; margin-left:32%;">	
									<div class = "form-group">
										<label>USERNAME</label>
										<input type = "text" class = "form-control" value ="<?php echo $u_allot['username']?>" name = "username"/>
									</div>
									<div class = "form-group">
										<label>FLAT ID</label>
										<select class = "form-control" name = "flat_id" required = "required"/>
										<option value=""><?php echo $u_allot['flat_id']?></option>
										<?php
											$allot_q = $con->query("select flat_id from flat") or die(mysqli_error($con));
											while($allot_f = $allot_q->fetch_array()){	
										?>
										<option value="<?php echo $allot_f['flat_id']?>"><?php echo $allot_f['flat_id']?></option>
										<?php 
											}
										?>
										</select>
									</div>
									<div class = "form-group">
										<label>PASSWORD</label>
										<input type = "text" class = "form-control"  name = "password" value ="<?php echo $u_allot['password']?>" required = "required"/>
									</div>
									<div class = "form-group">
										<label>FULLNAME</label>
										<input type = "text" class = "form-control"  name = "fullname" value ="<?php echo $u_allot['fullname']?>" required= "required"/>
									</div>
									<div class = "form-group">
										<label>E-MAIL</label>
										<input type = "text" class = "form-control"  name = "e-mail" id="UserEmail" value ="<?php echo $u_allot['e-mail']?>" required = "required"/>
									</div>
									<div class = "form-group">
										<label>MOBILE_NO</label>
										<input type = "text" class = "form-control"  name = "mobile_no" id="txtPhone" value ="<?php echo $u_allot['mobile_no']?>" required = "required"/><span id="spnPhoneStatus"></span>
									</div>
									<div class = "form-group">
										<label>ADDRESS</label>
										<input type = "text" class = "form-control"  name = "address" value ="<?php echo $u_allot['past-address']?>" required = "required"/>
									</div>
									<div class = "form-group">
										<label>PENDING_DUES</label>
										<input type = "text" class = "form-control"  name = "pending_dues" value ="<?php echo $u_allot['pending_dues']?>" required = "required"/>
									</div>
									
									<div class = "form-group">
										<button class = "btn btn-warning form-control" name = "update_allot" id="btn-submit"><span class = "glyphicon glyphicon-save"></span> Save Changes</button>
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
<script src = "../js/script.js"></script>

<script type="text/javascript">
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