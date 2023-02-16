 <?php
function redirect_to($location = Null){
	if ($location != NULL) {
		header("Location:$location");
		exit();
	}
}
function check_required_fields($required_array){
	$errors = array();
	foreach ($required_array as $fieldname) {
		if (!isset($_POST[$fieldname]) || (empty($_POST[$fieldname]) && !is_int($_POST[$fieldname])))  {
			$errors[] = $fieldname;
		}
	}
	return $errors;
}
?>