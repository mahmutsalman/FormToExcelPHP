<?php
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "form_to_excel";
$db = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($db->connect_error) {
die("Connection failed: " . $db->connect_error);
}
//$sql = "SELECT name, price FROM pizzas";
//$result2 = $db->query($sql);
?>