<?php 
	include 'header.php';
	if(empty($_POST) === false){
		echo "<h2>in first if statement</h2>";
		$required_fields = array('current_password','password','password_again');
		foreach($_POST AS $key => $value){
			if(empty($value) && in_array($key, $required_fields) === true){
				$errors[] = 'Fields marked with an asterisk are required';
				break 1;
			}
		}
		
		if(user_check($username) === hash('sha256',$_POST['current_password'])){
			if(trim($_POST['password']) !== trim($_POST['password_again'])){
				$errors[] = 'Your new passwords do not match.';
				} else if (strlen($_POST['password']) < 5) {
				$errors[] = 'Your password must be at least 5 characters';
			}
			} else {
			$errors[] = 'Your current password is incorrect.';
		}
	}
	
?>
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<h1 style='text-align:center;'>Change Password</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-6 col-sm-offset-3">
			
			<?php
				if(isset($_GET['success']) && empty($_GET['success'])){
					echo 'You\'ve successfully changed your password!';
					} else {
					if(empty($_POST) === false && empty($errors) === true){
						change_password($username, $_POST['password']);
						header('LOCATION: change_password.php?success');
						}else if (empty($errors) === false){
						echo "<ul style='color:red;'>";
						foreach($errors AS $error){
							echo "<li>" . $error . "</li>";
						}
						echo "</ul>";
					}
				?>
				<form action="" method="post" id="passwordForm">
					<input type="password" class="input-lg form-control" name="current_password" id="password1" placeholder="Current Password" autocomplete="off"><br>
					<input type="password" class="input-lg form-control" name="password" id="password2" placeholder="New Password" autocomplete="off"><br>
					<input type="password" class="input-lg form-control" name="password_again" id="password3" placeholder="Repeat Password" autocomplete="off"><br>
					<input type="submit" class="col-xs-12 btn btn-primary btn-load btn-lg" data-loading-text="Changing Password..." value="Change Password">
				</form>
			</div><!--/col-sm-6-->
		</div><!--/row-->
	</div>
	<?php 
	}
	include 'footer.php'; 
?>