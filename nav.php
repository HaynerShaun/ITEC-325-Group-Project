<div class="container-fluid">
	<div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
			<ul class="nav nav-sidebar">
				<li class="inactive"><a href="advisor.php">Dashboard</a>
				<li class="inactive"><a href='survey-list.php'>Surveys</a></li>
				<?php
					if($username == 'admin'){
					?>	
					<li class="inactive"><a href='admin_advisors.php'>Advisors</a></li>
					<li class="inactive"><a href='topics.php'>Topics</a></li>
					<?php
					}
				?>
				<li class="inactive"><a href='change_password.php'>Change Password</a></li>
			</ul>
		</div>
	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">	