<?php

require_once( 'model/media.php' );
require_once( 'model/user.php' );

function detail() {

    $id = isset( $_GET['media'] ) ? $_GET['media'] : null;
    $season_id = isset( $_GET['season'] ) ? $_GET['season'] : null;
    $episode_id = isset( $_GET['episode'] ) ? $_GET['episode'] : null;
    $user_id = isset( $_SESSION['user_id'] ) ? $_SESSION['user_id'] : false;

    $detail = Media::detailMedias($id);
    User::addHistory($id,$user_id);

    // Episode selected
    if($episode_id !== null){
        $detailEpisode = Media::detailEpisode($episode_id);
    }

    // Serie selected
    if($detail[0]['type'] == 'série'){
        $episodes = Media::getEpisodes($id, $season_id);
        $tabSeason = Media::getNbSeason($id);
        $nbSeason = $tabSeason[0][0];
    }

    require('view/detailView.php');

}