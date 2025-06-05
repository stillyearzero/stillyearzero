<?php $pageName = 'about';
require APPROOT . '/views/inc/header.php'; ?>

<section id="about">
    <img src="<?php echo URLROOT . "/public/media/about.JPG" ?>" alt="Tattoed chest">
    <div class="title">
        <h2>About me</h2>
    </div>
    <div class="about-text">
        <p> I'm an average dude from northern Sweden who likes to hunt, build things and lift stuff. Since I spend my
            workdays building and maintaining complex systems with a few million users I thought it would be fun to
            build something simple and less complex in my spare time. The result is this blog. Since it actually works
            now I might as well entertain myself by writing something</p>
            <br>
            <p>That said, I intend to approach writing as an opportunity to explore myself, the world around me and life in
            general for as long as I enjoy it.</p>
    </div>
</section>

<?php require APPROOT . '/views/inc/footer.php'; ?>