<?php

$host="localhost";
$user="root";
$pass="";
$database="smp";

$link=mysqli_connect($host,$user,$pass,$database);
if(!$link)
{
    die("Sorry". mysqli_connect_error());
}
?>
        
