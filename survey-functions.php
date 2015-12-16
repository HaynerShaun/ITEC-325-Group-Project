<?php
	/* @author Shaun Hayner
		* @version Group Project 
		* @see 
	*/
	
	error_reporting(E_ALL);
	
	$user   = "proj7";
	$passwd = "Hoopsters";
	$db     = "//137.45.192.130/itec2.radford.edu";
	
	$meeting_types = array('INDIVIDUAL', 'GROUP');
	$meeting_types_cols = 2;
	$advisors = array();
	$advisors_cols = 3;
	$topics = array();
	$topics_cols = 2;
	$scale = array('5', '4', '3', '2', '1');
	
	$errors = array();
	
	function count_surveys($aid){
		global $user, $passwd, $db;
		$conn = oci_connect($user, $passwd, $db);
		
		if (!$conn) {
			echo "Connection to database unsuccessful.";
		}
		
		$stid = oci_parse($conn, 'SELECT COUNT(aid) FROM survey WHERE aid = :aid');
		oci_bind_by_name($stid, ':aid', $aid);
			
		oci_execute($stid);
		
		$count = 0;
		
		while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
			$count = $row[0];
		}
		
		oci_close($conn);
		
		return $count;
	}
	
	function get_averages_total(){
		global $user, $passwd, $db, $help_avg, $util_avg, $know_avg;
		$conn = oci_connect($user, $passwd, $db);
		
		if (!$conn) {
			echo "Connection to database unsuccessful.";
		}
		
		$stid = oci_parse($conn, 'SELECT avg(helpfulrating), avg(utilizerating), avg(knowledgerating) FROM survey');
			
		oci_execute($stid);
		
		while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
			$help_avg = round($row[0], 2);
			$util_avg = round($row[1], 2);
			$know_avg = round($row[2], 2);
		}
		
		oci_close($conn);
	}
	
	function get_averages($aid){
		global $user, $passwd, $db, $help_avg, $util_avg, $know_avg;
		$conn = oci_connect($user, $passwd, $db);
		
		if (!$conn) {
			echo "Connection to database unsuccessful.";
		}
		
		$stid = oci_parse($conn, 'SELECT avg(helpfulrating), avg(utilizerating), avg(knowledgerating) FROM survey WHERE aid = :aid GROUP BY :aid');
		oci_bind_by_name($stid, ':aid', $aid);
			
			oci_execute($stid);
		
		while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
			$help_avg = round($row[0], 2);
			$util_avg = round($row[1], 2);
			$know_avg = round($row[2], 2);
		}
		
		oci_close($conn);
	}
	
	function user_check($username){
		global $user, $passwd, $db;
		$conn = oci_connect($user, $passwd, $db);
		
		if (!$conn) {
			echo "Connection to database unsuccessful.";
		}
		
		$stid = oci_parse($conn, 'SELECT password FROM users WHERE username = :username');
		oci_bind_by_name($stid, ':username', $username);
			
		oci_execute($stid);
		
		while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
			$password = $row[0];
		}
		
		oci_close($conn);
		
		return $password;
	}
	
	function change_password($username, $password){
		echo "<h3>in password change function</h3>";
		global $user, $passwd, $db;
		$conn = oci_connect($user, $passwd, $db);
		
		if (!$conn) {
			echo "Connection to database unsuccessful.";
		}
		
		$password = hash('sha256', $password);
		
		$stid = oci_parse($conn, 'UPDATE users SET password = :password WHERE username = :username');
		oci_bind_by_name($stid, ':password', $password);
		oci_bind_by_name($stid, ':username', $username);
			
		oci_execute($stid);
		
		
		oci_close($conn);
	}
	
	function change_advisor_status($status_changes){
		global $user, $passwd, $db;
		$conn = oci_connect($user, $passwd, $db);
		
		if (!$conn) {
			echo "Connection to database unsuccessful.";
		}
		
		foreach($status_changes AS $change){
			$new_status = explode("-", $change);
			
			$isactive = $new_status[1] == 'TRUE' ? 'FALSE' : 'TRUE';
			$name = $new_status[0];
			
			$stid = oci_parse($conn, 'UPDATE advisor SET isactive = :isactive WHERE name = :name');
			oci_bind_by_name($stid, ':isactive', $isactive);
			oci_bind_by_name($stid, ':name', $name);
			
			oci_execute($stid);
		}
		
		oci_close($conn);
	}
	
	function add_new_advisor($name, $active){
		global $user, $passwd, $db, $advisors;
		
		$name = htmlspecialchars($name);
		
		$conn = oci_connect($user, $passwd, $db);
		
		if (!$conn) {
			echo "Connection to database unsuccessful.";
		}
		
		$stid = oci_parse($conn, 'SELECT MAX(AID) + 1 FROM ADVISOR');
		oci_execute($stid);
		
		while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
			$aid = $row[0];
		}
		
		$stid = oci_parse($conn, 'INSERT INTO advisor (AID, NAME, ISACTIVE) VALUES (:aid, :name, :active)');
		oci_bind_by_name($stid, ':aid', $aid);
		oci_bind_by_name($stid, ':name', $name);
		oci_bind_by_name($stid, ':active', $active);
		oci_execute($stid);
		
		$password = hash('sha256',$name);
		$stid = oci_parse($conn, 'INSERT INTO users (AID, USERNAME, PASSWORD) VALUES (:aid, :name, :password)');
		oci_bind_by_name($stid, ':aid', $aid);
		oci_bind_by_name($stid, ':name', $name);
		oci_bind_by_name($stid, ':password', $password);
		oci_execute($stid);
		
		
		oci_close($conn);
	}
	
	function add_new_topic($topic){
		global $user, $passwd, $db, $advisors;
		
		$topic = htmlspecialchars($topic);
		
		$conn = oci_connect($user, $passwd, $db);
		
		if (!$conn) {
			echo "Connection to database unsuccessful.";
		}
		
		$stid = oci_parse($conn, 'SELECT MAX(TID) + 1 FROM TOPIC');
		oci_execute($stid);
		
		while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
			$tid = $row[0];
		}
		
		$stid = oci_parse($conn, 'INSERT INTO topic (TID, TOPICNAME) VALUES (:tid, :topic)');
		oci_bind_by_name($stid, ':tid', $tid);
		oci_bind_by_name($stid, ':topic', $topic);
		oci_execute($stid);
		
		oci_close($conn);
	}
	
	function list_advisors(){
		global $user, $passwd, $db, $advisor_list, $advisor_status;
		
		$conn = oci_connect($user, $passwd, $db);
		
		if (!$conn) {
			echo "Connection to database unsuccessful.";
		}
		
		$stid = oci_parse($conn, 'SELECT * FROM advisor');
		oci_execute($stid);
		
		while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
			array_push($advisor_list,$row[1]);
			array_push($advisor_status,$row[2]);
		}
		
		oci_close($conn);
	}
	
	function list_topics(){
		global $user, $passwd, $db, $advisors;
		
		$conn = oci_connect($user, $passwd, $db);
		
		if (!$conn) {
			echo "Connection to database unsuccessful.";
		}
		
		$stid = oci_parse($conn, 'SELECT * FROM topic');
		oci_execute($stid);
		
		while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
			echo "	<tr><td>" . $row[1] . "</td></tr>\n";
		}
		
		oci_close($conn);
	}
	
	function retrieve_active_advisors(){
		global $user, $passwd, $db, $advisors;
		
		$conn = oci_connect($user, $passwd, $db);
		
		if (!$conn) {
			echo "Connection to database unsuccessful.";
		}
		
		$stid = oci_parse($conn, 'SELECT name FROM advisor WHERE isactive = :active');
		$active = 'TRUE';
		oci_bind_by_name($stid, ':active', $active);
		oci_execute($stid);
		
		while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
			array_push($advisors, $row[0]);
		}
		
		oci_close($conn);
	}
	
	function retrieve_topics(){
		global $user, $passwd, $db, $advisors, $topics;
		
		$conn = oci_connect($user, $passwd, $db);
		
		if (!$conn) {
			echo "Connection to database unsuccessful.";
		}
		
		$stid = oci_parse($conn, 'SELECT topicname FROM topic');
		oci_execute($stid);
		
		while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
			array_push($topics, $row[0]);
		}
		
		oci_close($conn);
	}
	
	function submit_survey(){
		global $user, $passwd, $db;
		
		$conn = oci_connect($user, $passwd, $db);
		
		if (!$conn) {
			echo "Connection to database unsuccessful.";
		}
		
		$aid = get_advisor_id($_POST['advisor']);
		
		$stid = oci_parse($conn, 'SELECT tid FROM topic WHERE topicname = :topic');
		$topic = $_POST['topic'];
		oci_bind_by_name($stid, ':topic', $topic);
		oci_execute($stid);
		
		while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
			$tid = $row[0];
		}
		
		$presentation = $_POST['meeting_type'];
		$help = $_POST['scale1'];
		$util = $_POST['scale2'];
		$know = $_POST['scale3'];
		$comment = htmlspecialchars($_POST['comment']);
		
		$stid = oci_parse($conn, 'begin :r := submit_survey(:aid, :tid, :presentation, :help, :util, :know, :comment); end;');
		
		oci_bind_by_name($stid, ':aid', $aid);
		oci_bind_by_name($stid, ':tid', $tid);
		oci_bind_by_name($stid, ':presentation', $presentation);
		oci_bind_by_name($stid, ':help', $help);
		oci_bind_by_name($stid, ':util', $util);
		oci_bind_by_name($stid, ':know', $know);
		oci_bind_by_name($stid, ':comment', $comment);
		
		oci_bind_by_name($stid, ':r', $r, 40);
		
		oci_execute($stid);
		oci_free_statement($stid);
		oci_close($conn);
	}
	
	function get_advisor_id($name){
		global $user, $passwd, $db;
		$conn = oci_connect($user, $passwd, $db);
		$stid = oci_parse($conn, 'SELECT aid FROM advisor WHERE name = :name');
		oci_bind_by_name($stid, ':name', $name);
		oci_execute($stid);
		
		while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
			$aid = $row[0];
		}
		oci_close($conn);
		return $aid;
	}
	
	function get_all_advisors(){
		$all_advisors = array();
		global $user, $passwd, $db;
		
		$conn = oci_connect($user, $passwd, $db);
		
		if (!$conn) {
			echo "Connection to database unsuccessful.";
		}
		
		$stid = oci_parse($conn, 'SELECT name FROM advisor');
		oci_execute($stid);
		
		while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
			array_push($all_advisors, $row[0]);
		}
		
		oci_close($conn);
		return $all_advisors;
	}
	
	function survey_data($aid){
		global $user, $passwd, $db;
		$conn = oci_connect($user, $passwd, $db);
		
		if (!$conn) {
			echo "Connection to database unsuccessful.";
		}
		
		$stid = oci_parse($conn, 'SELECT HELPFULRATING, UTILIZERATING, KNOWLEDGERATING, COMMENTS FROM survey WHERE aid = :aid');
		oci_bind_by_name($stid, ':aid', $aid);
		oci_execute($stid);
		
		while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
			echo "<tr>" . "\n";
			echo "<td>" . $row[0] . "</td>";
			echo "<td>" . $row[1] . "</td>";
			echo "<td>" . $row[2] . "</td>";
			echo "<td>" . $row[3] . "</td>";
			echo "</tr>" . "\n";
		}
		oci_close($conn);
	}
	
	function output_errors($errors){
		return '<ul><li>' . implode('</li><li>',$errors) . '</li></ul>';
	}
	
	function radioButtonTable($name, $table_items, $col_num){
		$row_num = ceil(sizeOf($table_items)/$col_num);
		$count = 0;
		$table = "			<table>" . "\n";
		
		for ($x = 0; $x < $row_num; $x++) {
			$table .= "				<tr>" . "\n";
			for ($y = 0; $y < $col_num; $y++) {
				if(array_key_exists($count,$table_items)){
					$table .= "				<td>" . "\n";
					$table .= "					<input type='radio' name='" . $name . "' value='";
					$table .= $table_items[$count] . "' id='" . $name . "-" . $table_items[$count] . "' />" . "\n";
					$table .= "					" . $table_items[$count] . "\n";
					$table .= "				</td>" . "\n";
					$count++;
				}
				}
				$table .= "				</tr>" . "\n";
				}
				$table .= "			</table>" . "\n";
				
				return $table;
				}
				
				function scaleTable($items, $scale){
				$initial = (int)(count($items)/2);
				$count = 0;
				$table = "			<table cellpadding='10'>" . "\n";
				$table .= "				<tr>" . "\n";
				$table .= "					<td>Very</td>" . "\n";
				foreach($items AS $item){
				$table .= "					<td>" . "\n";
				$table .= "						<input type='radio' name='scale" . $scale . "' value='" . $item . "' id='scale" . $scale . "-" . $item . "' ";
				if($count == $initial){
				$table .= "checked ";
				}
				$table .= " />" . "\n";
				$table .= "						" . $item . "\n";
				$table .= "					</td>" . "\n";
				$count++;
				}
				$table .= "					<td>Not at all</td>" . "\n";
				$table .= "				</tr>" . "\n";
				$table .= "			</table>" . "\n";
				
				return $table;
				}
				?>													