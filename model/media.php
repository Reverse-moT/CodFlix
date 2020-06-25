<?php

require_once( 'database.php' );

class Media {

  protected $id;
  protected $genre_id;
  protected $title;
  protected $type;
  protected $status;
  protected $release_date;
  protected $summary;
  protected $trailer_url;

  public function __construct( $media ) {

    $this->setId( isset( $media->id ) ? $media->id : null );
    $this->setGenreId( $media->genre_id );
    $this->setTitle( $media->title );
  }

  /***************************
  * -------- SETTERS ---------
  ***************************/

  public function setId( $id ) {
    $this->id = $id;
  }

  public function setGenreId( $genre_id ) {
    $this->genre_id = $genre_id;
  }

  public function setTitle( $title ) {
    $this->title = $title;
  }

  public function setType( $type ) {
    $this->type = $type;
  }

  public function setStatus( $status ) {
    $this->status = $status;
  }

  public function setReleaseDate( $release_date ) {
    $this->release_date = $release_date;
  }

  /***************************
  * -------- GETTERS ---------
  ***************************/

  public function getId() {
    return $this->id;
  }

  public function getGenreId() {
    return $this->genre_id;
  }

  public function getTitle() {
    return $this->title;
  }

  public function getType() {
    return $this->type;
  }

  public function getStatus() {
    return $this->status;
  }

  public function getReleaseDate() {
    return $this->release_date;
  }

  public function getSummary() {
    return $this->summary;
  }

  public function getTrailerUrl() {
    return $this->trailer_url;
  }

  /***************************
  * -------- GET LIST --------
  ***************************/

  // Get filterd media
  public static function filterMedias( $title ) {

    // Open database connection
    $db   = init_db();
    
    if(isset($_GET['title'])){

      $req  = $db->prepare( "SELECT * FROM media WHERE title LIKE '%{$title}%' " );
      $req->execute( array( '%' . $title . '%' ));

    }else{

      $req  = $db->prepare( "SELECT * FROM media ORDER BY release_date DESC" );
      $req->execute( array( '%' . $title . '%' ));

    }

    // Close databse connection
    $db   = null;

    return $req->fetchAll();
  }

  // Get details for media
  public static function detailMedias( $id ) {

    $db   = init_db();

    $req  = $db->prepare( "SELECT * FROM media WHERE id = \" ".$id." \" " );
    $req->execute( array( '%' . $id . '%') );
    
    $db   = null;

    return $req->fetchAll();
  }

  // Get details for episode
  public static function detailEpisode( $id ) {

    $db   = init_db();

    $req  = $db->prepare( "SELECT * FROM episode WHERE id = \" ".$id." \" " );
    $req->execute( array( '%' . $id . '%') );
    
    $db   = null;

    return $req->fetchAll();
  }

  //Get episode informations
  public static function getEpisodes( $id , $season_id ) {

    $db   = init_db();

    if($season_id !== null){ // If user selected a season
      $req  = $db->prepare( "SELECT * FROM episode WHERE media_id = ".$id." AND season = ".$season_id );
      $req->execute( array( '%' . $id . '%') );
    }else{                    // If not
      $req  = $db->prepare( "SELECT * FROM episode WHERE media_id = ".$id );
      $req->execute( array( '%' . $id . '%') );
    }

    $db   = null;

    return $req->fetchAll();
  }

  //Get number of season for series id
  public static function getNbSeason( $id ) {

    $db   = init_db();
  
    $req  = $db->prepare( "SELECT COUNT(DISTINCT season) FROM episode WHERE media_id = ".$id );
    $req->execute( array( '%' . $id . '%') );

    $db   = null;

    return $req->fetchAll();
  
  }

}
