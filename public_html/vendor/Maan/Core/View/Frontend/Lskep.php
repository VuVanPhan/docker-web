<?php
// var_dump($_PARAMS);die(__FILE__);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Trang Quản trị Tài chính</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="<?php echo SKIN_URL.'css/bootstrap.min.css'; ?>" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="<?php echo SKIN_URL.'css/frontend/styles.css'; ?>" crossorigin="anonymous">
	<script type="text/javascript" src="<?php echo JS_URL.'jquery-3.5.1.min.js'?>"></script>
	<script type="text/javascript" src="<?php echo JS_URL.'bootstrap.min.js'?>"></script>
</head>
<body class="text-center">

	<div id="wrap-container" class="wrap-container text-center">
		<div><h2>Dự tính lãi suất kép bạn nhận được :</h2></div>
		<div class="container col-md-4">
			<form class="form-signin" method="post" action="<?php echo HOME_URL.'ls/lskep' ?>">
				<div class="field-1 form-group">
					<span>Số tiền tiết kiệm</span>
					<input id="input-sotien" class="" type="" name="sotien" placeholder="Ex: 10000000, ..." />
					<label id="input-sotien"></label>
				</div>
				<div class="field-2 form-group">
					<span>Kỳ hạn gửi</span>
					<select name="kyhan" id="input-kyhan">
						<option value="1W">1 tuần</option>
						<option value="2W">2 tuần</option>
						<option value="3W">3 tuần</option>
						<option value="1M">1 tháng</option>
						<option value="2M">2 tháng</option>
						<option value="3M">3 tháng</option>
						<option value="6M">6 tháng</option>
						<option value="9M">9 tháng</option>
						<option value="12M" selected>12 tháng</option>
						<option value="13M">13 tháng</option>
						<option value="18M">18 tháng</option>
						<option value="24M">24 tháng</option>
						<option value="36M">36 tháng</option>
					</select>
					<label id="input-kyhan"></label>
				</div>
				<div class="field-3 form-group">
					<span>Lãi xuất</span>
					<input id="input-laisuat" class="" type="text" name="laisuat" placeholder="Ex: 8.7, ..." />
					<label id="input-laisuat"></label>
				</div>
				<div class="field-4 form-group">
					<span>Số năm gửi</span>
					<input id="input-sonam" class="" type="text" name="sonam" placeholder="Ex: 10, ..." />
					<label id="input-sonam"></label>
				</div>
				<div class="field-3 form-group">
						<button class="col-md-2 btn btn-lg btn-primary" type="submit" value="submit">Submit</button>
						<button class="col-md-2 btn btn-lg btn-reset btn-secondary" type="reset" value="reset">Reset</button>
				</div>
			</form>
		</div>
	</div>
	<footer></footer>
</body>
</html>