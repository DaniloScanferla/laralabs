<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Ajax Laravel 5.1</title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<h2> Register form </h2>

		<div class="row col-lg-5">
			<h2>Get Request</h2>
			<button type="button" class="btn btn-warning" id="getRequest">getRequest</button>
		</div>

		<div id="getRequestData"></div>

		<div class="row col-lg-5">
			<h2>Register Form</h2>
			<form id="register" action="#">
				<input type="hidden" name="_token" value="{{ csrf_token() }}"

				<label for="firstname"></label>
				<input type="text" id="firstname" placeholder="Primeiro Nome:" class="form-control">

				<label for="lastname"></label>
				<input type="text" id="lastname" placeholder="Ultimo Nome:" class="form-control">

				<input type="submit" value="Register" class="btn btn-primary">

			</form>
		</div>
		
	</div>

	<script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript">
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		})

		$(document).ready(function(){
			$('#getRequest').click(function(){
				$.get('getRequest', function(data){
					$('#getRequestData').append(data);
					console.log(data);
				});
			});

			$('#register').submit(function(){
				var fname = $('#firstname').val();
				var lname = $('#lastname').val();
				
				//$.post('register', {firstname:fname, lastname:lname}, function(data){
				//	console.log(data);
				//	$('#postRequestData').html(data);
				//});

				var dataString = "firstname="+fname+"&lastname="+lname;
				$.ajax({
					type: "POST",
					url: "register",
					data: dataString,
					success: function(data){
						console.log(data);
						//$('#postRequestData').html(data);
					}
				});
			});
		});
	</script>

</body>
</html>