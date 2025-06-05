<?php require APPROOT . '/views/inc/header.php'; ?>

<section id="edit">
    <div class="title">
        <?php flash('post_message') ?>
        <h2>Edit Post</h2>
    </div>
    <form class="postForm" action="<?php echo URLROOT; ?>/posts/edit/<?php echo $data['id']; ?>" method="post">
        <div class="row2">
            <input value="<?php echo $data['title']; ?>" type="text" name="title" placeholder="Title">
        </div>

        <div class="row2">
            <textarea rows="8" type="text" name="body" placeholder="Add some content.."><?php echo $data['body']; ?></textarea>
        </div>
        <div class="row2">
            <input type="submit" value="Submit" class="btn">
        </div>
    </form>
</section>

<?php require APPROOT . '/views/inc/footer.php'; ?>