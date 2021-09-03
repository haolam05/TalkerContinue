<?php
    $db_data = array($_SESSION["uid"]);
    $dbUserRow = phpFetchDB("SELECT COUNT(*) AS 'count_unread_messages' FROM messages WHERE message_recipient_id = ? AND message_read_by_recipient = 0", $db_data);
?>

<h5>Welcome!</h5>
<hr>
<p>You have <strong><?php echo $dbUserRow["count_unread_messages"]; ?></strong> unread messages.</p>