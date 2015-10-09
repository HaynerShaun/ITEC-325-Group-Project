<?php
/* @author Shaun Hayner
 * @version Homework 2 
 * @see 
*/

error_reporting(E_ALL);

echo "<!DOCTYPE html>", "\n";
echo "<html>", "\n";
echo "	<head>", "\n";
echo "		<title>Survey form</title>", "\n";
echo "	</head>", "\n";
echo "	<body>", "\n";

foreach($_POST AS $temp => $temp_value){
	echo "		<p>" . $temp . " - " . $temp_value . "</p>\n";
}

echo "	</body>", "\n";
echo "</html>", "\n";

?>