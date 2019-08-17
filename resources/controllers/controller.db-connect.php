<?php
    
    
    
    /** -------------------------------------------------- **/
    /** --- INITIALIZATION                             --- **/
    /** -------------------------------------------------- **/
    
    //Connect to the database.
    $db_connection = mysqli_connect("localhost", "test", "test", "v127008");
    if (!$db_connection)
    {
        echo mysqli_error($db_connection);
    }
    
?>