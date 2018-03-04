<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

	<div class="container">
		<div class='row' style="margin-top: 20px;">
			<div class='col-md-offset-4 col-md-4'>
				<?php echo form_open('mydata/do_login');?>
					<div class="form-group">
						<label>Usernmame</label>
						<input type="text" name="username" class="form-control">
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" name="password" class="form-control">
					</div>
					<button type="submit" class="btn btn-info btn-sm">เข้าระบบ</button>
				<?php echo form_close();?>
			</div>
		</div>
	</div>

</body>
</html>