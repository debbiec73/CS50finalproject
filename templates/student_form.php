
<h1>A Place for Homeschoolers!</h1>
<p>Here you can record all the great things your homeschooled children are doing both academically as well
    as socially</p>
<p>Add a student if you need to:</p>

<form  action="../public/student.php" method="post" class="form-horizontal">
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
<p>Otherwise select one of your students below to start tracking hours.</p>
<table class="table table-striped">
    <thead>
    <tr>
        <th>Select one of your students:</th>
    </tr>
    </thead>
    <tbody>

    <?php foreach($students as $row): ?>
    <?php $strName = $row["student"]; ?>
<?php $strLink = "<a href = 'studentData.php?student=".$row['student']."'>".$strName."</a>"; ?>
    <tr>
        <td><?= $strLink ?></td>
       <!--<td> <?= $row["student"] ?> </td> -->
    </tr>

    <?php endforeach ?>

    </tbody>
</table>
