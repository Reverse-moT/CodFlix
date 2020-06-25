<?php ob_start(); ?>

<div>
    <a href='mailto:contact@codflix.com'>
        <P>Contactez-nous!</P>
    </a>
</div>

<?php
$content = ob_get_clean();
require('dashboard.php');
?>