<?php
    if ($dbUserRow["user_verified"] == 0) {
?>

    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-3">Access denied!</h1>
            <p class="lead">You need to verify your email address before you can use this feature.</p>
        </div>
    </div>

<?php    
    } else {
        echo 'display form';
    }
?>

<script src="messaging.js"></script>
