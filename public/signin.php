<?php
/**
 * Created by PhpStorm.
 * User: debbie
 * Date: 4/27/14
 * Time: 11:31 PM
 */
require("../includes/config.php");

//$mysqli = new mysqli('localhost', 'root', 'hunter99', 'website');
// check connection

//if($mysqli->connect_error)
//{
    //die('Error:('.$mysqli->connect_errno.')'.$mysqli->connect_error);
    //echo "failed to connect to MySQL: " . mysqli_connect_error();
//}

$user_id = $_POST['userId'];
$name = $_POST['name'];
$email = $_POST['email'];

$rows = query("SELECT * FROM google_users WHERE google_id=$user_id");

if(count($rows) == 1)
{
    $row = $rows[0];
    $_SESSION["id"] = $row["id"];
    echo 'Welcome back '.$name.'!'.$user_id;
}
//$sql = "SELECT * FROM google_users WHERE google_id = $$user_id";
//$rows = $mysqli->query($sql);
//$user_exist = $mysqli->query("SELECT * FROM google_users WHERE google_id=$user_id");
//if($user_exist)
//{
//if(count($rows) == 1)
  //{
    //$row = $rows[0];

    //if($name == $row["google_name"])
    //{
        //$_SESSION["id"] = $row["id"];
        //echo $_SESSION['id'];

    //$_SESSION->id = $user_exist->id;
    //echo '<script type="text/javascript">';
    //echo 'alert("Welcome back!")';
    //echo '</script>';

    //echo 'Welcome back '.$name.'!'.$user_id;

    //header("Location: student1.php");
//}

else{
    //user is new
    echo 'Hi '.$name.', Thanks for Registering!';

    $result = query("INSERT INTO google_users(google_id, google_name, google_email)
    VALUES($user_id, '$name', '$email')");
    $rows = query("SELECT LAST_INSERT_ID() AS id");
    //$rows = $mysqli->query($sql);
    $id = $rows[0]["id"];
    $_SESSION["id"] = $rows[0]["id"];

}
//$rows = $mysqli->query("SELECT * FROM google_users WHERE google_name = ?", $name);

//if(count($rows) == 1)
//{
    //$row = $rows[0];
    //$_SESSION->id = $row->id;
    //echo $row->id;
//}

//$_SESSION["id"] = $user_id;


//mysqli_close($mysqli);
