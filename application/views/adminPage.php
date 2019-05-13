<!DOCTYPE html>
<html>
<head>
	<title>Welcome to admin dashboard</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />  
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<h3>Hello&nbsp;<?php echo $this->session->userdata("adminData"); ?></h3>
		</div>
	</div>
</body>
</html>