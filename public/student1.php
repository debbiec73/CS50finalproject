<?php
include "config.php";
?>
    <html itemscope itemtype="http://schema.org/Article">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width-device-width, initial-scale=1">

        <title>Homeschool Helps</title>
        <link href="css/bootstrap.min.css" rel="stylesheet" />
        <link href="css/jumbotron.css" rel="stylesheet">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" ></script>
    </head>
    <body>
    <script language="javascript" type="text/javascript">

    </script>
    <div id="result"></div>
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Homeschool Helps</a>
            </div>
        </div>
    </div>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
        <div class="container">
            <h1>A Place for Homeschoolers!</h1>
            <p>Here you can record all the great things your homeschooled children are doing both academically as well
                as socially</p>
            <form  action="student1.php" method="post" class="form-horizontal">
                <fieldset>

                    <!-- Form Name -->
                    <legend>Add Student</legend>

                    <!-- Text input-->
                    <div class="form-group">

                        <!-- <div class="form-control"> -->
                        <input autofocus  class="form-control" name="student" type="text" placeholder="enter student name">
                    </div>
                    <div class="form-group">
                        <button type="submit"  class="btn btn-primary">Submit</button>

                    </div>



                </fieldset>
            </form>
            <div id="studentdiv"></div>
            <div class="space"></div>
            <div id="flash"></div>
            <div id="show"></div>
            <!-- button to add student if needed -->
            <!--<p><a class="btn btn-primary btn-lg" href="addStudent.php" role="button">Add Student</a></p> -->
        </div>
    </div>
    <script src="js/bootstrap.min.js"></script>
    <script>
        $(function(){
            $.ajax({
                url     : 'getStudents.php',
                data    : {},
                type    : 'GET',
                success : function(resp){

                    $("#myDiv").html(resp);
                },
                error   : function(resp){
                    //alert(JSON.stringify(resp));  open it to alert the error if you want
                }
            });
        });

    </script>
    <div id="myDiv"></div>



    </body>
    </html><?php
/**
 * Created by PhpStorm.
 * User: debbie
 * Date: 4/28/14
 * Time: 10:41 AM
 */
//include"config.php";
//$user = $_SESSION['id'];
$connectDB=new mysqli("localhost", "root", "hunter99", "website");
if($connectDB->connect_error)
{
    die('Error:('.$connectDB->connect_errno.')'.$connectDB->connect_error);
}
/** @var $_GET TYPE_NAME */
//$student = $_POST["student"];
$user_id = $_SESSION["id"];
if($_SERVER["REQUEST_METHOD"] == "POST")
    if(empty($_POST["student"]))
    {
        apologize("oops you forgot to give a student name");
    }
else {
/** @var $_SESSION TYPE_NAME */
    $student = $_POST["student"];
$connectDB->query("INSERT INTO students(google_id, student) VALUES('$user_id', '$student')");
echo $_SESSION["id"];
}

mysqli_close($connectDB);
$connectDB=new mysqli("localhost", "root", "hunter99", "website");
if($connectDB->connect_error)
{
    die('Error:('.$connectDB->connect_errno.')'.$connectDB->connect_error);
}

//echo '<table border = 1>';
//echo '<tr>';
//  echo ' <th>Student</th>';
//echo '</tr>';
//echo $_SESSION["id"];

$user_id = $_SESSION["id"];
$result = mysqli_query($connectDB, "SELECT * FROM students WHERE google_id = ?", $_SESSION["id"]);

if (!$result) {
    die(mysql_error());
}
echo $result['student'];
$row=mysqli_fetch_array($result, MYSQLI_ASSOC);
printf("%s", $row["student"]);
{
    echo "<tr>";
    echo "<td>" . $row['student'] . "</td>";
    echo "<td> <input type='button' value='Delete' </td>td>";
    echo "</tr>";
}
mysqli_close($connectDB);
echo '</table>';