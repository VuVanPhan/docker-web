<!DOCTYPE html>
<html>
<head>
	<title>Trang Quản trị Tài chính</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="<?php echo SKIN_URL.'css/bootstrap.min.css'?>" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="<?php echo SKIN_URL.'css/frontend/styles.css'?>" crossorigin="anonymous">
	<script type="text/javascript" src="<?php echo JS_URL.'jquery-3.5.1.min.js'?>"></script>
	<script type="text/javascript" src="<?php echo JS_URL.'bootstrap.min.js'?>"></script>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-center">
		<ul class="nav nav-pills">
			<li class="nav-item"><a class="nav-link active" href="<?php echo HOME_URL ?>">Home</a></li>
			<li class="nav-item"><a class="nav-link" href="<?php echo HOME_URL.'mycompany' ?>">My Company</a></li>
			<li class="nav-item"><a class="nav-link" href="<?php echo HOME_URL.'#' ?>">Menu 2</a></li>
			<li class="nav-item"><a class="nav-link" href="<?php echo HOME_URL.'#' ?>">Menu 3</a></li>
			<li class="nav-item"><a class="nav-link" href="<?php echo HOME_URL.'#' ?>">Menu 4</a></li>
		</ul>
	</nav>
	<div id="wrap-container" class="wrap-container  text-center">
		<div class="container col-md-4">
			<form class="form-signin" method="post" action="<?php echo HOME_URL.'core/login' ?>">
				<div class="field-1 form-group">
					<input id="input-user" class="form-control" type="text" name="user" placeholder="Username" />
					<label id="input-user"></label>
				</div>
				<div class="field-2 form-group">
					<input id="input-pass" class="form-control" type="password" name="pass" placeholder="Password">
					<label id="input-pass"></label>
				</div>
				<div class="field-3 form-group">
						<button class="col-md-2 btn btn-lg btn-primary" type="submit" value="submit">Submit</button>
						<button class="col-md-2 btn btn-lg btn-reset btn-secondary" type="reset" value="reset">Reset</button>
				</div>
			</form>
		</div>
	</div>
	<footer>This's footer</footer>
</body>
</html>