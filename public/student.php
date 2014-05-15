<?php
/**
 * Created by PhpStorm.
 * User: debbie
 * Date: 5/1/14
 * Time: 1:03 AM
 */
require("../includes/config.php");

if($_SERVER["REQUEST_METHOD"] == "POST")
    if(empty($_POST["student"]))
    {
        apologize("oops you forgot to give a student name");
    }
    else {
        /** @var $_SESSION TYPE_NAME */
        $student = $_POST["student"];

        $result = query("INSERT INTO students(id, student) VALUES(?, ?)", $_SESSION["id"], $_POST["student"]);
        echo $_SESSION["id"];
    }

$students = query("SELECT * FROM students WHERE id = ?", $_SESSION["id"]);

render("student_form.php", ["title" => "Students", "students" => $students]);

