
<!-- A wrapper for all the blog posts -->
<div class="posts">

    <!-- <h2 class="content-subhead">Titre</h2>

    <!-- A single blog post -->
    <!-- <section class="post">
        <header class="post-header">
            <p class="post-meta">
                Par <a href="#" class="post-author">Dario</a> (dario@oclock.io)
            </p>
        </header>

        <div class="post-description">
            <p>
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vero aspernatur maxime accusamus ratione consequatur magnam iure nostrum nihil totam consectetur fugit cupiditate illum, expedita necessitatibus harum eligendi cumque, possimus quibusdam veniam illo a? Minus adipisci at amet rerum minima cum maxime labore, numquam necessitatibus fugit, tempore perspiciatis ullam nam aliquam dolorem illum vero perferendis. Pariatur voluptas eos mollitia iusto reprehenderit!
            </p>
        </div>
    </section> --> 

    <?php foreach ($kiemtaos as $currentKiemtos): ?>
        <h2 class="content-subhead"><?= $currentKiemtos['title']; ?></h2>

        <!-- A single blog post --> 
        <section class="post">
            <header class="post-header">
                <p class="post-meta">
                    Par <a href="#" class="post-author"><?= $currentKiemtos['username']; ?></a> (<?= $currentKiemtos['email']; ?>)
                </p>
            </header>

            <div class="post-description">
                <p>
                <?= $currentKiemtos['message']; ?>
                </p>
            </div>
        </section>
    <?php endforeach; ?>
</div>