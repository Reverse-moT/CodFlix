<?php ob_start(); ?>

<div class="media-list">
    <?php foreach ($history as $media) : ?>
        <a class="item" href="index.php?media=<?= $media['media_id'] ?>">
            <div class="video">
                <div>
                    <iframe allowfullscreen="" frameborder="0" src="<?= $media['trailer_url']; ?>">
                    </iframe>
                </div>
            </div>
            <div class="title"><?= $media['title']; ?></div>

            <a href="index.php?action=history&supp=<?= $media[0]; ?>">Supprimer</a>
        </a> <?php endforeach; ?>
</div>
<a href="index.php?action=history&supp=0">Supprimer mon historique</a>

<?php
$content = ob_get_clean();
require('dashboard.php');
?>