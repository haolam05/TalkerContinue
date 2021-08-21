<?php
    session_start();
    require('system.ctrl.php');

    $verify_link_email = $_GET["email"];
    $verify_link_hash = $_GET["hash"];

    //checking if the email from the link is actually in the database
    $db_data = array($verify_link_email);
    $db_query = 'SELECT * FROM users WHERE user_email = ?';
    $isAlreadySignedUp = phpFetchDB($db_query, $db_data);

    // echo $isAlreadySignedUp["user_email"];
    // echo "<br>";
    // echo $isAlreadySignedUp["user_password"];
    // echo "<br>";
    // echo $isAlreadySignedUp["user_verified"];
    // echo "<br>";

    if (!is_array($isAlreadySignedUp)) {

        //email not registered -> feedback message
        // echo "Not registered";
        $_SESSION["msgid"] = "805";
        header("Location: index.php");

    } else if ($isAlreadySignedUp["user_verified"] == 1 ) {

        //email registered, but already activated -> feedback message
        // echo "Already activated";
        $_SESSION["msgid"] = "806";
        header("Location: index.php");

    } else if ($isAlreadySignedUp["user_verified"] == 0 && $isAlreadySignedUp["user_password"] == $verify_link_hash) {

        //email registered, but not activated -> set verified to 1 -> feedback message
        // echo "Let's activate!";
        
        //activate account in db
        $db_data = array(1, $isAlreadySignedUp["user_email"]);
        $db_query = 'UPDATE users SET user_verified = ? WHERE user_email = ?';
        phpModifyDB($db_query, $db_data);

        $_SESSION["msgid"] = "811";
        header("Location: index.php");
    } else {

        //hash doesn't match the password, wrong password
        // echo "Wrong hash";
        $_SESSION["msgid"] = "807";
        header("Location: index.php");

    }
?>