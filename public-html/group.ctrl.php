<?php
	session_start();
	require('system.ctrl.php');

	$group_name = $_POST["formGroupName"];
	$group_name_pattern = "~^[^<>]{1,}$~";

	$group_name_validation = preg_match($group_name_pattern, $group_name);

	//query the database only if the group name regex compliant
	if ($group_name_validation) {

		//insert the database row
		$db_data = array($_SESSION["uid"], $group_name);
		phpModifyDB('INSERT INTO groups (group_owner_id, group_name) VALUES (?, ?)', $db_data);

		//system feedback - your group has been created
		$_SESSION["msgid"] = "411";

	} else {
		//input feedback - for Javascript turned off
		if (!$group_name_validation) {
			//group name not regex compliant
			$_SESSION["msgid"] = "401";
			//return the group_name back to the form
			$_SESSION["group_name"] = $group_name;
		}
	}

	header('Location: gate.php?module=group');
?>
