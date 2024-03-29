<?php
	/* @author Shaun Hayner
		* @version Group Project 
		* @see 
	*/
	
	error_reporting(E_ALL);
	
	require_once('survey-functions.php');
	
	$meeting_types = array('Individual', 'Group');
	$meeting_types_cols = 2;
	$advisors = array('Teresa D.', 'Leanne H.', 'John L.', 'Ellen T.', 'Sarah R.', 'Carolyn S.', 'Alumni / employer', 'Other / do not recall');
	$advisors_cols = 3;
	$topics = array('Assessments / Focus', 'Resume / Cover Letter', 'Graduate School', 'Internships', 'Interview Prep', 'Job Search', 'Social Media', 'What can I do with this major?', 'Hire A Hirelander / Work-Study', 'Career Resources / Other');
	$topics_cols = 2;
	$scale = array('5', '4', '3', '2', '1');
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Survey</title>
		<style>
			p#p01		{color:#c2011b;font-weight:bold;}
			p#p02		{color:#c2011b;font-size:150%;}
			p#p03		{color:#c2011b;}
			textarea	{resize:none;}
		</style>
	</head>
	<body>
		<img src='https://php.radford.edu/~shayner2/itec325/Group_Project/RadfordU_CareerCenter_HorizOnLight_Proc.png' alt='Sorry!' />
		<p id='p02'>
			How are we doing?
		</p>
		<p>
			We are committed to providing you with the best service possible, so we welcome your opinion. Please fill this questionaire.
		</p>
		<form action='survey-form-handling.php' method='post'>
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
			<p id='p03'>
				Comments
			</p>
			<textarea  name='comment' rows='4' cols='50'></textarea><br />
			<input type='submit' value='Submit'>
		</form>
	</body>
</html>