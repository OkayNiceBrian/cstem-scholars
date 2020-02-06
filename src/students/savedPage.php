<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Thank you!</title>
<link href='http://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<style type="text/css">

body{
	background:#8B0000;
}
.form{
	max-width:450px;
	padding:30px;
	margin:40px auto;
	background: #FFF;
	border-radius: 10px;
	-webkit-border-radius:10px;
	-moz-border-radius: 10px;
	box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.13);
	-moz-box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.13);
	-webkit-box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.13);
}
.form .inner-wrap{
	padding: 30px;
	background: #F8F8F8;
	border-radius: 6px;
	margin-bottom: 15px;
}
.form h1{
	background: #808080;
	padding: 20px 30px 15px 30px;
	margin: -30px -30px 30px -30px;
	border-radius: 10px 10px 0 0;
	-webkit-border-radius: 10px 10px 0 0;
	-moz-border-radius: 10px 10px 0 0;
	color: #fff;
	text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.12);
	font: normal 30px 'Bitter', serif;
	-moz-box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.17);
	-webkit-box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.17);
	box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.17);
	border: 1px solid #000000;
}
.form h1 > span{
	display: block;
	margin-top: 2px;
	font: 13px Arial, Helvetica, sans-serif;
}
.form label{
	display: block;
	font: 13px Arial, Helvetica, sans-serif;
	color: #000000;
	margin-bottom: 15px;
}
.form input[type="text"],
.form input[type="email"],
.form textarea,
.form select {
	display: block;
	box-sizing: border-box;
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	width: 100%;
	padding: 8px;
	border-radius: 6px;
	-webkit-border-radius:6px;
	-moz-border-radius:6px;
	border: 2px solid #fff;
	box-shadow: inset 0px 1px 1px rgba(0, 0, 0, 0.33);
	-moz-box-shadow: inset 0px 1px 1px rgba(0, 0, 0, 0.33);
	-webkit-box-shadow: inset 0px 1px 1px rgba(0, 0, 0, 0.33);
}

.form .section{
	font: normal 20px 'Bitter', serif;
	color: #000000;
	margin-bottom: 5px;
}
.form .section span {
	background: #808080;
	padding: 5px 10px 5px 10px;
	position: absolute;
	border-radius: 50%;
	-webkit-border-radius: 50%;
	-moz-border-radius: 50%;
	border: 4px solid #fff;
	font-size: 14px;
	margin-left: -45px;
	color: #fff;
	margin-top: -3px;
}
.form button[type="button"],
.form button[type="submit"]{
	background: #808080;
	padding: 8px 20px 8px 20px;
	border-radius: 5px;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	color: #fff;
	text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.12);
	font: normal 30px 'Bitter', serif;
	-moz-box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.17);
	-webkit-box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.17);
	box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.17);
	border: 1px solid #257C9E;
	font-size: 15px;
}
.logout button[type="submit"]{
				background: #808080;
				padding: 8px 20px 8px 20px;
				border-radius: 5px;
				-webkit-border-radius: 5px;
				-moz-border-radius: 5px;
				color: #fff;
				text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.12);
				font: normal 30px 'Bitter', serif;
				-moz-box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.17);
				-webkit-box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.17);
				box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.17);
				border: 1px solid #257C9E;
				font-size: 15px;
}
.form input[type="button"]:hover,
.form input[type="submit"]:hover{
	background: #2A6881;
	-moz-box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.28);
	-webkit-box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.28);
	box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.28);
}
.form .privacy-policy{
	float: right;
	width: 250px;
	font: 12px Arial, Helvetica, sans-serif;
	color: #000000;
	margin-top: 10px;
	text-align: right;
}

</style>
</head>

<body>
	<form role="form" method="post" align="right" >
		<div class = logout >
		<div class="button-section">
		 <button type="submit" class="button" name = "logout" formaction="../index.php?logout=true">Logout</button>
	 </div>
	 </div>
	 </form>
<?php
include_once 'creds.php';
$s = $pdo->query("SELECT Deadline FROM Settings");
$date_array = $s->fetch();
$deadline = $date_array['Deadline'];
$date = date("M j, Y", strtotime($deadline));

?>
<div class="form">
<h1>Your application has been saved!</h1>
<form>
    <div class="section"></div>
    <div class="inner-wrap">
        <label>You can come back any time before the deadline to update and submit your application. Be sure to have your application submitted and approved by your advisor before <b><?php echo $date; ?></b>.</label>
    </div>

 </span>

</form>
</div>

</body>
</html>

