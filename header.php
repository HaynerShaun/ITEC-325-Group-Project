<?php
	/* @author Shaun Hayner
		* @version Group Project 
		* @see 
	*/
	
	error_reporting(E_ALL);
	require_once('survey-functions.php');
	
	session_start();
	
	if(isset($_SESSION['username']) === false){
		header("Location:  Login.php");
	}
	
	$username = $_SESSION['username'];
	
	if(isset($_POST['new_advisor']) === true){
		add_new_advisor($_POST['new_advisor'], $_POST['active']);
		header("Location: admin_advisors.php");
	}
	
	if(isset($_POST['topic']) === true){
		add_new_topic($_POST['topic']);
		header("Location:  topics.php");
	}
	
	if(isset($_POST['change_status']) === true){
		$status_changes = $_POST['change_status'];
		change_advisor_status($status_changes);
		header("Location:  admin_advisors.php");
	}
	
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="icon" type="image/png" href="favicon.png">
	
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Advisor Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>
	
    <script src="advisor.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top" color="#E1E1E1">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Career Advising Data</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </div>
      </div>
    </nav>
<?php
	include 'nav.php';
?>