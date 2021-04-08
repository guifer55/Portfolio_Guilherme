<?php
/*four steps to closing a session (logging out)
 * #1 - Find the session*/
include 'includes/session.php';
include 'includes/functions.php';
//#2 -  unset all the session variables
//is equal to empty array
$_SESSION = array();
  
  //#3 - Destroy the session cookie
  //if there is a session that exist, set it to the past
  if(isset($_COOKIE[session_name()])){
    setcookie(session_name(), '', time() - 42000, '/');
  }
 
  //#4 destroy the session
 session_destroy();
 redirect_to('login.php?logout=1');
 //we have to set that up ..login..make sure if there is a session set and the form is not submiitedd go there
?>