<h1>Homeschool Helps, here to help you!</h1>
<p>Here you can see what subjects are available.</p>

<table class="table table-striped">
    <thead>
    <tr>
        <th>Core Subjects</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($core as $row): ?>
    <tr>
        <td><?= $row["core_subject"] ?></td>
    </tr>
    <?php endforeach ?>
    </tbody>
</table>
<table class="table table-striped">
    <thead>
    <tr>
        <th>Elective Subjects</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($electives as $row): ?>
        <tr>
            <td><?= $row["electives_subjects"] ?></td>
        </tr>
    <?php endforeach ?>
    </tbody>
</table>
<h3>You can customize your tracking by adding subjects that you need for your students.</h3>
<form  action="../public/editSubjects.php" method="post" class="form-horizontal">
    <fieldset>

        <!-- Form Name -->
        <legend>Add Subject</legend>

        <!-- Text input-->
        <div class="form-group">

            <!-- <div class="form-control"> -->
            <input autofocus  class="form-control" name="subject" type="text" placeholder="enter subject name">
        </div>
        <div class="form-group">

            <select class="form-group" name="type">
            <option value="">select type of subject</option>
            <option value="1">Core</option>
            <option value="2">Elective</option>

            </select>
            </div>
            <div class="form-group">
            <button type="submit"  class="btn btn-primary">Submit</button>

        </div>
    </fieldset>
</form>