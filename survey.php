<?php
/* @author Shaun Hayner
 * @version Group Project 
 * @see 
*/

error_reporting(E_ALL);

require_once("survey-functions.php");

$meeting_types = array("Individual", "Group");
$meeting_types_cols = 2;
$advisors = array("Teresa D.", "Leanne H.", "John L.", "Ellen T.", "Sarah R.", "Carolyn S.", "Alumni / employer", "Other / do not recall");
$advisors_cols = 3;
$topics = array("Assessments / Focus", "Resume / Cover Letter", "Graduate School", "Internships", "Interview Prep", "Job Search", "Social Media", "What can I do with this major?", "Hire A Hirelander / Work-Study", "Career Resources / Other");
$topics_cols = 2;
$scale = array("5", "4", "3", "2", "1");
	
echo"<!DOCTYPE html>" . "\n";
echo"<html>" . "\n";
echo"	<head>" . "\n";
echo"		<title>Survey</title>" . "\n";
echo"		<style>" . "\n";
echo"			p#p01		{color:red;font-weight:bold;}" . "\n";
echo"			p#p02		{color:red;font-size:150%;}" . "\n";
echo"			p#p03		{color:red;}" . "\n";
echo"			textarea	{resize:none;}" . "\n";
echo"		</style>" . "\n";
echo"	</head>" . "\n";
echo"	<body>" . "\n";
echo"		<h1 align=\"center\">" . "\n";
echo"			RADFORD UNIVERSITY" . "\n";
echo"		</h1>" . "\n";
echo"		<h3 align=\"center\">" . "\n";
echo"			Career Center" . "\n";
echo"		</h3>" . "\n";
echo"		<p id='p02'>" . "\n";
echo"			How are we doing?" . "\n";
echo"		</p>" . "\n";
echo"		<p>" . "\n";
echo"			We are committed to providing you with the best service possible, so we welcome your opinion. Please fill this questionaire." . "\n";
echo"		</p>" . "\n";
echo"		<form action=\"survey-form-handling.php\" method=\"post\">" . "\n";
echo"			<p id='p01'>" . "\n";
echo"				Was this an individual appointment or group presentation?" . "\n";
echo"			</p>" . "\n";
echo radioButtonTable("meeting_type", $meeting_types, $meeting_types_cols);
echo"			<hr>" . "\n";
echo"			<p id='p01'>" . "\n";
echo"				Who was the career advisor / presenter?" . "\n";
echo"			</p>" . "\n";
echo radioButtonTable("advisor", $advisors, $advisors_cols);
echo"			<hr>" . "\n";
echo"			<p id='p01'>" . "\n";
echo"				What was the topic?" . "\n";
echo"			</p>" . "\n";
echo radioButtonTable("topic", $topics, $topics_cols);
echo"			<hr>" . "\n";
echo"			<p id='p01'>" . "\n";
echo"				How helpful was the information provided?" . "\n";
echo"			</p>" . "\n";
echo scaleTable($scale,1);
echo"			<p id='p01'>" . "\n";
echo"				How likely will you be to utilize the information provided?" . "\n";
echo"			</p>" . "\n";
echo scaleTable($scale,2);
echo"			<p id='p01'>" . "\n";
echo"				How knowledgeable was the career advisor / presentor?" . "\n";
echo"			</p>" . "\n";
echo scaleTable($scale,3);
echo"			<hr>" . "\n";
echo"			<p id='p03'>" . "\n";
echo"				Comments" . "\n";
echo"			</p>" . "\n";
echo"			<textarea  name='comment' rows='4' cols='50'></textarea><br /><br />" . "\n";
echo"			<input type=\"submit\" value=\"Submit\">" . "\n";
echo"		</form>" . "\n";
echo"	</body>" . "\n";
echo"</html>" . "\n";
?>