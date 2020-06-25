<?php

require_once( 'controller/homeController.php' );
require_once( 'controller/loginController.php' );
require_once( 'controller/signupController.php' );
require_once( 'controller/mediaController.php' );
require_once( 'controller/contactController.php' );
require_once( 'controller/detailController.php' );
require_once( 'controller/historyController.php' );


/**************************
* ----- HANDLE ACTION -----
***************************/

if ( isset( $_GET['action'] ) ):

  switch( $_GET['action']):

    case 'login':

      if ( !empty( $_POST ) ) login( $_POST );
      else loginPage();

    break;

    case 'signup':

      if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password_confirm']) ){
        IsSignupFormOk($_POST);
      }
      signupPage();

    break;

    case 'logout':

      logout();

    break;

    case 'history':

      history();

    break;

    case 'contact':

      contact();

    break;

  endswitch;

elseif ( isset( $_GET['media'] ) ):

  detail();

else:

  $user_id = isset( $_SESSION['user_id'] ) ? $_SESSION['user_id'] : false;

  if( $user_id ):
    mediaPage();
  else:
    homePage();
  endif;

endif;
