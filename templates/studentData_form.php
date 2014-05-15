<h1>A Place for Homeschoolers!</h1>
<!-- <p>Record hours for: <?php echo $student ?></p> -->
<h2>Keep track of all the work your child is accomplishing!</h2>

<form  action="../public/studentData.php" method="post" id="Track Core Hours" class="form-horizontal">
    <fieldset>

        <p>Record hours for: <?php echo $student ?></p>
        <?php echo '<input type="hidden" name="student" value="'.$student. '" />'."\n"; ?>
        <div class="form-group">
            <label>School Year</label><br />
            <select autofocus class="form-group" name="school_year">
                <option value =""> </option>

                <?php
                foreach($years as $year)
                {
                  $student;
                    echo("<option value = '$year'>" . $year . "</option>");
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label>Core Subjects</label><br />
            <select class="form-group" name="core_subject">
                <option value =""> </option>

                <?php
                foreach($core_subjects as $core)
                {
                    echo("<option value = '$core'>" . $core . "</option>");
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label>Elective Subjects</label><br />
            <select class="form-group" name="electives_subject">
                <option value =""> </option>

                <?php
                foreach($elective_subjects as $electives)
                {
                    echo("<option value = '$electives'>" . $electives . "</option>");
                }
                ?>
            </select>
        </div>

        <!-- Form Name -->


        <!-- Text input-->
        <div class="form-group">
            <label>Description:</label>
            <textarea autofocus class="form-control" name="description" rows="10" cols="50"></textarea>
        </div>

        <div class="form-group">
            <!-- <div class="form-control"> -->
            <label>How many minutes:</label>
            <input autofocus class="form-control" name="minutes" type="text" placeholder="enter minutes"/>
        </div>
        <div class="form-group">
            <label>Date:</label>
            <input autofocus class="form-control" name="date" type="date" />
        </div>
        <div class="form-group">
            <button type="submit"  class="btn btn-primary">Submit</button>

        </div>
    </fieldset>
</form>
