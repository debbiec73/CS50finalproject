<h1>A Place for Homeschoolers!</h1>
<!-- <p>Record hours for: <?php echo $student ?></p> -->
<h2>Here you can view the hours you have logged for your student.</h2>
<h3>Select the student and the school year to view the recorded hours.</h3>

<form  action="../public/viewHours.php" method="post" id="View Hours" class="form-horizontal">
    <fieldset>

        <div class="form-group">
            <label>Student:</label><br />
            <select class="form-group" name="student">
                <!-- <option value =""> </option> -->

                <?php
                foreach($students as $student)
                {

                    echo("<option value = '$student'>" . $student . "</option>");
                }
                ?>

            </select>
        </div>
        <div class="form-group">
            <label>School Year:</label><br />
            <select class="form-group" name="school_year">
                <!-- <option value =""> </option> -->

                <?php
                foreach($years as $year)
                {

                    echo("<option value = '$year'>" . $year . "</option>");
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <button type="submit"  class="btn btn-primary">Submit</button>

        </div>
        </fieldset>
    </form>

