<!DOCTYPE html>
<html>
	<head>
		{{ head }}
		<link rel="stylesheet" href="{{ mod-path }}/site-assets/css/style.css" media="screen" title="no title" charset="utf-8">
		<script type="text/javascript" src="{{ mod-path }}/site-assets/js/script.js"></script>
	</head>
	<body class="login">
		<div class="spacer sm-30"></div>
		<div class="container form_register">
			<div class="row">
				<div class="col-sm-4 offset-sm-4 sm-tacenter">
					<div class="row">
						<div class="col-sm-10 offset-sm-1">
							<form method="post" action="{{ bo-path }}/{{ lg }}/login/register/">
								{{ message }}
								<div class="img">
									<img class="avatar img-circle sm-block120" alt="avatar" src="https://www.gravatar.com/avatar/d41d8cd98f00b204e9800998ecf8427e?s=120&amp;r=g&amp;d=mm">
								</div>
								<div class="spacer sm-60"></div>
								<div class="form-group">
									<label for="register-input-name">Your Name / Username</label>
									<input type="text" name="input-name" class="form-control sm-tacenter" id="register-input-name" placeholder="" value="{{ name }}">
								</div>
								<div class="spacer sm-30"></div>
								<div class="form-group">
									<label for="register-input-email">Email address</label>
									<input type="email" name="input-email" class="form-control sm-tacenter" id="register-input-email" placeholder="" value="{{ email }}">
								</div>
								<div class="spacer sm-30"></div>
								<div class="form-group">
									<label for="register-input-password">Password</label>
									<input type="password" name="input-password" class="form-control sm-tacenter" id="register-input-password" placeholder="">
								</div>
								<div class="spacer sm-30"></div>
								<div class="form-group">
									<label for="register-input-repeat-password">Repeat Password</label>
									<input type="password" name="input-repeat-password" class="form-control sm-tacenter" id="register-input-repeat-password" placeholder="">
								</div>
								<div class="spacer sm-60"></div>
								<button name="register-input-submit" type="submit" class="btn btn-default btn-block">
									<span>Create Account</span>
								</button>
							</form>
							<div class="spacer sm-90"></div>
							<p>You have an account? <a class="a_signin" href="{{ bo-path }}/{{ lg }}/login/">Sign In</a></p>
							<div class="spacer sm-30"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="spacer sm-15"></div>
	</body>
</html>
