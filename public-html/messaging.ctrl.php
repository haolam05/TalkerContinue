<?php
	session_start();
	require('system.ctrl.php');

	$messaging_recipient = $_POST["formMessagingRecipient"];
	$messaging_content = $_POST["formMessagingContent"];
	$messaging_content_pattern = "~^[^<>]{1,}$~";

	$messaging_content_validation = preg_match($messaging_content_pattern, $messaging_content);

	//query the database only if recipient is valid and content is regex compliant
	if ($messaging_recipient != "default" && $messaging_content_validation) {

		//store the message in the database
        

		$_SESSION['msgid']='311';
 
	} else {
		//input feedback - for Javascript turned off
		if ($messaging_recipient == "default") {
			$_SESSION['msgid']='301';
		} else if (!$messaging_content_validation) {
			$_SESSION['msgid']='302';
            $_SESSION['messaging_recipient']=$messaging_recipient;
		}
	}

    header('Location: gate.php?module=messaging');
?>
