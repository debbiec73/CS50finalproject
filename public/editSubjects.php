<?php
/**
 * Created by PhpStorm.
 * User: debbie
 * Date: 5/2/14
 * Time: 12:33 AM
 */
require("../includes/config.php");

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(empty($_POST["subject"]))
    {
        apologize("Please enter a subject to add.");
    }
    if(empty($_POST["type"]))
    {
        apologize("Please enter a subject type.");
    }
    if($_POST["type"] == 1)
    {
        query("INSERT INTO core (core_subject) VALUE(?)", $_POST["subject"]);
    }
    else
    {
        query("INSERT INTO electives (electives_subjects) VALUE(?)", $_POST["subject"]);
    }
}


$core = query("SELECT core_subject FROM core");

$electives = query("SELECT electives_subjects FROM electives");

render("editSubjects_form.php", ["title" => "Add Subjects", "core" => $core, "electives" => $electives]);
