<?php
    require('db-pswd.inc.php');

    try {
        $connection = new PDO('mysql:host=mysql;dbname=talker_db', DOCKER[0], DOCKER[1]);
        // print "Success! Connceted to the database";
    } catch (PDOException $error) {
        print "Error!: " . $error->getMessage() . "<br/>";
        die();
    }

    // to separate the connection to database(by php) to the query and other db code 
    // .inc is a naming convention, to represent files to be included or required in other php files
    // use the constant created in the password file instead of typing out the password => safer
    // to open connection to db from php, need password from db-pswd.inc.php file
?>