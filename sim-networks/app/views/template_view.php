<!DOCTYPE HTML>
<html>
<head>
	<title><?=$data->title;?></title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="/static/css/style.css"/>
	<script src="/static/js/jquery-1.12.4.min.js"></script>
	<script src="/static/js/script.js"></script>
</head>
<body>
	<div id="wrapper">
		<header>
			<div class="container">
				<div class="logo">Guest Book</div>
			</div>
		</header>
		<div class="main">
			<div class="container clearfix">
				<?php include 'app/views/'.$content_view; ?>
			</div>
		</div>
	</div>
</body>
</html>