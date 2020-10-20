<!DOCTYPE html>
<html>
<head>
	<title>LOGIN FORM</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css"/ >
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"/ >
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
			<div id="h2">
				<h2>Admin Login</h2>
			</div>
			<form action="validation.php" method="post">
				<div class="form-group">
					<input type="text" name="username" class="form-control" placeholder="Enter the User Name"/ >
				</div>	
				<div class="form-group">
					<input type="password" name="password" class="form-control" placeholder="password"/ >
				</div>
				<button type="submit" class="btn btn-primary">Login</button>
			</form>
		</div>	
		</div>
	</div>	
</div>
	<div class="png">
		<div><img class="../img-responsive" src="image/houses5.png"></div>
	</div>
</body>
</html>