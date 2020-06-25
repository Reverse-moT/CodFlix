<?php

require_once( 'model/user.php' );

/****************************
* ----- LOAD SIGNUP PAGE -----
****************************/

function signupPage() {

  $user     = new stdClass();
  $user->id = isset( $_SESSION['user_id'] ) ? $_SESSION['user_id'] : false;
  $user->email = isset( $_SESSION['user_email'] ) ? $_SESSION['user_email'] : false;
  $user->password = isset( $_SESSION['user_password'] ) ? $_SESSION['user_password'] : false;

  if( !$user->id):
    require('view/auth/signupView.php');
  else:
    require('view/homeView.php');
  endif;

}

/***************************
* ----- SIGNUP FUNCTION -----
***************************/
