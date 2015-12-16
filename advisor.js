function checkAll(){
	var checkboxes = new Array(); 
	checkboxes = document.getElementsByName('change_status[]');
	
	for (var i = 0; i < checkboxes.length; i++){
		checkboxes[i].checked = true;
	}
}
function unCheckAll(){
	var checkboxes = new Array(); 
	checkboxes = document.getElementsByName('change_status[]');
	
	for (var i = 0; i < checkboxes.length; i++){
		checkboxes[i].checked = false;
	}
}