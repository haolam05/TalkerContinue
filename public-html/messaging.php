<?php 
    if ($dbUserRow["user_verified"] == 0) {              // reminds user to activate, and do NOT allow access 
?>       
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-3">Access denied!</h1>
            <p class="lead">You need to verify your email address before you can use this feature.</p>
        </div>
    </div>

<?php 
    } else {                                            // display the messaging form
        $db_data = array();
        $dbRecipientsList = phpFetchAllDB('SELECT * FROM users', $db_data);
?>                                      
    <h5>Messaging</h5>
    <hr>

    <div class="row">
        <div class="col-lg-12">
            <form name="formMessaging" action="messaging.ctrl.php" method="POST" novalidate>
                <div class="form-group">
                    <label for="formMessagingRecipient">Recipient</label>
                    <select class="form-control 
                                <?php 
                                    if ($_SESSION['msgid']!='301' && $_SESSION['msgid']!='') { 
                                        echo 'is-valid'; 
                                    } else { 
                                        echo (phpShowInputFeedback($_SESSION['msgid'])[0]); 
                                    } 
                                ?>" 
                            id="formMessagingRecipient" 
                            name="formMessagingRecipient" 
                            onchange="jsMessagingValidateSelect('formMessagingRecipient')"> 
                            
                            <option value="default" default>Select email</option>
                            <?php foreach ($dbRecipientsList as $dbRecipientRow) { ?>
                                <option value="<?php echo $dbRecipientRow['user_id']; ?>"
                                    <?php if  ($_SESSION['messaging_recipient'] != '' && $_SESSION['messaging_recipient'] == $dbRecipientRow["user_id"]) { 
                                        echo 'selected'; 
                                    } ?>     
                                >
                                    <?php echo $dbRecipientRow['user_email']; ?>
                                </option>
                            <?php } ?>
                    </select>
                    <?php if ($_SESSION["msgid"]=="301") { ?>
                        <div class="invalid-feedback">
                            <?php echo (phpShowInputFeedback($_SESSION["msgid"])[1]); ?>
                        </div>
                    <?php } ?>
                </div>

                <div class="form-group">
                    <label for="formMessagingContent">Message</label>
                    <textarea   class="form-control
                                    <?php 
                                        if ($_SESSION['msgid']!='302' && $_SESSION['msgid']!='') { 
                                            echo 'is-valid'; 
                                        } else { 
                                            echo (phpShowInputFeedback($_SESSION['msgid'])[0]); 
                                        } 
                                    ?>"
                                id="formMessagingContent" 
                                name="formMessagingContent" 
                                placeholder="Write the message here. Tags are not allowed." 
                                onkeyup="jsMessagingValidateTextArea('formMessagingContent')"
                    ></textarea>
                    <?php if ($_SESSION["msgid"]=="302") { ?>
                        <div class="invalid-feedback">
                            <?php echo (phpShowInputFeedback($_SESSION["msgid"])[1]); ?>
                        </div>
                    <?php } ?>
                </div>

                <button type="submit" id="formMessagingSubmit" name="formMessagingSubmit" class="btn btn-primary btn-success">Send</button>
            </form>
        </div>
    </div>

    <script src="messaging.js"></script>
<?php 
        $_SESSION['messaging_recipient']='';
    } 
?>