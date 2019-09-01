<?php
    
    
    
    /** -------------------------------------------------- **/
    /** --- INITIALIZATION                             --- **/
    /** -------------------------------------------------- **/
    
    //Check if post comment form is submitted.
    if (isset($_POST["post-comment"]))
    {
        postComment($db_connection);
    }
    
    
    
    /** -------------------------------------------------- **/
    /** --- FUNCTIONS                                  --- **/
    /** -------------------------------------------------- **/
    
    function postComment($db_connection)
    {
        $mapid = $_POST["mapid"];
        $cuname = getLoggedInUsername();
        $ctext = $_POST["ctext"];
        
        $sql_postComment = "INSERT INTO mapcomments(mapid, cuname, ctext) VALUES ('" . $mapid . "', '". $cuname . "', '" . $ctext . "')";
        $result_postComment = mysqli_query($db_connection, $sql_postComment);
    }
    
?>