<?php require_once('conn_vote.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO poll (id, question) VALUES (%s, %s)",
                       GetSQLValueString($_POST['id'], "int"),
                       GetSQLValueString($_POST['Poll'], "text"));

  mysql_select_db($database_conn_vote, $conn_vote);
  $Result1 = mysql_query($insertSQL, $conn_vote) or die(mysql_error());

  $insertGoTo = "results.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

$colname_rs_vote = "-1";
if (isset($_GET['recordID'])) {
  $colname_rs_vote = $_GET['recordID'];
}
mysql_select_db($database_conn_vote, $conn_vote);
$query_rs_vote = sprintf("SELECT * FROM poll WHERE id = %s", GetSQLValueString($colname_rs_vote, "int"));
$rs_vote = mysql_query($query_rs_vote, $conn_vote) or die(mysql_error());
$row_rs_vote = mysql_fetch_assoc($rs_vote);
$totalRows_rs_vote = mysql_num_rows($rs_vote);
?>
<!DOCTYPE html>
<html lang=en>
<head>
	<title>Survey - Day 12</title>
	<link rel="stylesheet" type="text/css" href="../styles/normalize.css">
	<link rel="stylesheet" type="text/css" href="../styles/main-styles.css">
	<link rel="stylesheet" type="text/css" href="styles/poll-styles.css">

</head>

<body>

	<header>
	<p id="link_back"><a  href="../index.html">&lt Go Back</a></p>
	<p id="github">View the source on <a href="https://github.com/Jeremiahsvaren/30-projects-in-30-days">Github</a></p>
		<h1>Survey says...</h1>
	
		
		
	</header>
	<div id="main">
		<fieldset>
	<legend>What is your favorite Social Platform?</legend>
	<form action="<?php echo $editFormAction; ?>" id="form1" name="form1" method="POST">
		<label>
			<input type="radio" name="Poll" value="facebook" id="Poll_0" />
			Facebook
		</label>
		<label>
			<input type="radio" name="Poll" value="twitter" id="Poll_1" />
			Twitter
		 </label>
		 <label>
			<input type="radio" name="Poll" value="instagram" id="Poll_2" />
			Instagram
		</label>
		<label>
			<input type="radio" name="Poll" value="snapchat" id="Poll_3" />
			SnapChat
		</label>
		<label>
			<input type="radio" name="Poll" value="tumblr" id="Poll_4" />
			Tumblr
		</label>
		<label>
			<input type="radio" name="Poll" value="vine" id="Poll_5" />
			Vine
		</label>
		<label>	
			<input type="radio" name="Poll" value="beme" id="Poll_6" />
			Beme
		</label>
		<label>	
			<input type="radio" name="Poll" value="pinterest" id="Poll_7" />
			Pinterest
		</label>
		<label>	
			<input type="radio" name="Poll" value="google" id="Poll_8" />
			Google+
		</label>
		<label>	
			<input type="radio" name="Poll" value="linkedin" id="Poll_9" />
			LinkedIn
		</label>
		<label>	
			<input type="radio" name="Poll" value="other" id="Poll_10" />
			Other
		</label>
		<input type="submit" name="submit" id="submit" value="Vote" />
		<input type="hidden" name="id" value="form1" />
		<input type="hidden" name="MM_insert" value="form1" />
	</form>
</fieldset>
	
	</div>
		
	<footer>
	
	<p>View the source on <a href="https://github.com/Jeremiahsvaren/30-projects-in-30-days">Github</a></p>
	
	</footer>

	
</body>
</html>
<?php
  mysql_free_result($rs_vote);
?>