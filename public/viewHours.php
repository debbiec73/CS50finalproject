<?php
/**
 * Created by PhpStorm.
 * User: debbie
 * Date: 5/3/14
 * Time: 12:04 AM
 */
require("../includes/config.php");

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(empty($_POST["student"]))
    {
        apologize("Please select a Student.");
    }

//$core = query("SELECT * FROM core_hours WHERE id = ? and student = ? and school_year = ?", $_SESSION["id"],
    //$_POST["student"], $_POST["school_year"]);
    $core = query("SELECT student, school_year, subject, SUM(minutes) AS minutes FROM core_hours WHERE id = ? and student = ? and school_year = ? GROUP BY subject",
        $_SESSION["id"], $_POST["student"], $_POST["school_year"]);
    $totalmins = [];
    foreach($core as $row)
    {
        $totalmin = $row["minutes"];
        $totalmins[] = $totalmin;
    }
    $totalmins = array_sum($totalmins);
//$corehours = floor($core["minutes"] / 60);
//$coreminutes = ($core["minutes"] % 60);
//$electives = query("SELECT * FROM elective_hours WHERE id = ? and student = ? and school_year = ?", $_SESSION["id"],
    //$_POST["student"], $_POST["school_year"]);
    $electives = query("SELECT student, school_year, subject, SUM(minutes) AS minutes FROM elective_hours WHERE id = ? and student = ? and school_year = ? GROUP BY subject",
        $_SESSION["id"], $_POST["student"], $_POST["school_year"]);

    $totalemins = [];
    foreach($electives as $row)
    {
        $totalemin = $row["minutes"];
        $totalemins[] = $totalemin;
    }
    $totalemins = array_sum($totalemins);
//$electiveshours = floor($electives["minutes"] / 60);
//$electivesminutes = ($electives["minutes"] % 60);
$student = $_POST["student"];
    $year = $_POST["school_year"];
render("viewHoursData_form.php", ["student" => $student, "year" => $year, "core" => $core,
    "electives" => $electives, "totalmins" => $totalmins, "totalemins" => $totalemins]); //"corehours" => $corehours, "coreminutes" => $coreminutes, "electivesminutes" =>
        //$electivesminutes, "elecviveshours" => $electiveshours]);
    //render("viewHoursData_form.php", ["student" => $student, "year" => $year, "core" => $core,
        //"electives" => $electives, "totalemins" => $totalemins]);
}
else
{
$rows = query("SELECT student FROM students WHERE id = ?", $_SESSION["id"]);
$students = [];
foreach($rows as $row)
{
    $student = $row["student"];
    $students[] = $student;
}
$results = query("SELECT * FROM school_year");
$years = [];
foreach($results as $row)
{
    $year = $row["school_year"];
    $years[] = $year;
}//$students = query("SELECT student FROM students WHERE id = ?", $_SESSION["id"]);

render("viewHours_form.php", ["title" => "View Hours", "students" => $students, "years" => $years]);
}