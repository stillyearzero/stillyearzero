<?php $pageName = 'home';
require APPROOT . '/views/inc/header.php'; ?>

<div class="banner">
    <div class="title">
        <h1><?php echo $data['title']; ?></h1>
        <p>
            <?php echo $data['description']; ?>
        </p>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>