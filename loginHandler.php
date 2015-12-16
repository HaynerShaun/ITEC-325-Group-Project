  	<?php
		error_reporting(E_ALL);
		$user   = "proj7";
		$passwd = "Hoopsters";
		$db     = "//137.45.192.130/itec2.radford.edu";
		$aid;


		$conn = oci_connect($user, $passwd, $db);
		if ($conn) {
			//echo "Connection successful.\n";
		}
		else {
			//echo "Error in connection.";
		}
		$result = "result";
		$username  = isset($_POST['username']) ? $_POST['username'] : false;
		$password  = isset($_POST['password']) ? $_POST['password'] : false;

		$stmt = oci_parse($conn, 'begin
		                  	      	:result := user_login(:username, :password);
    					          end;');
		

		oci_bind_by_name($stmt, ':username', $username);
		oci_bind_by_name($stmt, ':password', hash('sha256', $password));
		oci_bind_by_name($stmt, ':result', $result);
		oci_execute($stmt);
		
		if ($result === "result"){
			header('Location: '. "Login.php");
		}
		else {
			$result;
			header('Location: advisor.php');
			session_start();
			$_SESSION['username'] = $username;
		}
	?>
