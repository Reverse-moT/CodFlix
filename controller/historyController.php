<?php

require_once('model/user.php');

function history()
{
    $user     = new stdClass();
    $user->id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : false;
    $supp_id = isset($_GET['supp']) ? $_GET['supp'] : null;

    if ($supp_id !== null) {
        var_dump(User::deleteMediaFromHistory($supp_id));
    }

    $history = User::getHistory($user->id);

    require('view/historyView.php');
}
