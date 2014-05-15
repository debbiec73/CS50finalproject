<h1>A Place for Homeschoolers!</h1>
<!-- <p>Record hours for: <?php echo $student ?></p> -->
<legend>Here are all the hours you have logged for this student, including the total core hours and the total elective hours.</legend>
<h3>Core Hours</h3>
<div>
<table class="table table-striped">
    <thead>
    <tr>
        <th>Student</th>
        <th>Year</th>
        <th>Subject</th>
        <th>Minutes</th>
        <th>Hours</th>

    </tr>
    </thead>

    <tbody>
    <?php foreach($core as $row): ?>

        <tr>
            <td><?= $row["student"] ?></td>
            <td><?php echo $row["school_year"] ?></td>
            <td><?php echo $row["subject"] ?></td>

            <td><?php echo $row["minutes"] ?></td>
         <?php $corehours = floor($row["minutes"] / 60);
            $coreminutes = ($row["minutes"] % 60); ?>

            <td><?= $corehours. " hours, ". $coreminutes. " minutes" ?></td>

        </tr>
    <?php endforeach ?>
    <tr>
        <td colspan = "3">Total</td>
        <td><?php echo $totalmins ?></td>
        <!--<td colspan = "2"></td> -->
        <td><?php echo $totalhours = floor($totalmins/ 60)." hours ". $totalmin = ($totalmins % 60)." minutes " ?></td>
    </tr>

    </tbody>
</table>
</div>
<div>
    <h3>Electives Hours</h3>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>Student</th>
            <th>Year</th>
            <th>Subject</th>
            <th>Minutes</th>
            <th>Hours</th>

        </tr>
        </thead>
        <tbody>
        <?php foreach($electives as $row): ?>

        <tr>
            <td><?= $row["student"] ?></td>
            <td><?= $row["school_year"] ?></td>
            <td><?= $row["subject"] ?></td>

            <td><?= $row["minutes"] ?></td>
            <?php $electiveshours = floor($row["minutes"] / 60);
            $electivesminutes = ($row["minutes"] % 60); ?>
            <td><?= $electiveshours. " hours, ". $electivesminutes. " minutes" ?></td>

        </tr>

    <?php endforeach ?>
        <tr>
            <td colspan = "3">Total</td>
            <td><?php echo $totalemins ?></td>
            <!--<td colspan = "2"></td> -->
            <td><?php echo $totalehours = floor($totalemins/ 60)." hours ". $totalemin = ($totalemins % 60)." minutes " ?></td>
        </tr>
    </tbody>
</table>
    </div>