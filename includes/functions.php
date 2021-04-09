<?php
    function redirect_to($location = NULL){
        //we are setting a location as null by default
        //if the locaton is set, send the user to that location
        if($location != NULL){
            header("Location: $location");
            exit;
        }
    }
?>