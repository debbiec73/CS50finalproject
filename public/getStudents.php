<?php
/**
 * Created by PhpStorm.
 * User: debbie
 * Date: 4/30/14
 * Time: 1:58 PM
 */
$_SESSION["id"] = 111188473903995160000;
include('config.php');
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



