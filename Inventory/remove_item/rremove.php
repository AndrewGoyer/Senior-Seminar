<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html dir="ltr" xmlns="http://www.w3.org/1999/xhtml">

<!-- #BeginTemplate "../master.dwt" -->

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<!-- #BeginEditable "doctitle" -->
<title>Remove Item</title>
<!-- #EndEditable -->
<link href="../styles/style1.css" media="screen" rel="stylesheet" title="CSS" type="text/css" />
</head>

<body>

<!-- Begin Container -->
<div id="container">
	<!-- Begin Masthead -->
	<div id="masthead">
		<h1>Tech Inventory</h1>
		<h3>Technology Inventory System </h3>
	</div>
	<!-- End Masthead -->
	<!-- Begin Navigation -->
	<div id="navigation">
		<ul>
			<li><a href="../home.html">Home</a></li>
			<li><a href="../add_item/default.html">Add Iem</a></li>
			<li><a href="default.html">Remove Item</a></li>
			<li><a href="../search/default.html">Search</a></li>
			<li><a href="../view_all/default.php">View All</a></li>

		</ul>
	</div>
	<!-- End Navigation -->
	<!-- Begin content_container -->
	<div id="content_container">
		<!-- Begin Left Column -->
		<div id="column_left">
			<!-- #BeginEditable "content" -->
			<h2>Item Removed</h2>
<?php
define('DB_NAME', 'techinve_csinventory');
define('DB_USER', 'techinve_aacg006');
define('DB_PASSWORD', 'seniorsem');
define('DB_HOST', 'localhost');

$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if (!$link) {
    echo "Error: Unable to connect to MySQL." . "<br>". PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . "<br>" . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . "<br>" . PHP_EOL;
    exit;
}

//echo "Success: A proper connection to MySQL was made!" . "<br>" . PHP_EOL;
//echo "Host information: " . mysqli_get_host_info($link) . "<br>" . PHP_EOL;

$serial = $_POST["serial"]; 
$inventory_id = $_POST["inventory_id"];

$sql  = "DELETE FROM `CS Inventory` WHERE `CS Inventory`.`Serial Number` LIKE '$serial'";
$sql1  = "DELETE FROM `CS Inventory` WHERE `CS Inventory`.`Inventory Number` LIKE '$inventory_id'";
$sql2  = "SELECT * FROM `CS Inventory` WHERE `Serial Number` LIKE '$serial'";
$sql3  = "SELECT * FROM `CS Inventory` WHERE `Serial Number` LIKE '$inventory_id'";

$result = mysqli_query($link, $sql);
$result1 = mysqli_query($link, $sql);
$result2 = mysqli_query($link, $sql1);
$result3 = mysqli_query($link, $sql1);


if(!$result){
	echo "Error: query - " . mysqli_error($link) . "<br>" . PHP_EOL;
	exit;
}

if(!$result1){
	echo "Error: query - " . mysqli_error($link) . "<br>" . PHP_EOL;
	exit;
}


if(!$result2){
	echo "Error: query - " . mysqli_error($link) . "<br>" . PHP_EOL;
	exit;
}


if(!$result3){
	echo "Error: query - " . mysqli_error($link) . "<br>" . PHP_EOL;
	exit;
}


while($row = mysqli_fetch_assoc($result2)) {
      echo 
         "--------------------------------<br>".
         "ID :{$row['ID']}  <br> ".
         "Serial Number : {$row['Serial Number']} <br> ".
         "Inventory Number : {$row['Inventory Number']} <br> ".
         "Make : {$row['Make']} <br> ".
         "Model : {$row['Model']} <br> ".
         "Os Type : {$row['Os Type']} <br> ".
         "Item Type : {$row['Item Type']} <br> ".
         "Location : {$row['Location']} <br> ".
         "Date Added : {$row['Date Added']} <br> ".
         "--------------------------------<br>" . PHP_EOL;
}

while($row = mysqli_fetch_assoc($result3)) {
      echo 
         "--------------------------------<br>".
         "ID :{$row['ID']}  <br> ".
         "Serial Number : {$row['Serial Number']} <br> ".
         "Inventory Number : {$row['Inventory Number']} <br> ".
         "Make : {$row['Make']} <br> ".
         "Model : {$row['Model']} <br> ".
         "Os Type : {$row['Os Type']} <br> ".
         "Item Type : {$row['Item Type']} <br> ".
         "Location : {$row['Location']} <br> ".
         "Date Added : {$row['Date Added']} <br> ".
         "--------------------------------<br>" . PHP_EOL;
}



echo "Success the Item was was removed from the data base!!" . "<br>" .  "<br>" . PHP_EOL;
echo "Item removed: ". "<br>" . "Serial Number: $serial". "<br>"  . "Inventory Number: $inventory_id". "<br>" . PHP_EOL;
  

$close = mysqli_close($link);

if(!$close){
	echo "Error: close DB" . mysqli_error($close) . "<br>" . PHP_EOL;
	exit;
}

//echo "Success item was removed!!" . "<br>" . PHP_EOL;
?>

<button type="button" onclick="window.location= 'default.html'">Return</button>

			<!-- #EndEditable --></div>
		<!-- End Left Column -->
		<!-- Begin Right Column -->
		<!-- End Right Column -->
		<!-- Begin Footer -->
		<div id="footer">
			<div id="copyright">
				<p>Copyright &copy; 2017. All Rights Reserved.</p>
			</div>
			<p><a href="../home.html">Home</a> | 
			<a href="../add_item/default.html">Add item 
			</a> | <a href="default.html">Remove Item</a> |
			<a href="../search/default.html">Search</a> |
			<a href="../view_all/default.php">View All</a> |
		</div>
		<!-- End Footer --></div>
	<!-- End content_container --></div>
<!-- End Container -->

</body>

<!-- #EndTemplate -->

</html>
