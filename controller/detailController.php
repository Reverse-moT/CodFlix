<?php

require_once( 'model/media.php' );

/***************************
* ----- LOAD HOME PAGE -----
***************************/

function mediaDetailPage() {

  $idMedia = isset( $_GET['media'] ) ? $_GET['media'] : null;
  $detail = Media::detailMedias( $idMedia );
  

  require('view/mediaDetailView.php');

}
