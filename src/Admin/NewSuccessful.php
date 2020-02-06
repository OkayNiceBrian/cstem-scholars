<!DOCTYPE html>
<html>
<head>
<title>Admin</title>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
    font-family: "Lato", sans-serif;
}
legend {
    background-color: #000;
    color: #fff;
    padding: 3px 6px;
}

.output {
    font: 1rem 'Fira Sans', sans-serif;
}

input {
    margin: .4rem;
}

label {
    display: inline-block;
    text-align: right;
    width: 20%;
}

.sidenav {
    height: 100%;
    width: 200px;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: lightgray;
    overflow-x: hidden;
    padding-top: 20px;
}

.sidenav a {
    padding: 6px 6px 6px 32px;
    text-decoration: none;
    font-size: 25px;
    color: black;
    display: block;
}

.sidenav a:hover {
    color: #f1f1f1;
}

.main {
    margin-left: 200px; /* Same as the width of the sidenav */
}
select.search{
	margin-right:15px;
	}
	input{
		width :300px;}
	
@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.stats-container {
    float: left;
    width: 33.33%;
    padding: 5px;
}

.clearfix::after {
    content: "";
    clear: both;
    display: table;
}
.w3-text-white, .w3-hover-text-white:hover {
    color: #fff!important;
    }
.w3-row-padding, .w3-row-padding>.w3-half, .w3-row-padding>.w3-third, .w3-row-padding>.w3-twothird, .w3-row-padding>.w3-threequarter, .w3-row-padding>.w3-quarter, .w3-row-padding>.w3-col {
    padding: 0 8px;}
    
    .w3-left {
    float: left!important;
}
.w3-right {
    float: right!important;
}
.w3-orange, .w3-hover-orange:hover {
    color: #000!important;
    background-color: #ff9800!important;
}
.w3-container, .w3-panel {
    padding: 0.01em 16px;
}
.w3-margin-bottom {
    margin-bottom: 16px!important;
}
</style>
<?php 
$database = parse_ini_file("config.ini");
$host = $database['host'];
$db = $database['db'];
$user = $database['user'];
$pass = $database['pass'];

$charset = 'utf8mb4';
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

$sth = $pdo->prepare("SELECT * FROM Settings");
$sth->execute();
$result= $sth->fetch();
$begin = $result[3];
$deadline= $result[1];
$budget = $result[4];
date_default_timezone_set('America/Boise'); 
$today = date('Y-m-d');
$deadlineTest = date("y-m-d", strtotime($today . "+ 1 day"));
$start = date($_REQUEST['start']);
$deadline = date($_REQUEST['end']);
$year = date("Y-m-d", strtotime($deadline . "+ 7 day"));
$end = strtotime($deadline);
$month = date("m", $end);
$y = date("Y", $end);
$name=$month.$y;
$sql = $pdo->prepare("UPDATE Settings SET Deadline= '$deadline', BeginDate= '$start', AdvisorDeadline='$year', DistributedApps = 0 WHERE 1");
$sql->execute();
 $sql = $pdo->prepare("CREATE TABLE Applications".$name."
  (ApplicationNum int AUTO_INCREMENT,SID int, PTitle varchar(50), Objective varchar(9000), Timeline varchar(500), 
   Budget double, RequestedBudget double, FundingSources varchar(1000), 
   Anticipatedresults varchar(1000), Justification varchar(1000), BudgetFilePath varchar(100), 
   Submitted boolean, Awarded boolean, AmountGranted int, AdvisorApproved boolean, AdvisorComments varchar(9000), AEmail varchar(30), PRIMARY KEY(ApplicationNum))");

 $sql->execute();
$sql = $pdo->prepare("CREATE TABLE ReviewedApps".$name." (ApplicationNum int, REmail varchar(50), QAComments varchar(1000),
 QA1 int, QA2 int, QA3 int, QA4 int, QA5 int, QA6 int, QATotal int, FundRecommend int, Submitted boolean, primary key (ApplicationNum, REmail))");
$sql ->execute();
$files = glob('../students/uploads/*');
foreach($files as $file){ 
  if(is_file($file))
    unlink($file); 
}
$end = ($result[1]);


?>
</head>
<form  method="post">
<body>
<div class="sidenav">
<img src ="img/ewueagle.png" height=125px; width = 185px;>
		<br>
		<br>
		<a href="index.php">Home</a>
		<br>
		<a href="edit.php">Edit</a>
		<br>
		<a href ="results.php">Results</a>
		<br>
		<a href="prior.php">Prior Awards</a>
		<br>
		<a href="search.php">Search</a>
		<br>
		<a href="new.php">New</a>
		<br>
		<br>
		<br>
		<a href ="../index.php?logout=true">Logout</a>
</div>

<div class="main">
   <div class="w3-container">
<h1>Begin a new Scholarship Process</h1>
<h4> By beginning a new Scholarship process you'll make all data currently stored historical and can no longer select any awardee's</h4>
<fieldset>
    <legend>New Scholarship Dates</legend>

    <div>
        <label for="start">Begin Date</label>
        <input type="date" min = <?php echo $today?>id="start" name="start"
               value= <?php echo htmlspecialchars($begin); ?>
                />
    </div>

    <div>
        <label for="end">Deadline</label>
        <input type="date" min =<?php echo $today?> id="end" name="end" 
               value= <?php echo htmlspecialchars($deadline); ?>
               />
        <h5>Success. A new process has began. </h5>
    </div>
    <button type = "submit" disabled formaction = "NewSuccessful.php">Begin New Process</button>
</fieldset>
<br>
</div>
<br>
<div class="w3-container">
<h2>Edit Current </h2>
<br>

<fieldset>
    <legend>Total Budget</legend>

    <div>
        <label for="budget">Begin Date</label>
        <input type="number" min ="0" id="budget" name="budget"
               value= <?php echo htmlspecialchars($budget); ?>
                />
    </div>
  <button type ="submit" formaction= "editBudget.php?budget="<?php echo $_REQUEST['budget']?>>Submit</button>  
</div>
<br>
		<div class="w3-container">
			<br>
			<fieldset>
			<legend>Extend Due Date</legend>
			<div>
				<label for="newDue">Due Date</label>
				<input type="date" min =<?php echo $today?> id="newDue" name="newDue" 
					value= <?php echo htmlspecialchars($deadline); ?>
					/>
			</div>
			<br>
		<button type ="submit" formaction= "editDueDate.php?newDue="<?php echo $_REQUEST['newDue']?>>Submit</button>  
		</fieldset>
		</div>
		<br>
		<br>
    </div>
</form>
</body>
</html>
