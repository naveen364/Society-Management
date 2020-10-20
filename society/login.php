<!DOCTYPE html>
<html>
<head>
	<title>LOGIN FORM</title>
		<link rel = "stylesheet" type = "text/css" href = "css/style.css"/>
		<meta charset="utf-8" />
    	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
    	<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "css/jquery-ui.css" />
		<link rel = "stylesheet" type = "text/css" href = "css/jquery.dataTables.css" />
		<style type="text/css">
		.png{
		  margin-top: -120px;
		  display: flex;
		}

		.png div{
		  -ms-flex: 1;  /* IE 10 */  
		    flex: 1;
		}
		</style>
</head>
<body>	
	<div class="container">
		<div class="login-box">
		<div class="row">
		<div class="col-md-6 login-block">
			<h2>Login Here</h2>
			<form action="validation.php" method="post">
				<div class="form-group">
					<input type="text" name="username" class="form-control" placeholder="Enter the User Name"/ >
				</div>	
				<div class="form-group">
					<input type="password" name="password" class="form-control" placeholder="password"/ >
				</div>
				<button type="submit" class="btn btn-primary" name="login">Login</button>
			</form>
		</div>	
		</div>
	</div>	
</div>
	<div class="png">
		<div><img class="img-responsive" src="image/houses5.png"></div>
	</div>
</body>
</html>