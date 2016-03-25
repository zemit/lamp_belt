<!DOCTYPE html>
<html>
<head>
	<title>Login/Registration</title>
	<meta charset = "utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<script language="JavaScript" src="ts_picker.js"></script>
</head>
<body>
	<h1>Welcome!</h1>
		<?php echo $this->session->userData('regError'); $this->session->unset_userdata('regError');?>
	<form action="LoginReg/processRegister" method="POST" enctype="multipart/form-data" accept-charset="utf-8">
		<fieldset>

			<legend>Register</legend>

			<label>Full Name:</label>
			<input type="text" name="fullName"> <br />
		
			<label>Alias:</label>
			<input type="text" name="alias"> <br />
		
			<label>Email</label>
			<input type="email" name="email"> <br />

			<label>Password:</label>
			<input type="password" name="password"> <br />

				<p>*Password should be at least 8 characters</p>

			<label>Confirm PW:</label>
			<input type="password" name="passwordConf"> <br />

			<label>Date of Birth:</label>
			<input type="text" name="timeStamp">
			<a href="javascript:show_calendar('document.tstest.timestamp', document.tstest.timestamp.value);">
			<img src="cal.gif" width="16" height="16" border="0"></a>

			<input type="submit" value="Register">	

		</fieldset>
	</form>

	<form action="/Homepage/SignIn" method="POST" enctype="multipart/form-data" accept-charset="utf-8">
		<fieldset>

			<legend>Login</legend>

			<label>Email</label>
			<input type="text" name="email"> <br />

			<label>Password:</label>
			<input type="password" name="password"> <br />
			<!-- Visable "Login" button-->
			<input type="submit" value="Login">

		</fieldset>
	</form>
</body>
</html>