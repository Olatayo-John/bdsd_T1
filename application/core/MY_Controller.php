<?php

define('BASE_URI', str_replace('index.php', '', $_SERVER['SCRIPT_NAME']));

class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        date_default_timezone_set("Asia/Kolkata");

        // error_reporting(0);
    }
}


class Employee_Controller extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
}
