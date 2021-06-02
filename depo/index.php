<?php 

    if (isset($POST["data"])){
		echo "DATA validation done";
        
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<style>
		
		body{
			width:60%;
			margin:auto;
			padding-top:200px;
		}

	</style>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<title>Document</title>
</head>
<body>
	
</body>
</html>
<form method="POST">
  <div class="form-group">
    <label for="email">Email:</label>
    <input type="email" class="form-control" id="email" placeholder="Enter username" name="uname" required>

  </div>
  <div class="form-group">
    <label for="password">Password:</label>
    <input type="password" class="form-control" id="password" placeholder="Enter password" name="pswd" required>
  </div>
  <div class="form-group">
    <label for="password_confirm">Retype password:</label>
    <input type="password" class="form-control" id="password_conf" placeholder="Enter password" name="pswd" required>
  </div>

  <button type="submit" onclick="submit" class="btn btn-primary">Submit</button>
</form>

	<script>
		$(document).ready(function() {

			$("#submit").click(function() {

				var email = $("#email").val();
				var password = $("#password").val();
				var password_conf = $("#password_conf").val();

				$.ajax({
					type: "POST",
					data: {	
						data: validate,
						email: email,
						password: password,
						password_conf: password_conf

					},
					cache: false,
					success: function(data) {
						alert(data);
					},
					error: function(xhr, status, error) {
						console.error(xhr);
					}
				});
				
			});

		});
	</script>

</body>
</html>

	