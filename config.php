<?php
 $servername="sql301.epizy.com";
 $username="epiz_33996946";
 $password="40I85S5d3lD";
 $database_name="epiz_33996946_database1";
/*  $servername="localhost";
 $username="root";
 $password="";
 $database_name="database1"; */
 $conn=mysqli_connect($servername,$username,$password,$database_name);
 if(!$conn)
 {
    die("Connection Failed:".mysqli_connect_error());
 }
?>