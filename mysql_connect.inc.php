<?php
require_once("mysql_connect.inc_setting.php");

$conn = @mysqli_connect(DB_HOSTNAME,DB_USERNAME,DB_PASSWORD,DB_NAME);

if(mysqli_connect_errno($conn))
{
    echo "Unable to connect to the database";
}


mysqli_query($conn,"SET NAMES utf8;");


?> 