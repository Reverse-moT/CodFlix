<?php

require_once( 'model/user.php' );

/****************************
* ----- LOAD SIGNUP PAGE -----
****************************/

function signupPage() {

  $user     = new stdClass();
  $user->id = isset( $_SESSION['user_id'] ) ? $_SESSION['user_id'] : false;

  if( !$user->id ):
    require('view/auth/signupView.php');
  else:
    require('view/homeView.php');
  endif;

}

/***************************
* ----- SIGNUP FUNCTION -----
***************************/

function IsSignupFormOk( $post ) {

  $formData = new stdClass();
  $formData->email = $post['email'];
  $formData->password = $post['password'];
  $formData->password_confirm = $post['password_confirm'];

  $user           = new User( $formData );
  $userformData       = $user-> createUser();
}