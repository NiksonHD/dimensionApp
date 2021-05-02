<h2>Login form</h2>

<?php /** @var \App\Data\ErrorDTO $error */ ?>
<?php if ($error): ?>
    <p style="color: red">
        <?= $error->getMassege(); ?>
    </p>
<?php endif; ?>
<form method="post">
    <label>
        Username:   <label/> <input type="text" name="username"/><br>


        <label>
            Password<label/>
            <input type="text" name="password"/><br>

            <label>


                <input type="submit" name="login" value="Login"/>


                </form>





