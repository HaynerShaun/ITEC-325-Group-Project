<?php
	include 'header.php';
	
	if($username == 'admin'){
		$advisors = get_all_advisors();
		foreach ($advisors as $advisor) {
			$aid = get_advisor_id($advisor);
		?>
		<h2 class="sub-header"><?php echo $advisor; ?>'s Surveys</h2>
		<div class="table-responsive">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>How helpful was the 
						<br />information provided?</th>
						<th>How likely will you be able to 
						<br />utilize the information provided?</th>
						<th>How knowledgeable was <br />
						the career advisor/presenter?</th>
						<th>Comments</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$count = count_surveys($aid);
						if($count > 0){
							survey_data($aid);
						?>
						<tr style="font-weight:bold;">
							<?php
								$help_avg;
								$util_avg;
								$know_avg;
								
								get_averages($aid);
							?>
							<td><?php echo $help_avg; ?></td>
							<td><?php echo $util_avg; ?></td>
							<td><?php echo $know_avg; ?></td>
							<td>Average Ratings</td>
						</tr>
						<?php
							}else{
						?>
						<tr><td colspan='4' style='text-align:center;'>Currently no surveys have been submitted.</td></tr>
						<?php
						}
					?>
				</tbody>
			</table>
		</div>
		<?php
		}
		}else{
		$aid = get_advisor_id($advisor);
	?>
	<h2 class="sub-header"><?php echo $username; ?>'s Surveys</h2>
	<div class="table-responsive">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>How helpful was the 
					<br />information provided?</th>
					<th>How likely will you be able to 
					<br />utilize the information provided?</th>
					<th>How knowledgeable was <br />
					the career advisor/presenter?</th>
					<th>Comments</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$count = count_surveys($aid);
					if($count > 0){
						survey_data($aid);
						}else{
					?>
					<tr><td colspan='4' style='text-align:center;'>Currently no surveys have been submitted.</td></tr>
					<?php
					}
				?>
			</tbody>
		</table>
	</div>
	<?php	
	}
	include 'footer.php';
?>	