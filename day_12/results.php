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

mysql_select_db($database_conn_vote, $conn_vote);
$query_rs_vote = "SELECT * FROM poll";
$rs_vote = mysql_query($query_rs_vote, $conn_vote) or die(mysql_error());
$row_rs_vote = mysql_fetch_assoc($rs_vote);
$totalRows_rs_vote = mysql_num_rows($rs_vote);

$resultQuestion1 = mysql_query("SELECT * FROM poll WHERE question='facebook'");
$num_rowsQuestion1 = mysql_num_rows($resultQuestion1);

$resultQuestion2 = mysql_query("SELECT * FROM poll WHERE question='twitter'");
$num_rowsQuestion2 = mysql_num_rows($resultQuestion2);

$resultQuestion3 = mysql_query("SELECT * FROM poll WHERE question='instagram'");
$num_rowsQuestion3 = mysql_num_rows($resultQuestion3);

$resultQuestion4 = mysql_query("SELECT * FROM poll WHERE question='snapchat'");
$num_rowsQuestion4 = mysql_num_rows($resultQuestion4);

$resultQuestion5 = mysql_query("SELECT * FROM poll WHERE question='tumblr'");
$num_rowsQuestion5 = mysql_num_rows($resultQuestion5);

$resultQuestion6 = mysql_query("SELECT * FROM poll WHERE question='vine'");
$num_rowsQuestion6 = mysql_num_rows($resultQuestion6);

$resultQuestion7 = mysql_query("SELECT * FROM poll WHERE question='beme'");
$num_rowsQuestion7 = mysql_num_rows($resultQuestion7);

$resultQuestion8 = mysql_query("SELECT * FROM poll WHERE question='pinterest'");
$num_rowsQuestion8 = mysql_num_rows($resultQuestion8);

$resultQuestion9 = mysql_query("SELECT * FROM poll WHERE question='google'");
$num_rowsQuestion9 = mysql_num_rows($resultQuestion9);

$resultQuestion10 = mysql_query("SELECT * FROM poll WHERE question='linkedin'");
$num_rowsQuestion10 = mysql_num_rows($resultQuestion10);

$resultQuestion11 = mysql_query("SELECT * FROM poll WHERE question='other'");
$num_rowsQuestion11 = mysql_num_rows($resultQuestion11);

$percentQuestion1 = ($num_rowsQuestion1 / $totalRows_rs_vote)*100;
$percentQuestion2 = ($num_rowsQuestion2 / $totalRows_rs_vote)*100;
$percentQuestion3 = ($num_rowsQuestion3 / $totalRows_rs_vote)*100;
$percentQuestion4 = ($num_rowsQuestion4 / $totalRows_rs_vote)*100;
$percentQuestion5 = ($num_rowsQuestion5 / $totalRows_rs_vote)*100;
$percentQuestion6 = ($num_rowsQuestion6 / $totalRows_rs_vote)*100;
$percentQuestion7 = ($num_rowsQuestion7 / $totalRows_rs_vote)*100;
$percentQuestion8 = ($num_rowsQuestion8 / $totalRows_rs_vote)*100;
$percentQuestion9 = ($num_rowsQuestion9 / $totalRows_rs_vote)*100;
$percentQuestion10 = ($num_rowsQuestion10 / $totalRows_rs_vote)*100;
$percentQuestion11 = ($num_rowsQuestion11 / $totalRows_rs_vote)*100;

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Results</title>
	<link rel="stylesheet" type="text/css" href="../styles/normalize.css">
	<link rel="stylesheet" type="text/css" href="../styles/main-styles.css">
	<link href="styles/poll-styles.css" rel="stylesheet" type="text/css" />
</head>

<body>

	<header>
	<p id="link_back"><a  href="../index.html">&lt Go Back</a></p>
	<p id="github">View the source on <a href="https://github.com/Jeremiahsvaren/30-projects-in-30-days">Github</a></p>
		<h1>Survey says...</h1>
	
		
		
	</header>
	
	<fieldset>
	
		<legend>Results</legend>
		
		<ul>
			<li>
				Facebook
				<br />
				<div class="results-bar" style="width: <?php echo round($percentQuestion1,2); ?>%;">
					 <?php echo round($percentQuestion1,2); ?>%
				</div>
			</li>
			
			<li>
				Twitter
				<div class="results-bar" style="width: <?php echo round($percentQuestion2,2); ?>%;">
					 <?php echo round($percentQuestion2,2); ?>%
				</div>
			</li>
		
			<li>
				Instagram
				<div class="results-bar" style="width: <?php echo round($percentQuestion3,2); ?>%;">
					 <?php echo round($percentQuestion3,2); ?>%
				</div>
			</li>
		
			<li>
				SnapChat
				<div class="results-bar" style="width: <?php echo round($percentQuestion4,2); ?>%;">
					 <?php echo round($percentQuestion4,2); ?>%
				</div>
			</li>
		
			<li>
				Tumblr
				<div class="results-bar" style="width: <?php echo round($percentQuestion5,2); ?>%;">
					 <?php echo round($percentQuestion5,2); ?>%
				</div>
			</li>
			
			<li>
				Vine
				<div class="results-bar" style="width: <?php echo round($percentQuestion6,2); ?>%;">
					 <?php echo round($percentQuestion6,2); ?>%
				</div>
			</li>
			
			<li>
				Beme
				<div class="results-bar" style="width: <?php echo round($percentQuestion7,2); ?>%;">
					 <?php echo round($percentQuestion7,2); ?>%
				</div>
			</li>
			
			<li>
				Pinterest
				<div class="results-bar" style="width: <?php echo round($percentQuestion8,2); ?>%;">
					 <?php echo round($percentQuestion8,2); ?>%
				</div>
			</li>
			
			<li>
				Google+
				<div class="results-bar" style="width: <?php echo round($percentQuestion9,2); ?>%;">
					 <?php echo round($percentQuestion9,2); ?>%
				</div>
			</li>
			
			<li>
				LinkedIn
				<div class="results-bar" style="width: <?php echo round($percentQuestion10,2); ?>%;">
					 <?php echo round($percentQuestion10,2); ?>%
				</div>
			</li>
			
			<li>
				Other
				<div class="results-bar" style="width: <?php echo round($percentQuestion11,2); ?>%;">
					 <?php echo round($percentQuestion11,2); ?>%
				</div>
			</li>
			
		</ul>
	
		<h6>Total votes: <?php echo $totalRows_rs_vote ?></h6>
		
		<a href="day_12.php">Back to Voting</a>
	
	</fieldset>
	
</body>
</html>

<?php
  mysql_free_result($rs_vote);
?>