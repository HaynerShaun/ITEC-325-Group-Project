<!--
	@author Shaun Hayner
	@version Group Project
 -->
<!DOCTYPE html>
<html>
	<head>
		<title>Survey</title>
		<style >
			h3			{color:#c2011b;font-weight:bold;text-align:center;}
			p#p01		{color:#c2011b;font-weight:bold;}
			p#p02		{color:#c2011b;font-size:150%;}
			textarea	{resize:none;}
			img			{
				display: block;
				margin-left: auto;
				margin-right: auto }
		</style>
		<img src='RadfordU_CareerCenter_HorizOnLight_Proc.png' alt='Sorry!' />
	</head>
	<body>
<?php
	error_reporting(E_ALL);
	
	require_once('survey-functions.php');
	
	retrieve_active_advisors();
	retrieve_topics();
	
	if(empty($_POST) === true){
?>
		<p id='p02'>
			How are we doing?
		</p>
		<p >
			We are committed to providing you with the best service possible, so we welcome your opinion. Please fill this questionaire.
		</p>
		<form action='survey.php' method='post'>
			<p id='p01'>
				Was this an individual appointment or group presentation?
			</p>
			<?php
				echo radioButtonTable('meeting_type', $meeting_types, $meeting_types_cols);
			?>
			<hr>
			<p id='p01'>
				Who was the career advisor / presenter?
			</p>
			<?php
				echo radioButtonTable('advisor', $advisors, $advisors_cols);
			?>
			<hr>
			<p id='p01'>
				What was the topic?
			</p>
			<?php
				echo radioButtonTable('topic', $topics, $topics_cols);
			?>
			<hr>
			<p id='p01'>
				How helpful was the information provided?
			</p>
			<?php
				echo scaleTable($scale,1);
			?>
			<p id='p01'>
				How likely will you be to utilize the information provided?
			</p>
			<?php
				echo scaleTable($scale,2);
			?>
			<p id='p01'>
				How knowledgeable was the career advisor / presentor?
			</p>
			<?php
				echo scaleTable($scale,3);
			?>
			<hr>
			<p id='p01'>
				Comments
			</p>
			<textarea  name='comment' rows='4' cols='50'></textarea><br />
			<input type='submit' value='Submit'>
		</form>
	<?php
	} else {
		submit_survey();
	?>
		<h3>Thank you for submitting our survey!</h3>
	<?php
	}
	?>
	</body>
</html>