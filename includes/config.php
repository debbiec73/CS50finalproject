<?php
/**
 * Created by PhpStorm.
 * User: debbie
 * Date: 4/28/14
 * Time: 10:59 AM
 */
ini_set("display_errors", true);
error_reporting(E_ALL);

// requirements
require("constants.php");
require("functions.php");

// enable sessions
session_start();

// require authentication for most pages
if (!preg_match("{(?:signin|index)\.php$}", $_SERVER["PHP_SELF"]))
{
    if (empty($_SESSION["id"]))
    {
        redirect("index.php");
    }
else{

    /** @var $_SESSION TYPE_NAME */
    $result= query("SELECT google_name FROM google_users WHERE id=?", $_SESSION["id"]);
    //$name= implode(",", $result);
   foreach($result as $row) {

    echo "Welcome back: " . $row["google_name"];
    }

}
}
//var logout = function(){
    //document.location.href = "https://www.google.com/accounts/Logout?continue=https://appengine.google.com/_ah/logout?continue=http://www.mysite.com";
//}