<html>
<body>

<button type="button" onclick="window.location= 'default.html'">Return</button><br>

<?php
define('DB_NAME', 'id889647_inventory');
define('DB_USER', 'id889647_acg006');
define('DB_PASSWORD', 'CSCI-440');
define('DB_HOST', 'localhost');

$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if (!$link) {
    echo "Error: Unable to connect to MySQL." . "<br>". PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . "<br>" . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . "<br>" . PHP_EOL;
    exit;
}

echo "Success: A proper connection to MySQL was made!" . "<br>" . PHP_EOL;
echo "Host information: " . mysqli_get_host_info($link) . "<br>" . PHP_EOL;

$serial = $_POST["serial"]; 
$inventory_id = $_POST["inventory_id"];
$make = $_POST["make"];
$model = $_POST["model"];
$os = $_POST["os"];
$type = $_POST["type"];
$location = $_POST["location"];
$created_date = date("Y-m-d H:i:s");

$sql  = "INSERT INTO `CS Inventory` (`ID`, `Serial Number`, `Inventory Number`, `Make`, `Model`, `Os Type`, `Item Type`, `Location`, `Date Added`) VALUES (NULL, '$serial', '$inventory_id', '$make', '$model', '$os', '$type', '$location', '$created_date')";
$result = mysqli_query($link, $sql);

if(!$result){
	echo "Error: query - " . mysqli_error($link) . "<br>" . PHP_EOL;
	exit;
}

echo "Success the Item was added to the data base!!" . "<br>" .  "<br>" . PHP_EOL;
echo "Item added: ". "<br>" . "Serial Number: $serial". "<br>"  . "Inventory Number: $inventory_id". "<br>"  . "Make: $make". "<br>"  . "Model: $model". "<br>" . "Operating System: $os". "<br>" . "Item Type: $type". "<br>" . "Location: $location". "<br>" . "<br>" . PHP_EOL;
  

$close = mysqli_close($link);

if(!$close){
	echo "Error: close DB" . mysqli_error($close) . "<br>" . PHP_EOL;
	exit;
}

echo "Success the DB was closed!!" . "<br>" . PHP_EOL;
?>

<button type="button" onclick="window.location= 'default.html'">Return</button>

</body>
</html>

