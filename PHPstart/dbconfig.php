<?php

$hostname = "14.34.17.167"; //주소 http://제외
$username = "Webteam"; //mysql 아이디
$password = "websimple"; //mysql 비번
$dbname = "test2"; //접속할 DB
$port ="3308";

$connection = mysqli_connect($hostname, $username, $password, $dbname, $port);
$connection->set_charset('utf8');


?>