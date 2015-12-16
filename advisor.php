<?php
	require_once('survey-functions.php');
	include 'header.php';
	
	$help_avg;
	$util_avg;
	$know_avg;
	
	if($username === 'admin'){
		get_averages_total();
	?>
		<h1 class="page-header">Advising Center's Survey Averages</h1>
	<?php 
		}else{
	?>
	<h1 class="page-header"><?php echo $username; ?>'s Dashboard</h1>
	
	<?php 
			get_averages(get_advisor_id($username)); 
		}
	?>
	
	<div class="row placeholders">
		<div class="col-xs-6 col-sm-4 placeholder">
			<h4>How helpful was the 
			<br />information provided?</h4><br>
			<span class="text-muted"><?php echo $help_avg; ?>/5 Average Rating</span>
		</div>
		<div class="col-xs-6 col-sm-4 placeholder">
			<h4>How likely will you be able to 
			<br />utilize the information provided?</h4><br>
			<span class="text-muted"><?php echo $util_avg; ?>/5 Average Rating</span>
		</div>
		<div class="col-xs-6 col-sm-4 placeholder">
			<h4>How knowledgeable was 
			<br />the career advisor/presenter?</h4><br>
			<span class="text-muted"><?php echo $know_avg; ?>/5 Average Rating</span>
		</div>
	</div>
	
	<?php 
	include 'footer.php'; 
?>