<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_conn_vote = "localhost"; 
$database_conn_vote = "databasename"; 
$username_conn_vote = "username";
$password_conn_vote = "password";
//$conn_vote = mysql_pconnect($hostname_conn_vote, $username_conn_vote, $password_conn_vote) or trigger_error(mysql_error(),E_USER_ERROR);
$conn_vote = mysql_connect($hostname_conn_vote, $username_conn_vote, $password_conn_vote) or die('Can\'t create connection: '.mysql_error());
mysql_select_db($database_conn_vote, $conn_vote) or die('Can\'t access specified db: '.mysql_error());
?>