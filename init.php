<?php

// Include the main Propel script
require_once '/vendor/propel/propel1/runtime/lib/Propel.php';

// Initialize Propel with the runtime configuration
Propel::init("/build/conf/todo-conf.php");

// Add the generated 'classes' directory to the include path
set_include_path("/build/classes" . PATH_SEPARATOR . get_include_path());