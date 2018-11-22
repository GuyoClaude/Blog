<?php
//Create connection
$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME );

//check conn
if(mysqli_connect_errno()){
    //connection failed
    echo ' Failed to connect to Database' .mysqli_connect_errno();
}
