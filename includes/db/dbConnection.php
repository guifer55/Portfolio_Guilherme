<?php
    $server = 'localhost';
    $username = 'dev';
    $password = 'Dev1234$';
    $dbName = 'guilherme_portfolio';

    # variable to hold the link
    $dbLink = new mysqli($server, $username, $password, $dbName);

    #check if there is connection
    if($dbLink->connect_errno){
        printf("Unable to connect to database: %s", $dbLink->connect_error);
        #then kill it
        exit();
    }

    #make sure 
    if(!$dbLink){
        die("Connection failed: ".$dbLink->error());
    }

    

    
?>