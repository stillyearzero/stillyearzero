<?php $pageName = 'edit-user';
require APPROOT . '/views/inc/header.php'; ?>

<section id="edit-user">
    <div class="title">
        <h2>Update Userdata</h2>
    </div>
    <form class="userForm" action="<?php echo URLROOT; ?>/users/edit" method="post">
        <div class="row">
            <input value="<?php echo $data['password']; ?>" type="password" name="password" placeholder="Password">
            <span class="invalid-feedback"><?php echo $data['password_error']; ?></span>
        </div>
        <div class="row">
            <input value="<?php echo $data['confirm_password']; ?>" type="password" name="confirm_password" placeholder="Confirm Password">
            <span class="invalid-feedback"><?php echo $data['confirm_password_error']; ?></span>
        </div>
        <div class="row2">
            <input type="submit" value="Save" class="btn">
        </div>
    </form>
</section>

<?php require APPROOT . '/views/inc/footer.php'; ?>