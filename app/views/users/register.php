<?php $pageName = 'register';
require APPROOT . '/views/inc/header.php'; ?>

<section>
    <div class="title">
        <?php flash('register_success') ?>
        <h2>Create an account</h2>
        <p>Fill out the form to register</p>
    </div>
    <form class="userForm" action="<?php echo URLROOT; ?>/users/register" method="post">
        <div class="row">
            <input value="<?php echo $data['name']; ?>" type="text" name="name" placeholder="Name">
        </div>
        <div class="row">
            <input value="<?php echo $data['email']; ?>" type="email" name="email" placeholder="Email">
        </div>
        <div class="row">
            <input value="<?php echo $data['password']; ?>" type="password" name="password" placeholder="Password">
        </div>
        <div class="row">
            <input value="<?php echo $data['confirm_password']; ?>" type="password" name="confirm_password" placeholder="Confirm Password">
        </div>
        <div class="row2">
            <input type="submit" value="Register" class="btn">
        </div>
        <div class="row2">
            <a href="<?php echo URLROOT; ?>/users/login">Have an account? Login</a>
        </div>
    </form>
</section>

<?php require APPROOT . '/views/inc/footer.php'; ?>