<?php 
$conn = new mysqli("localhost","root","","voting_db");  //localhost ,username,password,databaseName

     if($conn->connect_error){ //check if connection success or not
         die("$conn->Connect_error");
     }