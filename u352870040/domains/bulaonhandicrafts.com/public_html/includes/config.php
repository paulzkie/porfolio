<?php
define('DB_SERVER','localhost');
define('DB_USER','u352870040_user');
define('DB_PASS' ,'password123');
define('DB_NAME', 'u352870040_data');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>