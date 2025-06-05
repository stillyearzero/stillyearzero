<?php $pageName = 'posts';
require APPROOT . '/views/inc/header.php'; ?>

<section class="banner">
    <div class="heading">
        <h1>Still Year Zero</h1>
        <h2>A blog about life in northern Sweden</h2>

        <?php if (isLoggedIn()) : ?>
        <a href="<?php echo URLROOT; ?>/posts/add" class="btn">Add Post</a>
        <?php endif ?>
    </div>
</section>

<section class="index-posts">
    <?php flash('post_message'); ?>
    <?php foreach ($data['posts'] as $post) : ?>
    <div class="blogpost">
        <a class="no-link-style" href="<?php echo URLROOT; ?>/posts/show/<?php echo $post->postId; ?>">
            <div class="title blog-title">
                <h2><?php echo $post->title; ?></h2>
            </div>
            <span class="written-by">
                Written by <?php echo $post->name; ?> <?php echo getFormattedDate($post->postCreated); ?>
            </span>
            <p><?php echo getFormattedShortText($post->body); ?></p>
        </a>
    </div>
    <?php endforeach; ?>
</section>

<?php require APPROOT . '/views/inc/footer.php'; ?>