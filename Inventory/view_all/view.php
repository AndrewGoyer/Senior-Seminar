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

$sql  = "SELECT * FROM `CS Inventory`";
$result = mysqli_query($link, $sql);

echo "<br>" . PHP_EOL;

if(!$result){
	echo "Error: query - " . mysqli_error($link) . "<br>" . PHP_EOL;
	exit;
}

while($row = mysqli_fetch_assoc($result)) {
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
         
       echo "
        <tr>
            <td>".$rows['Serial Number']."</td>
            <td>".$rows['Inventory Number']."</td>
            <td>".$rows['Make']."</td>
            <td>".$rows['Model']."</td>
            <td>".$rows['Os Type']."</td>
            <td>".$rows['Item Type']."</td>
            <td>".$rows['Location']."</td>
            <td>".$rows['Date Added']."</td>

        </tr>
        ";
}
   
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
