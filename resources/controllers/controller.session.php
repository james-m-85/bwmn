<?php
    
    
    
    /** -------------------------------------------------- **/
    /** --- INITIALIZATION                             --- **/
    /** -------------------------------------------------- **/
    
    //Start the session.
    session_start();
    
    //Check if login form is submitted.
    if (isset($_POST["login"]))
    {
        login($db_connection);
    }
    
    //Check if logout form is submitted.
    if (isset($_POST["logout"]))
    {
        logout();
    }
    
    
    
    /** -------------------------------------------------- **/
    /** --- FUNCTIONS                                  --- **/
    /** -------------------------------------------------- **/
    
    function isUserLoggedIn()
    {
        if (isset($_SESSION["login_user"]))
        {
            return true;
        }
        return false;
    }
    
    function getLoggedInUsername()
    {
        return $_SESSION["login_user"];
    }
    
    function login($db_connection)
    {
        //Get the username and password.
        $username = $_POST["username"];
        $password = $_POST["password"];
        
        //Check if the username and password are not null/empty.
        if (!empty($username) && !empty($password))
        {
            //Protect against MySQL injections.
            $username = stripslashes($username);
            $password = stripslashes($password);
            $username = mysqli_real_escape_string($db_connection, $username);
            $password = mysqli_real_escape_string($db_connection, $password);
            
            //Run the user login query.
            $sql_userLogin = "SELECT * FROM mapuser WHERE username='" . $username . "' AND passw='" . md5($password) . "'";
            $result_userLogin = mysqli_query($db_connection, $sql_userLogin);
            
            $rows = mysqli_num_rows($result_userLogin);
            if ($rows == 1)
            {
                while ($row = mysqli_fetch_assoc($result_userLogin))
                {
                    //Get the username from the database with the correct character case.
                    $usernameFromDB = $row["username"];
                    
                    //Initialize the session.
                    $_SESSION["login_user"] = $usernameFromDB;
                }
            }
        }
    }
    
    function logout()
    {
        //Destroy all data for the session.
        if (session_destroy())
        {
            //Redirect to the home page.
            header("Location: index.php");
        }
    }
    
?>