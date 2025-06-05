<?php $pageName = 'login';
require APPROOT . '/views/inc/header.php'; ?>

<section id="login">
    <div class="title">
        <?php flash('login_success') ?>
        <h2>Login</h2>
        <!-- <p>You know what to do</p> -->
    </div>
    <form class="userForm" action="<?php echo URLROOT; ?>/users/login" method="post">
        <div class="row">
            <input value="<?php echo $data['email']; ?>" type="text" name="email" placeholder="Email Address">
            <span class="invalid-feedback"><?php echo $data['email_error']; ?></span>
        </div>
        <div class="row">
            <input value="<?php echo $data['password']; ?>" type="password" name="password" placeholder="Password">
            <span class="invalid-feedback"><?php echo $data['password_error']; ?></span>
        </div>
        <div class="row2">
            <input type="submit" value="Login" class="btn">
        </div>
    </form>
</section>

<?php require APPROOT . '/views/inc/footer.php'; ?>