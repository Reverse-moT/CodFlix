<?php ob_start(); ?>

<h1>Mon profil</h1>

<h1 style='text-align : center'>Mail : <?php echo ($profilData['email']);; ?></h1>

<form id="mail" method="post" action="index.php?action=profile">
    <p><label for="email">Mail : </label><input type="text" id="mail" name="mail" /></p>
    <div><input type="submit" name="envoi" value="Changer de mail" /></div>
</form><br><br>

<form id="password" method="post" action="index.php?action=profile">
    <p><label for="password">Mot de passe :</label><input type="text" id="password" name="password" /></p>
    <p><label for="old_password">Ancien mot de passe :</label><input type="text" id="old_password" name="old_password" /></p>
    <div><input type="submit" name="envoi" value="Changer de mot de passe" /></div>
</form><br><br>

<form id="delete" method="post" action="index.php?action=profile">
    <p><label for="old_password">Ancien mot de passe :</label><input type="text" id="old_password" name="old_password" /></p>
    <input type="hidden" id="supp" name="supp" value="<?php echo ($profileData['id']); ?>">
    <div><input type="submit" name="envoi" value="Supprimer le compte utilisateur" /></div>
</form>

<?php

if ($message !== null) {
    echo ("<p>$message</p>");
}

$content = ob_get_clean();
require('dashboard.php');
?>