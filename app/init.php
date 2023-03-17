<?php
include "app/constants.php";

include "app/config.php";
    
include "app/includes/views/header.php";
include "app/constants.php";
spl_autoload_register(function ($class) {
    require "app/includes/classes/" . $class . ".php";
});
include "app/includes/functions/functions.php";
?>