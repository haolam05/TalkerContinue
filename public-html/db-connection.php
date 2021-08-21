<?php
    require 'db-conn.inc.php';  // -> $connection variable is available from required file

    echo '<table border="1">';
        echo '<tr>';
            echo '<th>id</th>';
            echo '<th>title</th>';
            echo '<th>length</th>';
            echo '<th>genre</th>';
            echo '<th>actor</th>';
        echo '</tr>';
    foreach($connection->query('SELECT * FROM movies') AS $record) {
        echo '<tr>';
            echo '<td>' . $record['id'] . '</td>';
            echo '<td>' . $record['title'] . '</td>';
            echo '<td>' . $record['length'] . '</td>';
            echo '<td>' . $record['genre'] . '</td>';
            echo '<td>' . $record['actor'] . '</td>';
        echo '</tr>';
    } 
    echo '</table>';
?>

<!-- 
    connection to db from php should be separated so that we can use mysql code to query in many files by using require statement of php
    on the other hand, password is separated from connection file for security reason whne our project is being pushed online to github
    furthermore, if we need to change the password, we only need to change it in one placed, since there is only one connection
-->