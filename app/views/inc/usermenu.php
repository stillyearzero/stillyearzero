<?php if (isLoggedIn()) : ?>
<div class="user-menu-container">
    <ul class="user-menu">
        <li class="nav-item">
            <a href="<?php echo URLROOT; ?>/posts/add" class="nav-link">Add Post</a>
        </li>
    </ul>
</div>
<?php endif ?>