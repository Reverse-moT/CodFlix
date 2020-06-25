<?php ob_start(); ?>


<p><?php echo ($detail[0]['title']) ?></p>


<input type="search" id="search" name="title" value="<?= $search; ?>" class="form-control" placeholder="Rechercher un film ou une série">


<?php $content = ob_get_clean(); ?>

<?php require('dashboard.php'); ?>