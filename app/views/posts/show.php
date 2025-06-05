<?php require APPROOT . '/views/inc/header.php'; ?>

<section id="show">

    <?php if ($data['post']->image_url) : ?>
        <div class="blogpost-img">
            <img src="<?php echo URLROOT . "/public/uploads/" . $data['post']->image_url; ?>" alt="<?php echo $data['post']->image_alt ? $data['post']->image_alt : "I haz a bucket" ?>">
        </div>
    <?php endif ?>

    <div class="blogpost">
        <div class="title blog-title">
            <h2><?php echo $data['post']->title; ?></h2>
        </div>

        <div class="written-by">
            Written by <?php echo $data['user']->name; ?>
        </div>
        <p><?php echo nl2br($data['post']->body); ?></p>
        <hr>
        <div class="written-by">
            <?php echo getFormattedDate($data['post']->created_at); ?>
        </div>
    </div>

    <?php if (isset($_SESSION['user_id']) && $data['user']->id == $_SESSION['user_id']) : ?>
        <hr>
        <div class="button-group">
            <a href="<?php echo URLROOT ?>/posts/edit/<?php echo $data['post']->id; ?>" class="btn btn-dark">Edit</a>

            <form class="float-end" action="<?php echo URLROOT; ?>/posts/delete/<?php echo $data['post']->id; ?>" method="post">
                <input type="submit" value="Delete" class="btn btn-danger">
            </form>
        </div>
    <?php endif ?>
</section>
<?php require APPROOT . '/views/inc/footer.php'; ?>