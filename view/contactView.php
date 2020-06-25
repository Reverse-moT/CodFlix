<?php ob_start(); ?>

<div>

    <h2> Contactez - nous</h2>

    <a href='mailto:contact@codflix.com'>
        <P>Envoyer un mail</P>
    </a>

</div>

<?php
$content = ob_get_clean();
require('dashboard.php');
?>