<?php require APPROOT . '/views/inc/header.php'; ?>

<section id="add-post">
    <div class="title">
        <?php flash('post_message') ?>
        <h2>Add Post</h2>
    </div>

    <form class="postForm" action="<?php echo URLROOT; ?>/posts/add" method="post" enctype="multipart/form-data">
        <div class="row2">
            <input value="<?php echo $data['title']; ?>" type="text" name="title" placeholder="Title">
            <span class="invalid-feedback"><?php echo $data['title_error']; ?></span>
        </div>

        <div class="row2">
            <input type="file" id="image" name="image">
            <span class="invalid-feedback"><?php echo $data['upload_error']; ?></span>
        </div>

        <div class="row2">
            <input value="<?php echo $data['image_alt']; ?>" type="text" name="image_alt" placeholder="Image alt text">
        </div>

        <div class="row2">
            <textarea rows="10" type="text" name="body" placeholder="Add some content.."><?php echo $data['body']; ?></textarea>
            <span class="invalid-feedback"><?php echo $data['body_error']; ?></span>
        </div>
        <div class="row2">
            <input type="submit" value="Submit" class="btn">
        </div>
    </form>
</section>

<?php require APPROOT . '/views/inc/footer.php'; ?>