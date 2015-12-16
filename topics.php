<?php
	include 'header.php';
?>	
<h2 class="sub-header">Topics</h2>
<div class="table-responsive">
	<table class="table table-striped">
		<tbody>
			<?php list_topics(); ?>
		</tbody>
	</table>
</div>
	<br>
	<form method='POST'>
		Add new topic: 
		<input type='text' name='topic'>
		<input type="submit" value="Submit">
	</form>
<?php	
	include 'footer.php';
?>	