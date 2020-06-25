<?php ob_start(); ?>


<!-- EPISODES INFO -->
<?php if (isset($detailEpisode)) { ?>
    <div>
        <p><?php echo ($detailEpisode[0]['title']) ?></p>
        <p><?php echo ("Saison : " . $detailEpisode[0]['season']) ?></p>
        <p><?php echo ("Episode : " . $detailEpisode[0]['episode']) ?></p>
        <p><?php echo ($detailEpisode[0]['release_date']) ?></p>
        <p><?php echo ($detailEpisode[0]['summary']) ?></p>
    </div>
<?php } else { ?>


    <!-- MEDIA INFO -->
    <div>
        <p><?php echo ($detail[0]['title']) ?></p>
        <p><?php echo ($detail[0]['type']) ?></p>
        <p><?php echo ($detail[0]['status']) ?></p>
        <p><?php echo ($detail[0]['release_date']) ?></p>
        <p><?php echo ($detail[0]['summary']) ?></p>
    </div>


    <!-- SEASON -->
<?php }
if ($detail[0]['type'] == 'série' && !isset($detailEpisode)) { ?>

    <!-- SELECT SEASON -->
    <select name="season" onchange="location = this.value;">

        <?php
        $i = 1;

        // BEFORE SEASON SELECTED
        if ($season_id == null) {

            echo ('<option selected value="index.php?media=' . $detail[0]["id"] . '">Tout</option>');

            while ($i <= $nbSeason) {
                echo ('<option value="index.php?media=' . $detail[0]["id"] . '&season=' . $i . '">Saison ' . $i . '</option>');
                $i++;
            }

            // AFTER SEASON SELECTED
        } else {

            echo ('<option value="index.php?media=' . $detail[0]["id"] . '">Tout</option>');
            while ($i <= $nbSeason) {

                if ($season_id == $i) {
                    echo ('<option selected value="index.php?media=' . $detail[0]["id"] . '&season=' . $i . '">Saison ' . $i . '</option>');
                } else {
                    echo ('<option value="index.php?media=' . $detail[0]["id"] . '&season=' . $i . '">Saison ' . $i . '</option>');
                }
                $i++;
            }
        }
        ?>

    </select>

    <!-- EPISODES LIST -->
    <div class="media-list">
        <?php foreach ($episodes as $episode) : ?>
            <a class="item" href="index.php?media=<?= $detail[0]['id']; ?>&episode=<?= $episode['id']; ?>">
                <div class="video">
                    <div>
                        <iframe allowfullscreen="" frameborder="0" src="<?= $episode['media_url']; ?>"></iframe>
                    </div>
                </div>
                <div class="title"><?= $episode['title']; ?></div>
            </a>
        <?php endforeach; ?>
    </div>



<?php
}
$content = ob_get_clean();
require('dashboard.php');
?>