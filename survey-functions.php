<?php
/* @author Shaun Hayner
 * @version Group Project 
 * @see 
*/

error_reporting(E_ALL);

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
	
	$table = "			<table cellpadding='10'>" . "\n";
	$table .= "				<tr>" . "\n";
	$table .= "					<td>Very</td>" . "\n";
	foreach($items AS $item){
		$table .= "					<td>" . "\n";
		$table .= "						<input type='radio' name='scale" . $scale . "' value='" . $item . "' id='scale" . $scale . "-" . $item . "' />" . "\n";
		$table .= "						" . $item . "\n";
		$table .= "					</td>" . "\n";
	}
	$table .= "					<td>Not at all</td>" . "\n";
	$table .= "				</tr>" . "\n";
	$table .= "			</table>" . "\n";
	
	return $table;
}
?>