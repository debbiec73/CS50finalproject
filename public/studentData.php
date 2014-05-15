<?php
/**
 * Created by PhpStorm.
 * User: debbie
 * Date: 5/1/14
 * Time: 12:16 PM
 */
require("../includes/config.php");
//$student = "";
if($_SERVER["REQUEST_METHOD"] == "GET")
{
    $student = htmlspecialchars($_GET["student"]);
}

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(empty($_POST["student"]))
    {
        apologize("No Student is selected.");
    }
    if($_POST["school_year"] == "")
    {
        apologize("Please select a school year.");
    }
    if(($_POST["core_subject"] !== "") && ($_POST["electives_subject"] !== ""))
    {
        apologize("Please only select one subject either from core or electives.");
    }
    if(($_POST["core_subject"] == "") && ($_POST["electives_subject"] == ""))
    {
        apologize("Please select either a core subject or an electives subject to record minutes for.");
    }
    //if(empty($_POST["electives_subject"]))
    //{
        //apologize("Please select an electives subject to record minutes for.");
    //}
    if(empty($_POST["description"]))
    {
        apologize("Please enter a description for the minutes you are recording.  Example: Read 20 pages from Tarzan.");
    }
    if(empty($_POST["minutes"]))
    {
        apologize("Please enter the number of minutes you want to record.");
    }
    if(empty($_POST["date"]))
    {
        apologize("Please enter the date for these minutes.");
    }
    if(($_POST["core_subject"] !== "")) //&& ($_POST["electives_subject"] == ""))
    {
query("INSERT into core_hours (id, student, school_year, subject, description, minutes, date) VALUES(?, ?, ?, ?, ?, ?, ?)",
    $_SESSION["id"], $_POST["student"], $_POST["school_year"], $_POST["core_subject"], $_POST["description"], $_POST["minutes"], $_POST["date"]);
    }
    //if(isset($_POST["electives_subject"]) && (empty($_POST{"core_subject"})))
    else
    {
query("INSERT into elective_hours (id, student, school_year, subject, description, minutes, date) VALUES(?, ?, ?, ?, ?, ?, ?)",
    $_SESSION["id"], $_POST["student"], $_POST["school_year"], $_POST["electives_subject"], $_POST["description"], $_POST["minutes"],
    $_POST["date"]);
    }
    redirect("student.php");
    //render("studentData_form.php", ["title" => "Track Hours", "student" => $student, "years" => $years, "core_subjects" => $core_subjects, "elective_subjects" => $elective_subjects]);
}


else
{

//$student = $_GET["student"];
//echo '<input type="hidden" value="' . htmlspecialchars($student) . '" />'."\n";
//if(isset($_GET["student"]))
//{

    /** @var $_GET TYPE_NAME */
    //$strSQL = query("SELECT student FROM students WHERE student= ?", $_GET["student"]);
//$student = $strSQL["student"];
//}
    $rows = query("SELECT * FROM school_year");
    $years = [];
    foreach($rows as $row)
    {
        $year = $row["school_year"];
        $years[] = $year;
    }
    $result = query("SELECT * FROM core");
    $core_subjects = [];
    foreach($result as $row)
    {
        $core_subject = $row["core_subject"];
        $core_subjects[] = $core_subject;
    }
    $results = query("SELECT * FROM electives");
   $elective_subjects = [];
    foreach($results as $row)
    {
        $elective_subject = $row["electives_subjects"];
        $elective_subjects[] = $elective_subject;
    }

render("studentData_form.php", ["title" => "Track Hours", "student" => $student, "years" => $years, "core_subjects" => $core_subjects, "elective_subjects" => $elective_subjects]);
}