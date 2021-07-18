<?php
// session_start();
$server = "localhost";
$name = "root";
$password = "";
$database = "lab_auto";

$conn = mysqli_connect($server, $name, $password, $database);
if ($conn)
{

}
else
{
    echo 'Your Database is not connected';
}

?>
