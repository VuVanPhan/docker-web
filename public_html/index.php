<?php
	// them __DIR__ de lay chinh xac duong link, neu vao server nao bat buoc chinh xac duong link nhu linux
	// su dung require_once load nhanh hon include

	require_once(__DIR__.'/lib/defineRoot.php');
	// // require_once(__DIR__.DS.'lib/mysqli.php');
	require_once(__DIR__.DS.'lib/DbPdo.php');
	$ConnectDb = new ConnectDb;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Trang Quản trị Tài chính</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="">
</head>
<body>
	<header>This's header</header>
	<nav>
		<ul>
			<li><a href="#">Home</a></li>
			<li><a href="">My Company</a></li>
		</ul>
	</nav>
	<div id="wrap-container" class="wrap-container">
		<div class="content">
			<form method="post" action="/formuser.php">
				<div class="field-1">
					<input type="text" name="user" placeholder="Username" />
				</div>
				<div class="field-2">
					<input type="password" name="pass" placeholder="Password">
				</div>
				<div class="field-3">
					<button type="submit" value="submit">Submit</button>
					<button type="reset" value="reset">Reset</button>
				</div>
			</form>
		</div>
	</div>
	<footer>This's footer</footer>
</body>
</html>