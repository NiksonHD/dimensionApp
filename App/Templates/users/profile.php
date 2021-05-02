<?php
/** @var App\Data\UserDTO $data */
?>
<h2>Edit form</h2>
<form method="post">
    <label>
        Username: <input type="text" name="user_name" value="<?= $data->getUsername();?>"/><br>
        <label/>
        <label>

            Password: <input type="text" name="password"/><br>
            <label/>
            <label>

               Confirm Password: <input type="text" name="confirm_password"/><br>
                <label/>
                <label>

                    First name:  <input type="text" name="first_name" value="<?= $data->getFirstName();?>"/><br>
                    <label/>

                    <label>

                        Last name:  <input type="text" name="last_name" value="<?= $data->getLastName();?>"/><br>
                        <label/>

                        <label>

                            Birthday: <input type="date" name="born_on" value="<?= $data->getBornOn();?>"/><br>
                            <label/>

                            <label>

                                <input type="submit" name="edit" value="edit"/>
                                <label/>


                                </form>

<br>

You can <a href="logout.php">logout</a> or see <a href="all.php">all users</a>





