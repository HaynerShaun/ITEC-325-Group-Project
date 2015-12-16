<?php
	include 'header.php';
?>
<h2 class="sub-header">Advisors</h2>
<form method='POST'>
<div class="table-responsive">
	<table class="table table-striped">
		<thead>
			<tr>
				<th></th>
				<th>Advisors</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
		<?php 
			$advisor_list = array();
			$advisor_status = array();
			list_advisors();
			for($x = 0; $x < count($advisor_list); $x++) {
				echo "	<tr>\n";
				echo "		<td><input type='checkbox' name='change_status[]' value='" . $advisor_list[$x] . "-" . $advisor_status[$x] . "'></td>\n";
				echo "		<td>" . $advisor_list[$x] . "</td>\n";
				echo "		<td>" . (($advisor_status[$x] == 'TRUE') ? 'Active' : 'Inactive') . "</td>\n";
				echo "	</tr>\n";
			}
		?>
		<tr>
		<td colspan='4'>
			<button type="button" onclick='checkAll()'>Select All</button>
			<button type="button" onclick='unCheckAll()'>Deselect All</button>
			<input type="submit" value="Change status">
		</td>
		</tr>
		</tbody>
	</table>
</div>
</form>
<form method='POST'>
	<strong>Add new advisor: </strong>
	<input type='text' name='new_advisor'>
	<strong>Status: </strong>
	<select name='active'>
		<option value='TRUE'>Active</option>
		<option value='FALSE'>Inactive</option>
	</select>
	<input type="submit" value="Submit">
</form>
<?php
	include 'footer.php';
?>	