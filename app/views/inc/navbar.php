<nav class="navbar">
    <div class="logo-container">
        <a href="<?php echo URLROOT; ?>" class="logo">Still Year Zero</a>
    </div>

    <ul class="nav-menu">
        <li class="nav-item">
            <a href="<?php echo URLROOT; ?>/posts" class="nav-link">Blog</a>
        </li>

        <li class="nav-item">
            <a href="<?php echo URLROOT; ?>/pages/about" class="nav-link">About</a>
        </li>

        <?php if (isLoggedIn()) : ?>
            <li class="nav-item">
                <a href="<?php echo URLROOT; ?>/users/edit" class="nav-link">User Settings</a>
            </li>

            <li class="nav-item">
                <a href="<?php echo URLROOT; ?>/users/logout" class="nav-link">Log Out</a>
            </li>
        <?php endif ?>

        <?php if (!isLoggedIn()) : ?>
            <li class="nav-item">
                <a href="<?php echo URLROOT; ?>/users/login" class="nav-link">Login</a>
            </li>
        <?php endif ?>

    </ul>
    <div class="hamburger">
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
    </div>
</nav>